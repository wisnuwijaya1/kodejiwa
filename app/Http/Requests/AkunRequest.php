<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class AkunRequest extends FormRequest
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
        if($this->method() == 'POST'){
          $name ='required|string|min:3|max:100|unique:USERS';
          $username ='required|string|min:3|max:100|unique:USERS';
          $email ='required|string|min:3|max:100|unique:USERS';
          $nohp ='required|string|min:3|max:100';
          $password ='required|string|min:3|max:100';

      }
      else{
          $name ='required|string|min:3|max:100|unique:USERS,name,'.$this->get('id');
          $username ='required|string|min:3|max:100|unique:USERS,username,'.$this->get('id');
          $email ='required|string|min:3|max:100|unique:USERS,email,'.$this->get('id');
          $nohp ='required|string|min:3|max:100,'.$this->get('id');
          $password ='required|string|min:3|max:100,'.$this->get('id');
      }

      return [
        'name' => $name,
        'username' => $username,
        'email' => $email,
        'nohp' => $nohp,
        'password' =>$password,

    ];
}

public function messages()
{
   return [
       'name.required' => 'data harus diisi !',
       'name.min' => 'minimal 3 karakter !',
       'name.max' => 'maximal 255 karakter !',
       'name.unique' => 'nama sudah di gunakan !',
       'username.required' => 'data harus diisi !',
       'username.min' => 'minimal 3 karakter !',
       'username.max' => 'maximal 255 karakter !',
       'username.unique' => 'username sudah di gunakan !',
       'email.required' => 'data harus diisi !',
       'email.min' => 'minimal 3 karakter !',
       'email.max' => 'maximal 255 karakter !',
       'email.unique' => 'email sudah di gunakan !',
       'nohp.required' => 'data harus diisi !',
       'nohp.min' => 'minimal 3 karakter !',
       'nohp.max' => 'maximal 255 karakter !',
       'nohp.unique' => 'email sudah di gunakan !',
       'password.required' => 'data harus diisi !',
       'password.min' => 'minimal 3 karakter !',
       'password.max' => 'maximal 255 karakter !',
     ];

}

}
