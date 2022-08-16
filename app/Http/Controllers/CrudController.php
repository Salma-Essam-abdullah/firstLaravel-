<?php

namespace App\Http\Controllers;

use App\Events\VideoViewer;
use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use App\Models\Video;
use App\Traits\OfferTrait;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CrudController extends Controller
{
    use OfferTrait;
public function getOffers(){
   return Offer::get();

}
public function store(OfferRequest $request){

    $file_name =  $this -> saveImage($request ->photo ,'images/offers');

Offer::create(
    [
        'name_ar'=>$request->name_ar,
        'name_en'=>$request->name_en,
        'price'=>$request->price,
        'details_ar'=>$request->details_ar,
        'details_en'=>$request->details_en,
        'photo'=>$file_name,
    ]

);


return redirect('offers/index')->with('success', __('messages.Offer created successfully'));
}




public function create(){
    return view('Offers.create');
}

public function index(){
    $offers = Offer::select('id',
    'name_'.LaravelLocalization::getCurrentLocale().' as name',
    'price',
    'details_'.LaravelLocalization::getCurrentLocale().' as details',
    'photo'
    )->get();

;
   return view('offers.index',compact('offers'));
}

public function edit($id){
    $offer = Offer::find($id);
    if(!$offer){
        return redirect()->back();
    }
   $offer =  Offer::select('id','name_ar','name_en','price','details_ar','details_en')->find($id);
    return view('offers.edit',compact('offer'));

}
public function update(OfferRequest $request , $id){
    $offer =  Offer::find($id);
    if(!$offer){
        return redirect()->back();
    }
    $offer->update($request->all());
    return redirect()->route('offers.index')->with('success', __('messages.Offer updated successfully'));
    
   
}

public function getVideo(){
  
    
   $video =  Video::first();
   event(new VideoViewer($video));
    return view('video')->with('video',$video);
}

public function destroy($id){
    $offer = Offer::find($id);
    if(!$offer){
        return redirect()->route('offers.index')->with('error', __('messages.Offer not found'));    
    }
    $offer->delete();
    return redirect()->route('offers.index')->with('success', __('messages.Offer deleted successfully'));

}
}

