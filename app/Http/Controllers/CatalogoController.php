<?php

namespace App\Http\Controllers;


use App\Models\Azienda;
use Illuminate\Http\Request;
use App\Models\Offerta;

class CatalogoController extends Controller
{
    public function visualizzaCatalogo()
    {
        $offerte = Offerta::index();
        $aziende = Azienda::all();
        return view('catalogo')->with('offerte', $offerte)->with('aziende',$aziende);
    }



}

