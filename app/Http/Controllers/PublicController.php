<?php

namespace App\Http\Controllers;
use App\Models\Emissione;
use Illuminate\Http\Request;
use App\Models\Azienda;
use App\Models\Catalog;
use App\Models\Faq;
use App\Models\Offerta;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;
class PublicController
{
    // protected $_catalogModel;

    // public function __construct() {
    //     $this->_catalogModel = new Catalog;
    // }
    // public function showCatalog1() {

    //     //Categorie Top
    //     $topCats = $this->_catalogModel->getTopCats();

    //     return view('catalog')
    //         ->with('topCategories', $topCats);

    // }*/

    // public function showCatalog() {
    //     $offerte = Offerta::all();
    //      return view('catalogo', ['offerta' => $offerte]);
    //  }

    public function visualizzaCatalogo()
    {
        $dataOggi = Carbon::today()->toDateString();
        //dd($dataOggi);
        $offerte = Offerta::paginate(6);
        $aziende=Azienda::all();
        return view('catalogo')->with('offerte', $offerte)->with('aziende',$aziende)->with('dataOggi',$dataOggi);
    }

    public function visualizzaDettagliOfferta($id)
    {
        $offerta = Offerta::find($id);
        return view('offerdetail',['offerta'=>$offerta]);
    }


    public function ricerca(Request $request)
    {
        $opzione=$request->get('searchOption');
        $testo=$request->get('cerca');
        $aziende=Azienda::all();
        $offerte=Offerta::all();
        switch ($opzione)
        {
            case 'Azienda':
                {
                    $aziende=Azienda::where('nome','like','%'.$testo.'%')->get();
                };break;
            case 'Coupon':
                {
                    $offerte=Offerta::where('descrizione','like','%'.$testo.'%')->get();
                };break;

        }

        $dataOggi = Carbon::today()->toDateString();

        //$aziende=Azienda::all();
        return view('ricerca')->with('offerte', $offerte)->with('aziende', $aziende);
    }
    public function filtroOfferte(Request $request)
    {
        $dataOggi = Carbon::today()->toDateString();

        // con la paginazione va in conflitto il metodo submit nella funzione RigeneraVista, collegato alle checkbox.
        //in pratica è come se ad ogni click sui link della paginazione avvenga una nuova submit, con conseguente nuova richiesta,
        //e quindi valore sballato dell'id dell'azienda.
        //la soluzione che ho trovato è quella seguente, che prevede di salvare in sessione il valore della prima richiesta e di
        //recuperarlo in caso di valore nullo.

        $aziendeSelezionate = $request->input('aziende_selezionate');
        if (empty($aziendeSelezionate)) {
            // Recupera il valore originale di aziende_selezionate dalla sessione
            $aziendeSelezionate = session('aziende_selezionate');
        } else session(['aziende_selezionate' => $aziendeSelezionate]);

        $offerte = Azienda::whereIn('id', $aziendeSelezionate)->first()->offerte()->paginate(2);




        // Filtrare le offerte in base agli ID delle aziende selezionate
        //$offerte = Offerta::whereIn('id', $aziendeSelezionate)->paginate(2);
        $aziende=Azienda::all();


        // Passare le offerte alla vista o eseguire altre operazioni
        return view('catalogo')->with('offerte', $offerte)->with('aziende',$aziende)->with('dataOggi',$dataOggi);
    }





    public function vis(){
        $faqs = Faq::all();
        //dd($faqs);
        //return view('publicView.publicFaqs')->with('faqs', $faqs);
        //return view('layouts.publicFaqs')->with('faqs', $faqs);
        //return view('Faq', compact('faqs'));
        return view('layouts.publicFaqs', ['faqs' => $faqs]);
    }
}
