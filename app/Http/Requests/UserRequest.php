<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
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
      
        if($this->method() == 'POST'){
          $name ='required|string|min:3|max:100';
          $tanggal ='required|string';
          $email ='required|string|min:3|max:100|unique:users';
          $nohp ='required|string|min:3|max:100|unique:users';

      }
      else{
          $name ='required|string|min:3|max:100|name,'.$this->get('id');
          $tanggal ='required|string|min:3|max:100|tanggal,'.$this->get('id');
          $email ='required|string|min:3|max:100|unique:users,email,'.$this->get('id');
          $nohp ='required|string|min:3|max:100|unique:users,nohp,'.$this->get('id');
         
      }

      return [
        'name' => $name,
        'tanggal' => $tanggal,
        'email' => $email,
        'nohp' => $nohp,


    ];
}

public function messages()
{
   return [
       'name.required' => 'data harus diisi !',
       'tanggal.required' => 'data harus diisi !',
       'email.required' => 'data harus diisi !',
       'email.min' => 'minimal 3 karakter !',
       'email.max' => 'maximal 255 karakter !',
       'email.unique' => 'email sudah di gunakan !',
       'nohp.required' => 'data harus diisi !',
       'nohp.min' => 'minimal 3 karakter !',
       'nohp.max' => 'maximal 255 karakter !',
       'nohp.unique' => 'no hp sudah di gunakan !',
     ];

}

}
