<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assegnazione extends Model
{
    protected $table='assegnaziones';
    public $timestamps = false;

    protected $fillable=['utente','azienda'];

    public function getAssegnazione()
    {
        return Assegnazione::all();
    }
    public function getAssegnazioneByAzienda($id_azienda)
    {
        return Assegnazione::where('azienda',$id_azienda);
    }
    public function getAssegnazioneByUtente($username)
    {
        return Assegnazione::where('utente',$username);
    }
    public function getAziendaByUtente($username)
    {
        return Assegnazione::where('utente',$username)->get('azienda');
    }
}
