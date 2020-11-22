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
            'simbolo'       => 'required|min:1|max:5',
            'pais'          => 'required|min:2|max:100',
            'valor'         => 'required|min:0|max:99999',
            'fecha'         => 'required',
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
            'simbolo.required' => $required,
            'simbolo.min'      => $min,
            'simbolo.max'      => $max,
            'pais.required' => $required,
            'pais.min'      => $min,
            'pais.max'      => $max,
            'valor.required' => $required,
            'valor.min'      => $min,
            'valor.max'      => $max,
            'fecha.required' => $required,
        ];
    }
    
    public function attributes() {
        return [
            'nombreMoneda'      => 'nombre de la moneda',
            'simbolo'   => 'simbolo de la moneda',
            'pais'      => 'pais de la moneda',
            'valor'     => 'valor en euros',
            'fecha'     => 'fecha de la moneda',
        ];
    }   
}