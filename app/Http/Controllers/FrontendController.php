<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
         
     
     
       return view('auth.login');
   }

    public function home(){
         
     
     
       return view('home');
   }

   public function admin(){
    
       return view('administration.index');
   }
   
}
