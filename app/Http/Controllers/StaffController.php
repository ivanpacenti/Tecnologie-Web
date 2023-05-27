<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Azienda;
use App\Models\Faq;
use App\Models\Offerta;
use App\Models\Resources\Product;
use App\Http\Requests\NewProductRequest;
use App\Models\Resources\Staff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller {
    protected $_staffOfferte;
    protected $_staffUtente;
    public function __construct() {
        $this->_staffOfferte = new Offerta();
        $this->_staffUtente = new User();
        $this->middleware('can:isStaff');
    }

    public function staff() {
        return view('staff');
    }

    public function Visualizza1Staff($id)
    {
        $User = $this->_staffUtente->getUtentebyID($id);
        return view('staffView.editStaff', ['User' => $User]);
    }

    public function modificaStaff(Request $req) // funzione che serve per modificare  UN UTENTE
    {
        $req->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
        ]);

        $User= User::find($req->id);
        $User->name=$req->name;
        $User->surname=$req->surname;
        $User->password = Hash::make($req->password);

        //dd($staff);
        $User->save();

        return view('staff');
    }
//INSERITE DA VALERIA

    public function VisualizzaAziende_STAFF()
    {
        $aziende= Azienda::all();
        //dd($faqs);
        return view('layouts.couponEdit')->with('aziende', $aziende);
    }

    public function VisualizzaOfferte()
    {
        $offerte = $this->_staffOfferte->getOfferte();
        return view('staffView.VisualizzaOfferte')->with('offerte', $offerte);
    }

    public function EliminaOfferta($id) //  Questa è una funzione per eliminare le faq,
    {
        $offerta = $this->_staffOfferte->getOffertabyID($id);
        $offerta->delete();
        return redirect()->back()->with('success', 'offerta eliminata con successo');
    }
}
