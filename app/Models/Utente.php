<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utente extends Model
{
    protected $table = 'utentes'; // Nome della tabella nel database
    protected $primaryKey = 'id';
    public $timestamps = false; //Laravel non aggiorna i campi created_at e updated_at nel database
    protected $fillable = ['descrizione', 'immagine']; // Campi della tabella che possono essere assegnati in modo massivo
}
