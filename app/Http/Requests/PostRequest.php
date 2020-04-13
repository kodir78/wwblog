<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
    * Determine if the user is authorized to make this request.
    *
    * @return bool
    */
    public function authorize()
    {
        //return false;
        return true;
    }
    
    /**
    * Get the validation rules that apply to the request.
    *
    * @return array
    */
    public function rules()
    {
        //Mengetes method apa yang lagi dijalankan
        // dd($this->method());
        $rules = [
            // Validasi  request dari PostController
            "title" => "required|min:5|max:200",
            "image" => "required",
            "category_id" => "required",
            "excerpt" => "required",
            "body" => "required",
            //"published_at" => "date_format:Y-m-d H:i:s",
            "image" => "mimes:jpg,jpeg,bmp,png",
        ];

        switch($this->method()){
            case 'PUT':
            case 'PATCH': 
                $rules['slug'] = 'required|unique:posts,slug,' . $this->route('post'); 
                // route post diatas disesuaikan dengan placeholder pada route list
            break;
        }

        return $rules;
    }
}
