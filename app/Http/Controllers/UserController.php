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
        return view('UserView.editUser', ['User' => $User]);
    }
    public function modificaUtente(Request $req)
// funzione che serve per modificare  una sola faq
    {
        $User= User::find($req->id);
//        dd($User);
        $User->email=$req->email;
        $User->save();

        Route::view('/profilepage', 'profilepage')
            ->name('profilepage');
    }

}
