<?php

namespace App\Http\Controllers;
use App\Models\Emissione;
use Illuminate\Http\Request;
use App\Models\Azienda;
use App\Models\Catalog;
use App\Models\Faq;
use App\Models\Offerta;
use Illuminate\Support\Facades\Route;
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
        $offerte = Offerta::paginate(2);
        $aziende=Azienda::all();
        return view('catalogo')->with('offerte', $offerte)->with('aziende',$aziende);
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

        $aziendeSelezionate = $request->input('aziende_selezionate');

        // Ottenere gli ID delle aziende selezionate dal database

        $id_off=Emissione::whereIn('azienda',$aziendeSelezionate)->get('offerta');

        // Filtrare le offerte in base agli ID delle aziende selezionate
        $offerte = Offerta::whereIn('id', $id_off)->paginate(2);
        $aziende=Azienda::all();


        // Passare le offerte alla vista o eseguire altre operazioni
        return view('catalogo')->with('offerte', $offerte)->with('aziende',$aziende);
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
