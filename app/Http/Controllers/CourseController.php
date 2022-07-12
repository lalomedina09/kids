<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\Courses\BuyRequest;
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
        //Comentare el codigo 8 de julio de 2022 se comenta por si ocupo regresarlo
        /*
        //if $slug solo tenia un signo = entonces no estaba funcionando esta validacion le agregue otro =
        if($slug == "taller-online-inversion-para-principiantes")
        {
            $Conversion = $dolar * $course->price;
        }
        */

        //Si en una semana no hay problemas entonces lo podemos borrar lo comentado hoy 8-7-2022
        $currency_value = Parameter::where('code', 'dollar-to-currency-mxn')->first();
        $dollar = $currency_value->_lft;
        if ($course->currency == "USD") {
            $Conversion = $course->price / $dollar;
        }else{
            $Conversion = $course->price;
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

        #dd('linea 133 haber si llego aqui');
        $redirect = redirect()->route('courses.show', [$course->slug]);
        //dd('pago con paypal llego aqui');
        $checkout = new Checkout($user, collect([$course]), $payment_method);
        if ($coupon_code = $request->input('coupon')) {
            $checkout->setCoupon($coupon_code);
        }
        //dd('alaalal   biz biz biz biz biz biz', $course, $payment_method, 'linea 139');
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
}
