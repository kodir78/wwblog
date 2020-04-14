<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryDestroyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // function jika id yang akan dihapus adalah id defult maka tampikan forbiden
        return !($this->route('category') == config('cms.default_category_id'));
        
    }

    //ini belum bisa digunakan ? tampilan errror masih mengarah ke forbidden
    public function forbiddenResponse()
    {
        return redirect()->back()->with('error-message', 'You cannot delete default category');
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
