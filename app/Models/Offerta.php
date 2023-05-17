<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offerta extends Model
{
    // use HasFactory;
    protected $table = 'offertas'; // Nome della tabella nel database
    protected $primaryKey = 'id';
    protected $guarded = ['prodId']; // prodId non modificabile da un HTTP Request (Mass Assignment)
    public $timestamps = false; //Laravel non aggiorna i campi created_at e updated_at nel database

    protected $fillable = ['description', 'immagine']; // Campi della tabella che possono essere assegnati in modo massivo

    public function getdescription(){

    }
}
