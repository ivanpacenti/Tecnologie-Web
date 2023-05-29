<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emissione extends Model
{
    protected $table='emissiones';
    public $timestamps = false;
    protected $fillable = ['azienda', 'offerta'];
    /*
    public function azienda()
    {
        return $this->belongsTo(Azienda::class, 'azienda', 'id');
    }
    public function offerta()
    {
        return $this->belongsTo(Offerta::class, 'offerta', 'id');
    }*/
}
