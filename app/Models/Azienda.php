<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Emissione;
use Illuminate\Database\Eloquent\Relations\HasMany;


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
        return $this->hasManyThrough(Offerta::class, Emissione::class, 'azienda', 'id', 'id', 'offerta');
    }

    public function getAziende(){
        return Azienda::all();
    }

    public function getAziendabyID($id){
        return Azienda::find($id);
    }
    public function getAziendeId_Nome(){
        return Azienda::pluck('nome', 'id')->toArray();

    }


}
