<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createUsersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

    //LAS REQUEST SIRVEN PARA VALIDAR DATOS SIN HACERLO DIRECTAMENTE EN EL CONTROLADOR,CREAMOS LA CLASE REQUEST
    //  Y LA ENVIAMOS AL CONTROLADOR POR PARAMETRO, LUEGO EN LA CLASE DEFINIMOS LAS REGLAS DE VALIDACION,SIRVE PARA REUTILIZAR LA VALIDACION
    //EN CASO DE QUE LA NECESITEMOS EN OTRO LADO
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048' // Regla para la imagen
        ];
    }
}
