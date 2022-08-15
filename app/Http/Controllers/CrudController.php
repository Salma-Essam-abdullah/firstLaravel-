<?php

namespace App\Http\Controllers;

use App\Models\Offer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as Validator;

class CrudController extends Controller
{
public function getOffers(){
   return Offer::get();

}
public function store(Request $request){
    // Offer::create([
    //     'name' => 'Offer2',
    //     'price'=>'5000',
    //     'details'=>'offer details'
    // ]);
     //validate the data
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100|unique:offers,name',
            'price' => 'required|numeric',
            'details' => 'required'
        ],
        [
            'name.required' => __('messages.offer name required'),
            'name.max' => __('messages.offer name max'),
            'name.unique' => __('messages.offer name unique'),
            'price.required' => __('messages.price required'),
            'price.numeric' => __('messages.price numeric'),
            'details.required' => __('messages.details required'),
        ]);
        //if the data is not valid
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInputs($request->all());
        }
$offer = $request->all();
Offer::create($offer);


return redirect()->back()->with('success', 'Offer created successfully');
}



public function create(){
    return view('Offers.create');
}
}
