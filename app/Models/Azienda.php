<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Azienda extends Model
{
    protected $table='aziendas';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable=['nome','descrizione'];
    /*public function offerte()
    {
        return $this->hasManyThrough(Offerta::class, Emissione::class, 'azienda', 'id', 'id', 'offerta');
    }*/

    public function offerte()
    {
        return $this->hasManyThrough(Offerta::class, Emissione::class, 'azienda', 'id', 'id', 'offerta')
            ->withDefault(); // Imposta un'istanza vuota di Offerta se non ci sono offerte associate
    }

}
