<?php

namespace App\Http\Controllers;
use App\Models\Utente;

class userController extends Controller {
// non ha funzione costruttrice ma ha solo una funzione index che propone la vista user, sta di fatto che solo l'utente user può accedere a quella vista
// in questo caso il proceosso di autenticazione sta nella rotta(nell''admin sta nell admin controller))
    public function index() {
        return view('user');
    }
    public function VisualizzaUtente($id)
    {
        $utente = Utente::find($id);
        return view('utente.show', ['utente' => $utente]);
    }

}
