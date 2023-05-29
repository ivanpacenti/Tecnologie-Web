<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offerta extends Model
{
    // use HasFactory;
    protected $table = 'offertas'; // Nome della tabella nel database
    protected $primaryKey = 'id';
    //protected $guarded = ['id']; // prodId non modificabile da un HTTP Request (Mass Assignment)
    public $timestamps = false; //Laravel non aggiorna i campi created_at e updated_at nel database

    protected $fillable = ['descrizione', 'immagine','luogoFruizione']; // Campi della tabella che possono essere assegnati in modo massivo

    public function azienda()
    {
        return $this->hasManyThrough(Azienda::class, Emissione::class, 'offerta', 'id', 'id', 'azienda');
    }
    public function emissione()
    {
        return $this->hasOne(Emissione::class, 'offerta');
    }
    /*public function index()
    {
        return $this->paginate(10);
    }*/
    public function offerteInAziende()
    {

    }
    public function getOfferte(){
        return Offerta::all();
    }

    public function getOffertabyID($id){
        return Offerta::find($id);
    }
}
