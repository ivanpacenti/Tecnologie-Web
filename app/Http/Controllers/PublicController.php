<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Azienda;
use App\Models\Catalog;
use App\Models\Faq;
use App\Models\Offerta;

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
        $offerte = Offerta::all();
        $aziende=Azienda::all();
        return view('catalogo')->with('offerte', $offerte)->with('aziende',$aziende);
    }



// DA SPOSTARE TUTTO QUANDO METTEREMO L'AUTENTICAZIONE

    public function VisualizzaFaq()
//  Questa è una funzione per visualizzare le faq,
    {
        $faqs = faq::all();
        //dd($faqs);
        return view('adminView.adminFaqs')->with('faqs', $faqs);
    }

    public function deleteFaq($id)
//  Questa è una funzione per eliminare le faq,
    {
        // Utilizza l'ID per eliminare la FAQ corrispondente
        $faq = Faq::find($id);
        $faq->delete();

        return redirect()->back()->with('success', 'Faq eliminata con successo');
    }

    public function visualizza1Faq($id)
// funzione che serve per visualizzare una sola faq, quella cliccata,
// serve per vederla nella form, poi verrà implemenetato l'update su una funzione seguente
    {
        $faq = faq::find($id);
        //dd($faq);
        return view('faqsedit',['faq'=>$faq]);

    }

    public function modificaFaq(Request $req)
// funzione che serve per modificare  una sola faq
    {
        $faq= faq::find($req->id);
        $faq->domanda=$req->domanda;
        $faq->risposta=$req->risposta;
        $faq->save();
        return redirect()->action([PublicController::class, 'VisualizzaFaq']);
    }

}
