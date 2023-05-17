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
}
