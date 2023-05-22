<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use App\Models\Faq;
use App\Models\User;
use App\Models\Utente;
use Illuminate\Http\Request;

class userController extends Controller {
// non ha funzione costruttrice ma ha solo una funzione index che propone la vista user, sta di fatto che solo l'utente user può accedere a quella vista
// in questo caso il proceosso di autenticazione sta nella rotta(nell''admin sta nell admin controller))
    public function index() {
        return view('user');
    }
    public function __construct() {
        $this->middleware('can:isUser');
    }

    public function Visualizza1Utente($id)
    {
        $User = User::find($id);
        //dd($User);
        return view('UserView.editUser', ['User' => $User]);
    }
    public function modificaUtente(Request $req)
    {

// funzione che serve per modificare  UN UTENTE
     $req->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'età' => ['required', 'integer', 'between:0,100'],

        ]);

        $User= User::find($req->id);
        $User->name=$req->name;
        $User->email=$req->email;
        $User->surname=$req->surname;
        $User->password=$req->password;
        $User->età=$req->età;

        //dd($User);
        $User->save();

        return redirect()->action([userController::class, 'index']);
    }

    public function home() {
        return view('index');
    }

}
