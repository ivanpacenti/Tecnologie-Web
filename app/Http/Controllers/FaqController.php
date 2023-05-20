<?php

namespace App\Http\Controllers;
use App\Models\Faq;

class FaqController extends Controller
{
    public function __construct() {
        $this->_faqmodel = new Faq;
        $this->middleware('can:isFaq');
    }

    public function index() {
        return view('publicFaqs');
    }

    public function VisualizzaFaq()
//  Questa è una funzione per visualizzare le faq,
    {
        $faqs = faq::all();
        //dd($faqs);
        return view('layouts.publicFaqs')->with('faqs', $faqs);
    }
}
