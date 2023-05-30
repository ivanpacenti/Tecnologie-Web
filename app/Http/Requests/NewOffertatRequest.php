<?php

namespace App\Http\Requests;

// Aggiunti per response JSON, sono necessari i pacchetti per ottenere validazione lato server

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NewOffertatRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        // Nella form non mettiamo restrizioni d'uso su base utente
        // Gestiamo l'autorizzazione ad un altro livello
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'dataInizio' => 'required',
            'dataFine' => 'required',
            'luogoFruizione' => 'required|max:30',
            'immagine' => 'image|max:1024',
            'azienda' => 'required',
            'modalità' => 'required|integer|min:0|max:100',
            'descrizione' => 'required|min:0|max:2500',
        ];
    }
    /**
     * Override: response in formato JSON
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY));
    }

}
