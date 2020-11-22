<?php

namespace App\Http\Requests;

use App\Http\Requests\MonedaRequest;
use Illuminate\Foundation\Http\FormRequest;

class MonedaCreateRequest extends FormRequest
{
    use MonedaRequest {
        rules as traitrules;
        messages as traitmessages;
    }
    
    public function rules()
    {
        return array_merge($this->traitrules(), ['nombreMoneda'=> 'required|min:2|max:60|unique:moneda,nombreMoneda']);
    }
    
    public function messages() {
        $unique   = 'El campo :attribute debe ser único.';
        return array_merge($this->traitmessages(), ['nombreMoneda.unique' => $unique]);
    }
}
