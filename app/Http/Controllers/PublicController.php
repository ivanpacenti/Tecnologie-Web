<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
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
        return view('catalogo')->with('offerte', $offerte);
    }
}
