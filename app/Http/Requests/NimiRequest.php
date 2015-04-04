<?php namespace App\Http\Requests;
 
use Illuminate\Foundation\Http\FormRequest;
 
class NimiRequest extends FormRequest {

    public function rules()
    {
        return [
            'nimi' => 'required',
		];
    }
	public function authorize()
    {
        return true;
    }
}
