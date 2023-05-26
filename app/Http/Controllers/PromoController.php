<?php

namespace App\Http\Controllers;
use App\Models\Azienda;
use App\Models\Offerta;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    public function index(){
        return view('editPromo');
    }
    public function VisualizzaCoupon()
//  Questa è una funzione per visualizzare i coupon
    {
        $offerta = Offerta::all();

        return view('layouts.couponEdit')->with('offerta', $offerta);
    }
    public function deleteCoupon($id)
//  Questa è una funzione per eliminare i coupon
    {
        // Utilizza l'ID per eliminare il Coupon corrispondente
        $offerta = Offerta::find($id);
        $offerta->delete();

        return redirect()->back()->with('success', 'Coupon eliminato con successo');
    }
    public function modificaCoupon(Request $req)
// funzione che serve per modificare  un solo Coupon
    {
        $req->validate([
            'id' => ['required', 'int', 'max:10'],
            'modalità' => ['required', 'varchar', 'max:100'],
            'luogoFruizione'=> ['required', 'varchar', 'max:100'],
            'immagine'=>['required','varchar', 'max:100'],
            'descrizione'=> ['required', 'varchar', 'max:100'],
            'dataInizio'=> ['required', 'date'],
            'dataFine'=> ['required', 'date']
        ]);

        $offerta = Offerta::find($req->id);
        $offerta->id = $req->id;
        $offerta->modalita = $req->modalita;
        $offerta->luogoFruizione = $req->luogoFruizione;
        $offerta->dataInizio = $req->dataInizio;
        $offerta->dataFine=$req->dataFine;
        $offerta->save();
        return redirect()->action([PromoController::class, 'VisualizzaCoupon']);
    }
   public function salvaCoupon(Request $req)
        // funzione per salvare un Coupon all'interno del db
    {
        $req->validate([
            'id' => ['required', 'int', 'max:10'],
            'modalità' => ['required', 'varchar', 'max:100'],
            'luogoFruizione'=> ['required', 'varchar', 'max:100'],
            'immagine'=>['required','varchar', 'max:100'],
            'descrizione'=> ['required', 'varchar', 'max:100'],
            'dataInizio'=> ['required', 'date'],
            'dataFine'=> ['required', 'date']
        ]);

        $offerta = new Offerta();
        $offerta->id = $req->input('id');
        $offerta->modalita = $req->input('modalità');
        $offerta->luogoFruizione=$req->input('luogoFruizione');
        $offerta->immagine=$req->input('immagine');
        $offerta->descrizione=$req->input('descrizione');
        $offerta->dataInizio=$req->input('dataInizio');
        $offerta->dataFine=$req->input('dataFine');
        $offerta->save();
        return  redirect()->route('editPromo');
    }
    public function createCoupon(Request $req) //funzione che permette di creare ed aggiungere una nuova azienda nel db
    {
        $offerta = new Offerta();
        /* $azienda->partitaIva = $req->partitaIva;*/
        $offerta->id= $req->id;
        $offerta->modalita = $req->modalita;
        $offerta->descrizione = $req->descrizione;
        $offerta->luogoFruizione = $req->luogoFruzione;
        $offerta->dataInizio = $req-> dataInizio;
        $offerta->dataFine = $req-> dataFine;
        $offerta->immagine = $req-> immagine;
        $offerta->save();
        return  redirect()->route('editPromo');
    }
}
