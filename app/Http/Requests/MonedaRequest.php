<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

trait MonedaRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *  se pone a true para autorizar que todos los usuarios puedan crear cosas
     * y lo dejo en false nadie podria crear empresas con este resquest 
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * reglas de validacion de mis campos
     * @return array
     */
    public function rules()
    {
        return [
            'nombreMoneda'  => 'required|min:2|max:60',
            'simboloMoneda'       => 'required|min:1|max:5',
            'paisMoneda'          => 'required|min:2|max:100',
            'valorMoneda'         => 'required|min:0|max:99999',
            'fechaMoneda'         => 'required',
        ];
    }
    
    public function messages() {
        $required = 'El campo :attribute es obligatorio.';
        $min      = 'El campo :attribute no tiene la longitud mínima requerida :min';
        $max      = 'El campo :attribute supera tiene la longitud máxima requerida :max';
        
        return [
            'nombreMoneda.required' => $required,
            'nombreMoneda.min'      => $min,
            'nombreMoneda.max'      => $max,
            'simboloMoneda.required' => $required,
            'simboloMoneda.min'      => $min,
            'simboloMoneda.max'      => $max,
            'paisMoneda.required' => $required,
            'paisMoneda.min'      => $min,
            'paisMoneda.max'      => $max,
            'valorMoneda.required' => $required,
            'valorMoneda.min'      => $min,
            'valorMoneda.max'      => $max,
            'fechaMoneda.required' => $required,
        ];
    }
    
    public function attributes() {
        return [
            'nombreMoneda'      => 'nombre de la moneda',
            'simboloMoneda'   => 'simbolo de la moneda',
            'paisMoneda'      => 'pais de la moneda',
            'valorMoneda'     => 'valor en euros',
            'fechaMoneda'     => 'fecha de la moneda',
        ];
    }   
}