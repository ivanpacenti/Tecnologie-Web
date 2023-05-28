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
    public function Modifica1Offerta($id)
    {
        $offerta = $this->_staffOfferte->getOffertabyID($id);
        return view('staffView.editPromo', ['offerta' => $offerta]);
    }
    public function ModificaOfferta(Request $req) // funzione che serve per modificare  un coupon
    {
        $req->validate([
            'id' => ['required', 'string', 'max:10'],
            'modalita' => ['required', 'string', 'max:100'],
            'descrizione'=> ['required', 'string', 'max:250'],
            'immagine'=> ['required','string', 'max:100'],
            'dataInizio' => ['required', 'date'],
            'dataFine'=> ['required', 'date'],
            'luogoFruizione' => ['required', 'string', 'max:100']
        ]);
        $offerta =$this->_staffOfferte->getOffertabyID($req->id);
        //$offerta= Offerta::find($req->id);
        $offerta->id=$req->id;
        $offerta->modalità=$req->modalità;
        $offerta->descrizione=$req->descrizione;
        $offerta->immagine=$req->immagine;
        $offerta->luogoFruizione=$req->luogoFruzione;
        $offerta->dataInizio=$req->dataInizio;
        $offerta->dataFine=$req->dataFine;

        //$offerta->save();

        //return view('staffView.editPromo');
        return redirect()->action([StaffController::class, 'visualizzaOfferte']);
    }
    public function CreaOfferta(Request $req) //funzione che permette di creare ed aggiungere una nuova azienda nel db
    {
        if ($req->hasFile('immagine')) {
            $image = $req->file('immagine');
            $imageName = $image->getClientOriginalName();
        } else {
            $imageName = NULL;
        }

        if (!is_null($imageName)) {
            $destinationPath = public_path() .'/img/';
            $image->move($destinationPath, $imageName);
            $imageName = 'img/' . $image->getClientOriginalName();
        }

        $offerta = new Offerta();
        $offerta->immagine = $imageName;
        $offerta->id = $req->id;
        $offerta->modalita = $req->modalita;
        $offerta->descrizione = $req->descrizione;
        $offerta->dataInizio = $req->dataInizio;
        $offerta->dataFine= $req->dataFine;
        $offerta->luogoFruizione=$req->luogoFruizione;
        $offerta->save();

        return  redirect()->route('visualizzaOfferte');
    }
}
