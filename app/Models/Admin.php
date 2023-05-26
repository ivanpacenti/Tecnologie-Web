<?php

namespace App\Models;

use App\Models\Resources\Category;
use App\Models\Resources\Product;

class Admin {

    public function getProdsCats() {
        return Category::where('parId', '!=', 0)->get();
    }
    /*public function getFaqs(){
        return Faq::all();
    }

    public function getFaqbyID($id){
        return Faq::find($id);
    }*/

    /*public function getUtenti(){
        return Utente::all();
    }

    public function getUtentebyID($id){
        return Utente::find($id);
    }*/

    /*public function getAziende(){
        return Azienda::all();
    }

    public function getAziendabyID($id){
        return Azienda::find($id);
    }*/

    /*public function getOfferte(){
        return Offerta::all();
    }

    public function getOffertabyID($id){
        return Offerta::find($id);
    }*/
}
