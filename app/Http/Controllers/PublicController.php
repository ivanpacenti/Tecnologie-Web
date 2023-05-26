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
     protected $_aziendeModel;

     public function __construct() {
         $this->_aziendeModel = new Azienda();
     }
     public function visualizzaAziende(){
         $aziende = $this->_aziendeModel->getAziende();
         return view('homeAziende')->with('aziende', $aziende);
     }

    public function visualizzaCatalogo()
    {
        $dataOggi = Carbon::today()->toDateString();
        $offerte = Offerta::where('dataFine', '>=', $dataOggi)->paginate(5);
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
        $stringaOfferta=$request->get('cercaCoupon');
        $stringaAzienda=$request->get('cercaAzienda');
        if(empty($stringaOfferta))
        {
            $risultati=Azienda::where('nome','like','%'.$stringaAzienda.'%')->get();
        }
        elseif (empty($stringaAzienda))
        {
            $risultati=Offerta::where('descrizione','like','%'.$stringaOfferta.'%')->get();
        }
        elseif(!empty($stringaOfferta)&&!empty($stringaAzienda))
        {
            $id_azienda=Azienda::where('nome','like','%'.$stringaAzienda.'%')->pluck('id');
            $risultati=Azienda::whereIn('id', $id_azienda)->first()->offerte();
        }

        return view('ricerca')->with('risultati', $risultati);
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
