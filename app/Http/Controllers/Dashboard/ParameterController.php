<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use Illuminate\Http\{Request, Response};

use App\Http\Requests\Dashboard\Parameters\{UpdatePriceRatingRequest};

use App\Models\Parameter;

class ParameterController extends Controller
{
    //
    public function price_rating_show()
    {
        $priceRating = Parameter::getPriceRating('code', 'price-rating');
        return view('dashboard.parameters.prices.rating.show')->with([
            'priceRating' => $priceRating
        ]);
    }

    public function update(UpdatePriceRatingRequest $request)
    {
        $priceRating = Parameter::find($request->get('id'));
        $priceRating->_lft = $request->get('_lft');
        $priceRating->_rgt = $request->get('_rgt');
        $priceRating->save();

        return back()
            ->with('success', 'Los precios se actualizaron correctamente');
    }
}
