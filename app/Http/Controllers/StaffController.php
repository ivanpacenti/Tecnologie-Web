<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Azienda;
use App\Models\Emissione;
use App\Models\Faq;
use App\Models\Offerta;
use App\Models\Resources\Product;
use App\Http\Requests\NewOffertatRequest;
use App\Models\Resources\Staff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller {
    protected $_staffOfferte;
    protected $_staffUtente;

    protected $_staffAzienda;

    public function __construct() {
        $this->_staffOfferte = new Offerta();
        $this->_staffUtente = new User();
        $this->_staffAzienda=new Azienda();
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
            'password'=> ['required', 'string', 'min:8'],
        ]);

        $User = $this->_staffUtente->getUtentebyID($req->id);
        $User->name=$req->name;
        $User->surname=$req->surname;
        $User->password = Hash::make($req->password);

        $User->save();

        return redirect()->action([StaffController::class, 'staff']);
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
        $aziende =$this->_staffAzienda->getAziendeId_Nome();
        //dd($aziende);
        return view('staffView.editPromo', ['offerta' => $offerta, 'aziende' => $aziende]);
    }

    public function ModificaOfferta(Request $req) // funzione che serve per modificare  un coupon
    {
        $req->validate([
            'modalità' => ['required', 'int', 'between:0,100'],
            'descrizione' => ['required', 'string', 'max:2500'],
            'dataInizio' => ['required'],
            'dataFine' => ['required'],
            'luogoFruizione' => ['required', 'string', 'max:255'],
        ]);

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
        } else{
            $imageName = Offerta::where('id', $req->id)->value('immagine');
        }

        $offerta =$this->_staffOfferte->getOffertabyID($req->id);
        $offerta->modalità=$req->modalità;
        $offerta->descrizione=$req->descrizione;
        $offerta->immagine=$imageName;
        $offerta->luogoFruizione=$req->luogoFruizione;
        $offerta->dataInizio=$req->dataInizio;
        $offerta->dataFine=$req->dataFine;
        $offerta->save();

        Emissione::where('offerta', $offerta->id)->update(['azienda' => $req->azienda]);

        return redirect()->action([StaffController::class, 'visualizzaOfferte']);
    }

    public function CreaOfferta(NewOffertatRequest $request) //funzione che permette di creare ed aggiungere una nuova azienda nel db
    {
        if ($request->hasFile('immagine')) {
            $image = $request->file('immagine');
            $imageName = $image->getClientOriginalName();
        } else {
            $imageName = NULL;
        }

        if (!is_null($imageName)) {
            $destinationPath = public_path() .'/img/';
            $image->move($destinationPath, $imageName);
            $imageName = 'img/' . $image->getClientOriginalName();
        } else {
            $imageName = 'img/shop.jpg';
        }

        $offerta = new Offerta();
        $offerta->fill($request->validated());
        $offerta->immagine = $imageName;
        $offerta->id = $request->id;
        $offerta->modalità = $request->modalità;
        $offerta->descrizione = $request->descrizione;
        $offerta->dataInizio = $request->dataInizio;
        $offerta->dataFine= $request->dataFine;
        $offerta->luogoFruizione=$request->luogoFruizione;
        $offerta->save();

        $emissione = new Emissione();
        $emissione ->azienda = $request->azienda;
        $emissione ->offerta = $offerta->id;
        $emissione->save();

        return response()->json(['redirect' => route('visualizzaOfferte')]);
    }

    public function creaoffertaxx()
    {
        $aziende = $this->_staffAzienda->getAziendeId_Nome();
        return view('staffView.CreaOfferta',['aziende' => $aziende]);
    }

}
