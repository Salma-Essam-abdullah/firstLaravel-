<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        $this -> middleware('auth')->except('showString0');
    }

    public  function showString0(){
       return 'show String';
   }
    public  function showString1(){
        return 'show String';
    }
    public  function showString2(){
        return 'show String';
    }
    public  function showString3(){
        return 'show String';
    }
}
