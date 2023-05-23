<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coupon_off extends Model
{
    //use HasFactory;
    protected $table ='coupon_offs'; // nome della tabella nel Db
    protected $primaryKey ='id';
    public $timestamps = false; // per poter modificare
    protected $fillable = ['offerta', 'utente'];


}
