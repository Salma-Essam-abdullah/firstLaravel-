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

$offer = $request->all();
Offer::create($offer);


return redirect()->back()->with('success', 'Offer created successfully');
}



public function create(){
    return view('Offers.create');
}


}

