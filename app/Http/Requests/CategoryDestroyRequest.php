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
        // belum dapat difungsikan
        // function jika id yang akan dihapus adalah id defult maka tampikan forbiden
        return !($this->route('category') == config('cms.default_category_id'));
        
    }

    // dari sini ....
    //ini belum bisa digunakan ? tampilan errror masih mengarah ke forbidden 
    // public function forbiddenResponse()
    // {
    //     return redirect()->back()->with('message', 'You cannot delete default category');
    // }

    // sesuaikan dengan file formRequest
    /**
     * Handle a failed authorization attempt.
     *
     * @return void
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    // protected function failedAuthorization()
    // {
    //     // throw new \Illuminate\Auth\Access\AuthorizationException('You Hav no authorization to do this');
    //     return redirect()->back()->with('message', 'You cannot delete default category');
    //     // Edit file app/Exceptions/Handler.php 
    // }

    //sampai disini tidak diperlukan lagi karena sudah dihandle oleh exeception 
    
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
