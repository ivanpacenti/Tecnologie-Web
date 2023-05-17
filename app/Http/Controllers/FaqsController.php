<?php

namespace App\Http\Controllers;


use App\Models\Faq;
class PublicController extends Controller
{
    public function VisualizzaFaq()
    {
        $faqs = faq::all();
        return view('adminFaqs')->with('faq', $faqs);
    }
}
