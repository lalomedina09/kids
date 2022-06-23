<?php

namespace App\Models\Traits;

use App\Integrations\Demio\DemioConnector;
use App\Integrations\Zoom\ZoomConnector;
use App\Notifications\Webinar\Notifier;
use App\Mail\Webinar\Mailer;

use Exception;

trait CourseWebinar {

    /**
     * Register user to webinar
     *
     * @param \App\Models\User  $user
     * @return boolean
     */
    public function registerToWebinar($user)
    {
        try {
            $connector = $this->getWebinarConnector();
        } catch (Exception $e) {
            logger()->error($e->getMessage());
            $error_message = 'La URL de registro en línea o el Identificador del seminario web no es válido y no se pudo completar el registro del usuario. Corregir la información en el dashboard, registrar al usuario y enviar correo de confirmación manualmente. Si el problema persiste, debe solucionarse con programación.';
            Notifier::sendWebinarRegistrationErrorNotification($user, $this, $error_message);
            return false;
        }

        try {
            $webinar_params = $this->getWebinarParams($connector);
        } catch (Exception $e) {
            logger()->error($e->getMessage());
            $connector_class = get_class($connector);
            $error_message = "No se han definido parámetros para el conector {$connnector_class}, esto debe solucionarse con programación";
            Notifier::sendWebinarRegistrationErrorNotification($user, $this, $error_message);
            return false;
        }

        try {
            $registration_url = $connector->registerToWebinar($user, $webinar_params);
        } catch (Exception $e) {
            logger()->error($e->getMessage());
            $error_message = 'Ocurrió un error al registrar el usuario al taller o streaming en línea, registrar al usuario y enviar correo de confirmación manualmente. Si el problema persiste, debe solucionarse con programación.';
            Notifier::sendWebinarRegistrationErrorNotification($user, $this, $error_message);
            return false;
        }

        Mailer::sendWebinarRegistrationMail($user, $this, $registration_url);
        return true;
    }

    /**
     * Factory webinar connector
     *
     * @return \App\Contracts\Integrations\WebinarConnector
     */
    private function getWebinarConnector()
    {
        if ($this->enrollment_url && preg_match(env('DEMIO_URL_REGEX'), $this->enrollment_url)) {
            return app()->make('DemioConnector');
        }

        if ($this->webinar_id) {
            return app()->make('ZoomConnector');
        }

        throw new Exception('Invalid webinar connector');
    }


    /**
     * Factory webinar params
     *
     * @param  \App\Contracts\Integrations\WebinarConnector  $connector
     * @return
     */
    private function getWebinarParams($connector)
    {
        if ($connector instanceof DemioConnector) {
            return [
                'webinar_url' => $this->enrollment_url
            ];
        }

        if ($connector instanceof ZoomConnector) {
            return [
                'webinar_id' => $this->webinar_id
            ];
        }

        throw new Exception('Invalid webinar parameters');
    }

}
