<?php

namespace App\Services\FacebookApiConversion;

use FacebookAds\Api;
use FacebookAds\Logger\CurlLogger;
#use FacebookAds\Object\ServerSide\ActionSource;
use FacebookAds\Object\ServerSide\CustomData;
use FacebookAds\Object\ServerSide\Event;
use FacebookAds\Object\ServerSide\EventRequest;
use FacebookAds\Object\ServerSide\UserData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AddDataPaymentService
{
    const INITIATE_CHECKOUT = 'InitiateCheckout';

    protected $access_token;
    protected $pixel_id;
    protected $request;
    protected $event_name;
    protected $event_id;
    protected $content_category;
    protected $content_ids;
    protected $contents;
    protected $currency;
    protected $num_items;
    protected $value;

    public function __construct(Request $request, $access_token = null, $pixel_id = null)
    {
        $this->request = $request;
        $this->access_token = $access_token ?: env('FACEBOOK_CONVERSIONS_API_ACCESS_TOKEN');
        $this->pixel_id = $pixel_id ?: env('FACEBOOK_PIXEL_ID');
    }

    public function emit($event_name = 'InitiateCheckout', $page_name = null, $event_id = null, $use_referer_as_url = false)
    {
        if (!$this->access_token) {
            return;
        }

        try {
            $api = Api::init(null, null, $this->access_token);
            $api->setLogger(new CurlLogger());
            $client_info = $this->getClientInfo();
            $url = $use_referer_as_url ? $this->request->headers->get('referer') : $this->request->url();
            $eventId = $event_id ?: time();

            $this->event_name = $event_name;
            $this->event_id = $eventId;

            $user_data = (new UserData())
                ->setClientUserAgent($client_info['user_agent'])
                ->setClientIpAddress($client_info['ip_address']);

            $custom_data = (new CustomData())
                ->setContentName($page_name);

            $event = (new Event())
                ->setEventName($event_name)
                ->setEventId($eventId)
                ->setEventTime(time())
                ->setEventSourceUrl($url)
                ->setUserData($user_data)
                ->setCustomData($custom_data);
            #->setActionSource(ActionSource::WEBSITE);

            $events = [$event];

            $request = (new EventRequest($this->pixel_id))
                ->setEvents($events)
                ->setTestEventCode(env('FACEBOOK_CONVERSIONS_TEST_CODE'));

            if (!env('FACEBOOK_CONVERSIONS_TEST_CODE')) {
                $request->execute();
            } else {
                $response = $request->execute();
                Log::debug('FACEBOOK_CONVERSIONS_API_RESPONSE', ['response' => print_r($response, true)]);
            }
        } catch (\Exception $error) {

            Log::error('FACEBOOK_CONVERSIONS_API', ['response' => print_r($error->getMessage(), true)]);
        }
    }

    public function getDeduplicationData()
    {
        return [
            'event_name' => $this->event_name,
            'event_id' => $this->event_id,
            'content_category' => $this->content_category,
            'content_ids' => $this->content_ids,
            'contents' => $this->contents,
            'currency' => $this->currency,
            'num_items' => $this->num_items,
            'value' => $this->value,
        ];
    }

    private function getClientInfo()
    {
        $user_agent = $this->getClientUserAgent();
        $ip_address = $this->getClientIPAddress();

        return [
            'user_agent' => $user_agent,
            'ip_address' => $ip_address,
        ];
    }

    private function getClientUserAgent()
    {
        return $this->request->server('HTTP_USER_AGENT');
    }

    private function getClientIPAddress()
    {
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
            $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
            $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        }

        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];

        if (filter_var($client, FILTER_VALIDATE_IP)) {
            $clientIp = $client;
        } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
            $clientIp = $forward;
        } else {
            $clientIp = $remote;
        }

        return $clientIp;
    }
}
