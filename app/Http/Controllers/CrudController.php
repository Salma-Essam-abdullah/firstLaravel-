<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Models\Offer;


class CrudController extends Controller
{
public function getOffers(){
   return Offer::get();

}
public function store(OfferRequest $request){


Offer::create(
    [
        'name_ar'=>$request->name_ar,
        'name_en'=>$request->name_en,
        'price'=>$request->price,
        'details_ar'=>$request->details_ar,
        'details_en'=>$request->details_en,
    ]

);


return redirect()->back()->with('success', __('messages.Offer created successfully'));
}



public function create(){
    return view('Offers.create');
}

public function index(){
  $offers = Offer::select('id','name_ar','name_en','price','details_ar','details_en')->get();
   return view('Offers.index',compact('offers'));
}


}

