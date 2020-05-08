<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserDestroyRequest extends FormRequest
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
        return !($this->route('user') == config('cms.default_user_id') ||
                $this->route('user') == auth()->user()->id);
        
    }

    //ini belum bisa digunakan ? tampilan errror masih mengarah ke forbidden
    // public function forbiddenResponse()
    // {
    //     return redirect()->back()->with('message', 'You cannot delete default user or delete yourself!');
    // } // sebaiknya dihapus saja

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
