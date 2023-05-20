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
        $offerte = Offerta::all();
        $aziende=Azienda::all();
        return view('catalogo')->with('offerte', $offerte)->with('aziende',$aziende);
    }

    public function visualizzaDettagliOfferta($id)
    {
        $offerta = Offerta::find($id);
        return view('offerdetail',['offerta'=>$offerta]);
    }

    public function vis(){
        $faqs = faq::all();
        //dd($faqs);
        return view('publicView.publicFaqs')->with('faqs', $faqs);
    }
}
