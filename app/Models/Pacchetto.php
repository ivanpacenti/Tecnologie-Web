<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pacchetto extends Model
{
    protected $table='pacchettos';
    protected $primaryKey = 'id';

    public $timestamps = false;
}
