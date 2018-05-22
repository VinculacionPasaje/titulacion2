<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
         
     
     
       return view('welcome');
   }

    public function home(){
         
     
     
       return view('home');
   }

   public function admin(){
    
       return view('administration.index');
   }
   
}
