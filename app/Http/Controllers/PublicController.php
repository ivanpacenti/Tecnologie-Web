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
     protected $_offerteModel;

     public function __construct() {
         $this->_aziendeModel = new Azienda();
         $this->_offerteModel = new Offerta();
     }
     public function visualizzaAziende(){
         $aziende = $this->_aziendeModel->getAziende();
         return view('homeAziende')->with('aziende', $aziende);
     }

    public function visualizzaCatalogo()
    {
        $dataOggi = Carbon::today()->toDateString();
        $offerte = Offerta::where('dataFine', '>=', $dataOggi)->paginate(6);
        $aziende = (new Azienda)->getAziende();
        return view('catalogo')->with('offerte', $offerte)->with('aziende',$aziende)->with('dataOggi',$dataOggi);
    }

    public function visualizzaDettagliOfferta($id)
    {
        $offerta = $this->_offerteModel->getOffertabyID($id);
        $azienda = $this->_aziendeModel->getAziendabyID(Emissione::where('offerta', $offerta->id)->value('azienda'));

        return view('offerdetail',['offerta'=>$offerta, 'azienda'=>$azienda]);
    }


    public function ricerca(Request $request)
    {
        $dataOggi = Carbon::today()->toDateString();
        $stringaOfferta = addslashes($request->get('cercaCoupon'));
        $stringaAzienda = addslashes($request->get('cercaAzienda'));

        if (!empty($stringaOfferta) && empty($stringaAzienda)) {
            // Cerca solo nelle offerte
            $risultati = Offerta::where('descrizione', 'like', '%' . $stringaOfferta . '%')->where('dataFine', '>=', $dataOggi)->get();
        } elseif (empty($stringaOfferta) && !empty($stringaAzienda)) {
            $risultati = Offerta::whereHas('azienda', function ($query) use ($stringaAzienda) {
                $query->where('nome', 'like', '%' . $stringaAzienda . '%');
            })->where('dataFine', '>=', $dataOggi)->get();
        } elseif (!empty($stringaOfferta) && !empty($stringaAzienda)) {
            $risultati = Offerta::where('descrizione', 'like', '%' . $stringaOfferta . '%')->where('dataFine', '>=', $dataOggi)
                ->with('azienda') //carico la relazione 'azienda' per ciascuna offerta corrispondente alla ricerca (nel modello c'è HasManyThrough)
                ->whereHas('azienda', function ($query) use ($stringaAzienda) {
                    $query->where('nome', 'like', '%' . $stringaAzienda . '%');
                }) //filtro le offerte sulla relazione 'azienda'.
                // Applico un filtro per selezionare solo le offerte che hanno un'azienda il cui nome corrisponde alla
                // stringa di ricerca delle aziende ($stringaAzienda).
                ->get();
        } else {
            // Se non scrivo niente n'è su coupon nè su azienda
            $risultati = [];
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
        $id_offerte=Emissione::whereIn('azienda',$aziendeSelezionate)->pluck('offerta');
        $offerte=Offerta::WhereIn('id',$id_offerte)->where('dataFine', '>=', $dataOggi)->paginate(2);
        //$offerte = Azienda::whereIn('id', $aziendeSelezionate)->first()->offerte()->paginate(2);




        // Filtrare le offerte in base agli ID delle aziende selezionate
        //$offerte = Offerta::whereIn('id', $aziendeSelezionate)->paginate(2);
        $aziende=$this->_aziendeModel->getAziende();


        // Passare le offerte alla vista o eseguire altre operazioni
        return view('catalogo')->with('offerte', $offerte)->with('aziende',$aziende)->with('dataOggi',$dataOggi);
    }


//funzione che visualizza le faq
    public function vis(){

        $faqs = Faq::all();

        return view('publicFaqs', ['faqs' => $faqs]);
    }
}
