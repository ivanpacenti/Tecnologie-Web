<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Faq;
use App\Models\Resources\Product;
use App\Http\Requests\NewProductRequest;
use Illuminate\Http\Request;

class AdminController extends Controller {

    protected $_adminModel;


// questo costruttore mi fa il controllo sul fatto che quando apro queste rotte è solo l'admin ad aprirle
    public function __construct() {
        $this->_adminModel = new Admin;
        $this->middleware('can:isAdmin');
    }

    public function index() {
        return view('admin');
    }

    public function addProduct() {
        $prodCats = $this->_adminModel->getProdsCats()->pluck('name', 'catId');
        return view('product.insert')
                        ->with('cats', $prodCats);
    }
    // PARTE CHE FA IL CRUD DELLE FAQ
    public function VisualizzaFaq()
//  Questa è una funzione per visualizzare le faq,
    {
        $faqs = faq::all();
        //dd($faqs);
        return view('adminView.adminFaqs')->with('faqs', $faqs);
    }
    public function deleteFaq($id)
//  Questa è una funzione per eliminare le faq,
    {
        // Utilizza l'ID per eliminare la FAQ corrispondente
        $faq = Faq::find($id);
        $faq->delete();

        return redirect()->back()->with('success', 'Faq eliminata con successo');
    }

    public function visualizza1Faq($id)
// funzione che serve per visualizzare una sola faq, quella cliccata,
// serve per vederla nella form, poi verrà implemenetato l'update su una funzione seguente
    {
        $faq = faq::find($id);
        //dd($faq);
        return view('adminView.faqsedit',['faq'=>$faq]);
    }

    public function modificaFaq(Request $req)
// funzione che serve per modificare  una sola faq
    {
        $faq= faq::find($req->id);
        $faq->domanda=$req->domanda;
        $faq->risposta=$req->risposta;
        $faq->save();
        return redirect()->action([AdminController::class, 'VisualizzaFaq']);
    }

    public function salvafaq(Request $req)
        // funzione per salvare una faq all'interno del db
    {
        $faq = new Faq();
        $faq->domanda = $req->domanda;
        $faq->risposta = $req->risposta;
        $faq->save();
        return view('adminView.faqsedit',['faq'=>$faq]);
    }

    public function storeProduct(NewProductRequest $request) {

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
        } else {
            $imageName = NULL;
        }

        $product = new Product;
        $product->fill($request->validated());
        $product->image = $imageName;
        $product->save();

        if (!is_null($imageName)) {
            $destinationPath = public_path() . '/images/products';
            $image->move($destinationPath, $imageName);
        };

        return redirect()->action([AdminController::class, 'index']);
        ;
    }

}
