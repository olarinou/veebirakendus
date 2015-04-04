<?php namespace App\Http\Requests;
 
use Illuminate\Foundation\Http\FormRequest;
 
class AddRequest extends FormRequest {

    public function rules()
    {
        return [
            'nimi' => 'required',
			'erakond' => 'required',
            'piirkond' => 'required',
        ];
    }
 
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
 
}
