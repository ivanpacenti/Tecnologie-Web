<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    //use HasFactory;
    protected $table ='Faqs'; // nome della tabella nel Db
    protected $primaryKey ='faqId';
    public $timestamps = false;
    protected $fillable =['domanda', 'risposta'];
    public function getdescription(){

    }
}
