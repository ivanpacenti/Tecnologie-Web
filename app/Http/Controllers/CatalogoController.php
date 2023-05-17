<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Offerta;

class CatalogoController extends Controller
{
    public function visualizzaCatalogo()
    {
        $offerte = Offerta::all();
        //dd($offerte);
        //return view('catalogo', ['offertas' => $offerte]);
         return view('catalogo')->with($offerte);
    }
}
