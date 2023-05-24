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

    public function filtroOfferte_1(Request $request)
    {
        $aziendeSelezionate = $request->input('aziende_selezionate');

        // Ottenere gli ID delle aziende selezionate dal database
        $aziende=Azienda::all();

        // Filtrare le offerte in base agli ID delle aziende selezionate
        $offerte = Offerta::whereIn('id', $aziendeSelezionate)->get();

        // Passare le offerte alla vista o eseguire altre operazioni
        return view('catalogo')->with('offerte', $offerte)->with('aziende',$aziende);
    }
    public function filtraggioAziende2_test(Request $request)
    {
        $aziendeSelezionate = $request->input('aziende');

        // Esegui la query per ottenere le offerte delle aziende selezionate
        $offerte = Offerta::whereIn('azienda', $aziendeSelezionate)->get();

        // Restituisci la vista con le offerte filtrate
        return view('catalogo', ['offerte' => $offerte]);
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
        return view('catalogo')->with('offerte', $offerte)->with('aziende',$aziende)->withwith('dataOggi',$dataOggi);
    }


    public function filtraggioAziende_test(Request $request)
    {
        $idAziendeSelezionate = $request->input('id_aziende_selezionate');

        // Applica il filtraggio dei dati in base ai nomi delle aziende selezionate
        $aziende = Azienda::whereIn('id', $idAziendeSelezionate)->get();
        // Esempio di query
        $offerteFiltrate = Offerta::whereIn('id', $idAziendeSelezionate)->get();

        // Restituisci i risultati filtrati come risposta JSON
        return response()->json(['offerte' => $offerteFiltrate]);
        //return view('catalogo')->with('offerte', $offerteFiltrate)->with('aziende',$aziende);

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
