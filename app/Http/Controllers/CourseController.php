<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\Courses\BuyRequest;
use App\Models\Lead;
use App\Models\Course;
use App\Models\Category;
use App\Models\Parameter;

use QD\Marketplace\Implementations\CourseCouponValidatorRule;
use QD\Marketplace\Helpers\Checkout;
use QD\Marketplace\Models\Coupon;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $featured = Course::recent()
            ->featured()
            ->get();

        $categories = Course::getCategories()->each->load(['courses' => function ($query) {
            return $query->recent()
                ->limit(4);
        }]);

        return view('courses.index')->with([
            'featured' => $featured,
            'categories' => $categories
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\View\View
     */
    public function show($slug, Request $request)
    {
        //$test = new Coupon();
        //$couponTest = $test->getData();

        $course = Course::with('speakers', 'itineraries', 'content', 'contacts')
            ->published()
            ->whereSlug($slug)
            ->firstOrFail();

        $coupon = Coupon::all();

        $fechaActual = date("Y-m-d");

        $dolar = 0.05;
        $Conversion = 0;

        $currency_value = Parameter::where('code', 'dollar-to-currency-mxn')->first();
        if($currency_value)
        {
            $dollar = $currency_value->_lft;
            if ($course->currency == "USD") {
                $Conversion = $course->price / $dollar;
            }else{
                $Conversion = $course->price;
            }
        }

        $request->seoable = $course;
        return view('courses.show')->with([
            'course' => $course,
            'coupon' => $coupon,
            'couponTest' => Coupon::findOrFail(72),
            'fechaActual' => $fechaActual,
            'Conversion' => $Conversion,
            'landing' => ($request->has('utm_campaign'))
        ]);
    }

    public function getUsos()
    {

            $id = $_GET['id'];

            try {
                $obtener = Coupon::find($id);
                if($obtener)
                {
                  $ordenesUsos = $obtener->order_items;
                  $conteo = $ordenesUsos->count();
                  return $conteo;
                }
                else
                {
                  return 0;
                }
              } catch (ModelNotFoundException $e) {
                // Handle the error.
              }


    }


    /**
     * Buy a course.
     *
     * @param  string  $slug
     * @param  \App\Http\Requests\Courses\BuyRequest  $request
     * @return \Illuminate\View\View
     */
    public function buy($slug, BuyRequest $request)
    {
        $course = Course::published()
            ->whereSlug($slug)
            ->firstOrFail();

        $user = request()->user();
        $payment_method = $request->input('payment');


        $redirect = redirect()->route('courses.show', [$course->slug]);

        $checkout = new Checkout($user, collect([$course]), $payment_method);
        if ($coupon_code = $request->input('coupon')) {
            $checkout->setCoupon($coupon_code);
        }

        $checkout->placeOrder();

        return $checkout->getRedirect($redirect);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  string  $category
     * @return \Illuminate\View\View
     */
    public function byCategory($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $courses = $category->courses()
            ->recent()
            ->get();

        $featured = $courses->where('featured', 1);
        $categories = Course::getCategories();
        $page = $category->slug;

        return view('courses.categories', compact(
            'featured',
            'courses',
            'category',
            'categories',
            'page'
        ));
    }

    public function registerFormContact(Request $request)
    {
        $params = $request->validate([
            'name' => 'required|string|min:1|max:255',
            'last_name' => 'required|string|min:1|max:255',
            'mail_corporate' => 'required|email|min:1|max:255',
            'movil' => 'required|digits:10',
            'company' => 'required|string|min:1|max:255',
            'g-recaptcha-response' => 'required|recaptcha'
        ]);

        array_forget($params, 'g-recaptcha-response');

        $lead = $this->saveLead($request);

        return redirect()->back()->with('success', 'Gracias, Pronto nos pondremos en contacto contigo');
    }

    public function customRegisterFormContact(Request $request)
    {
        $params = $request->validate([
            'name' => 'required|string|min:1|max:255',
            'last_name' => 'required|string|min:1|max:255',
            'mail_corporate' => 'required|email|min:1|max:255',
            'movil' => 'required|digits:10',
            'company' => 'required|string|min:1|max:255',
            //'g-recaptcha-response' => 'required|recaptcha'
        ]);

        $emailCorp = $this->validateEmailCorp($request->mail_corporate);

        array_forget($params, 'g-recaptcha-response');
        $lead = $this->saveLead($request);
        return redirect()->back()->with('success', 'Gracias, Pronto nos pondremos en contacto contigo');
        /*if($emailCorp)
        {
            $lead = $this->saveLead($request);
            return redirect()->back()->with('success', 'Gracias, Pronto nos pondremos en contacto contigo');

        }else{
            return redirect()->back()->with('error', 'El correo debe ser de tu trabajo');
        }*/
    }

    private function saveLead($request)
    {
        $lead = new Lead;
        $lead->type = 1;
        $lead->status = 0;
        $lead->name = $request->name;
        $lead->last_name = $request->last_name;
        $lead->mail_corporate = $request->mail_corporate;
        $lead->movil = $request->movil;
        $lead->company = $request->company;
        $lead->interests = $request->interests;
        $lead->form = $request->form;
        $lead->url = $request->url();
        $lead->save();

        return $lead;
    }

    public function validateEmailCorp($email)
    {
        $domain = explode('@', $email ?? null);

        if ($domain) {

            switch ($domain[1]) {
                case 'gmail.com':
                    return false;
                    //break;
                case 'outlook.com':
                    return false;

                case 'hotmail.com':
                    return false;

                case 'yaho.com':
                    return false;
                    //break;

                case 'live.com.mx':
                    return false;
                    //break;

                default:
                    return true;
                    break;
            }
        }
    }
}
