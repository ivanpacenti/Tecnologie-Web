<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Azienda;
use App\Models\Emissione;
use App\Models\Faq;
use App\Models\Offerta;
use App\Models\Resources\Product;
use App\Http\Requests\NewProductRequest;
use Illuminate\Http\Request;
use App\Models\User;

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
        $req->validate([
            'domanda' => ['required', 'string', 'max:255'],
            'risposta' => ['required', 'string', 'max:255'],
        ]);

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

    public function VisualizzaAziende()
    {
        $aziende= Azienda::all();
        //dd($faqs);
        return view('adminView.adminAziende')->with('aziende', $aziende);
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
    public function deleteUser($id)
//  Questa è una funzione per eliminare le faq,
    {
        // Utilizza l'ID per eliminare la FAQ corrispondente
        $faq = Faq::find($id);
        $faq->delete();

        return redirect()->back()->with('success', 'Faq eliminata con successo');
    }

    public function visualizzaUtente()
//  Questa è una funzione per visualizzare le faq,
    {
        $Users = User::all();
//        dd($User);
        return view('adminView.visualizzaUtente')->with('Users', $Users);
    }

    //SEZIONE RELATIVA AL CRUD DELLE AZIENDE

    public function deleteAgency($id) //funzione che elimina un'azienda e la relativa offerta
    {
        $azienda = Azienda::find($id); //trova l'id dell'azienda da eliminare
        $offertaid = Emissione::where('azienda', $id)->value('offerta'); //trova l'id nella tabella emissione dell'offerta relativa da eliminare
        $offerta = Offerta::find($offertaid); //trova l'offerta relativa all'id trovato
        $azienda->delete(); //eliminazione dell'azienda
        $offerta->delete(); //eliminazione dell'offerta
        return redirect()->back()->with('success', 'Azienda eliminata con successo'); //ritorna alla pagina precedente
    }

}
