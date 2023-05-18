<?php

namespace App\Http\Controllers;
use App\Models\Utente;

class userController extends Controller {

    // public function index() {
    //     return view('user');
    // }
    public function VisualizzaUtente($id)
    {
        $utente = Utente::find($id);
        return view('utente.show', ['utente' => $utente]);
    }
}
