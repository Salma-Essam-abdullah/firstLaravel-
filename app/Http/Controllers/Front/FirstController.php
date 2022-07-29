<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class FirstController extends Controller
{
    public function index(){
//        $obj = new \stdClass();
//        $obj ->name = 'salma';
//        $obj ->id = '3';
//        return view('welcome' , compact('obj'));

        return view('welcome')->with('name','salma');
    }

    public function index2(){
       $data =['salma', 'essam','abdullah'];

        return view('welcome' , compact('data'));
    }
}
