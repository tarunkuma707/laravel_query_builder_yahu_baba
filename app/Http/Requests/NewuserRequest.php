<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class NewuserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            "username"=>"required",
            'useremail'=>'required|email|unique:newusers,email',
            'userpass'=>'required|alpha_num:ascii|min:6',
            'userage'=>'required|numeric|between:18,99',
            'usercity'=>'required'
        ];
    }

    // public function messages()
    // {
    //     return [
    //         "username.required"=>":attribute name paao",
    //         "useremail.required"=>":attribute paao",
    //         "useremail.email"=>":attribute Sahi paao",
    //         "userage.required"=>"Umar paao",
    //         "userage.numeric"=>'age should be number',
    //         'userage.min:18'=>"Age should be not greater than 18"
    //     ];
    // }

    public function attributes()
    {
        return[
            "username"=>"User ka Name",
            'useremail'=>'User Ki Email',
            'userpass'=>'User ka password',
            'userage'=>'User ki age',
            'usercity'=>'User ki city'            
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            //'username'=> strtoupper($this->username),
            'username'=> Str::slug($this->username),
        ]);
    }

    protected $stopOnFirstFailure   =    false; ///////// If fails on first error than mark true ////
}
