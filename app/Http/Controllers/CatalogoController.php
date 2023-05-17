<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Azienda;
use Illuminate\Http\Request;
use App\Models\Offerta;

class CatalogoController extends Controller
{
    public function visualizzaCatalogo()
    {
        $offerte = Offerta::all();
        $aziende = Azienda::all();

        return view('catalogo')->with('offerte', $offerte)->with('aziende',$aziende);
    }



}
