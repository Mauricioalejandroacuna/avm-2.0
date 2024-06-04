<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAppreciationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
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
            'rut' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'region' => 'required',
            'commune' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'addressMap' => 'required',
            'rolBlock' => 'required',
            'rolPlotOfLand' => 'required',
            'terrainArea' => 'required',
            'terrainConstruction' => 'required',
            'bedroom' => 'required',
            'bathroom' => 'required',
        ];
    }

     /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'rut.required' => 'El rut es requerido',
            'name.required' => 'El nombre es requerido',
            'email.required' => 'El email es requerido',
            'phone.required' => 'El numero ceular es requerido',
            'region.required' => 'La region es requerida',
            'commune.required' => 'La comuna es requerida',
            'latitude.required' => 'La latitude es requerida',
            'longitude.required' => 'La longitude es requerida',
            'addressMap.required' => 'La direccion es requerida',
            'rolBlock.required' => 'La manzana es requerida',
            'rolPlotOfLand.required' => 'El predio es requerido',
            'terrainArea.required' => 'El area terreno es requerido',
            'terrainConstruction.required' => 'El area construction es requerido',
            'bedroom.required' => 'Las habitaciones son requeridas',
            'bathroom.required' => 'Los banos son requesridos',

        ];
    }
}
