<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    //use HasFactory;
    protected $table ='Faqs'; // nome della tabella nel Db
    protected $primaryKey ='id';
    public $timestamps = false; // per poter modificare
    protected $fillable = ['domanda', 'risposta'];


}
