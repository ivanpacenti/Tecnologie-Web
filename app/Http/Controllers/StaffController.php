<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Assegnazione;
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
    protected $_staffAssegnazione;

    public function __construct() { // costruttore
        $this->_staffOfferte = new Offerta();
        $this->_staffUtente = new User();
        $this->_staffAzienda=new Azienda();
        $this->_staffAssegnazione=new Assegnazione();
        $this->middleware('can:isStaff'); // middleware per autenticazione
    }

    public function staff() {
        return view('staff');
    }

    public function Visualizza1Staff($id)
    {// visualizza solo un memrbo dello staff
        $User = $this->_staffUtente->getUtentebyID($id);
        return view('staffView.editStaff', ['User' => $User]);
    }

    public function modificaStaff(Request $req) // funzione che serve per modificare  UN UTENTE staff
    {//
        $req->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'password'=> ['required', 'string', 'min:8'],
        ]);

        $User = $this->_staffUtente->getUtentebyID($req->id);
        $User->name=$req->name;
        $User->surname=$req->surname;
        $User->password = Hash::make($req->password); // crittografo la psw

        $User->save();

        return redirect()->action([StaffController::class, 'staff']);
    }

    public function VisualizzaOfferte()
    {
        $id_aziende=$this->_staffAssegnazione->getAssegnazioneByUtente(auth()->user()->username)->pluck('azienda');// mi trova le offerte che solo lo staff può vedere
        $id_offerte=Emissione::whereIn('azienda',$id_aziende)->pluck('offerta'); // pluck collezioni di oggetti offerta
        $offerte=Offerta::whereIn('id',$id_offerte)->get();
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
        //$aziende =$this->_staffAzienda->getAziendeId_Nome();
        $id_aziende=$this->_staffAssegnazione->getAssegnazioneByUtente(auth()->user()->username)->pluck('azienda');
        $aziende =Azienda::whereIn('id',$id_aziende)->pluck('nome', 'id')->toArray();
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

        if ($req->hasFile('immagine')) { // verifico la presenza di un file con il nome immagine
            $image = $req->file('immagine');// se è gia presente  viene associato all'oggetto image
            $imageName = $image->getClientOriginalName(); // metodo per estrarre il nome originale
        } else {
            $imageName = NULL;
        }
        // qui creo il path
        if (!is_null($imageName)) { //se  imageName è nulla viene creato un percorso di destinazione utilizzando la funzione li sotto
            $destinationPath = public_path() .'/img/';
            $image->move($destinationPath, $imageName); // quindi l'immagine viene spostata nella cartella di destinazione usando il metodo move
            $imageName = 'img/' . $image->getClientOriginalName(); // e il nome dell'immagine viene aggiornato con il percorso relativo alla cartella img
        } else{
            $imageName = Offerta::where('id', $req->id)->value('immagine'); // immagine vecchia
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
            $imageName = 'img/shop.jpg';// IMMAGINE DI DEFAULT perchè la creo
        }

        $offerta = new Offerta();
        $offerta->fill($request->validated()); // ajax
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
        // prende quello che mi serve
    {
        $id_aziende=$this->_staffAssegnazione->getAssegnazioneByUtente(auth()->user()->username)->pluck('azienda');// ottengo l'id delle aziende dove lo staff è autenticato
        $aziende =Azienda::whereIn('id',$id_aziende)->pluck('nome', 'id')->toArray();
        return view('staffView.CreaOfferta',['aziende' => $aziende]);
    }

}
