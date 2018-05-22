<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
      /**
    * Determine if the user is authorized to make this request.
    *
    * @return bool
    */
   public function authorize()
   {
       return true;
   }
 /**
  * Get the validation rules that apply to the request.
  *
  * @return array
  */
 public function rules()
 {
     return [
         'dni' => 'required|max:10|unique:users',
         'name' => 'required|max:255',
         'last_name' => 'required|max:255',
         'address' => 'required|max:255',
         'email' => 'required|email|max:255|unique:users',
         'password' => 'required|between:6,30|confirmed',
         
     ];
 }
}
