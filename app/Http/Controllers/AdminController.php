<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Azienda;
use App\Models\coupon_off;
use App\Models\Emissione;
use App\Models\Faq;
use App\Models\Offerta;
use App\Models\Resources\Product;
use App\Http\Requests\NewOffertatRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    protected $_adminModel;
    protected $_adminFaqs;
    protected $_adminUsers;
    protected $_adminAziende;
    protected $_adminOfferte;
    protected $_adminStaff; // per valeria seguire qua per creare l'istanza poi aggiungerla al costruttore


// questo costruttore mi fa il controllo sul fatto che quando apro queste rotte è solo l'admin ad aprirle
    public function __construct()
    {
        $this->_adminFaqs = new Faq();
        $this->_adminModel = new Admin;
        $this->_adminUsers = new User();
        $this->_adminAziende = new Azienda();
        $this->_adminOfferte = new Offerta();
        $this->middleware('can:isAdmin');
    }

    public function index()
    {
        return view('admin');
    }

    // SEZIONE RELATIVA AL CRUD DELLE FAQ

    public function VisualizzaFaq() //  Questa è una funzione per visualizzare tutte le faq
    {
        $faqs = $this->_adminFaqs->getFaqs();
        return view('adminView.adminFaqs')->with('faqs', $faqs);
    }

    public function deleteFaq($id) //  Questa è una funzione per eliminare le faq,
    {
        // Utilizza l'ID per eliminare la FAQ corrispondente
        $faq = $this->_adminFaqs->getFaqbyID($id);
        $faq->delete();
        return redirect()->back()->with('success', 'Faq eliminata con successo');
    }

    public function visualizza1Faq($id) // funzione che serve per visualizzare una sola faq, quella cliccata, serve per vederla nella form, poi verrà implemenetato l'update su una funzione seguente
    {
        $faq = $this->_adminFaqs->getFaqbyID($id);
        return view('adminView.faqsedit', ['faq' => $faq]);
    }

    public function modificaFaq(Request $req) // funzione che serve per modificare  una sola faq
    {
        $req->validate([
            'domanda' => ['required', 'string', 'max:255'],
            'risposta' => ['required', 'string', 'max:255'],
        ]);

        $faq = $this->_adminFaqs->getFaqbyID($req->id);
        $faq->domanda = $req->domanda;
        $faq->risposta = $req->risposta;
        $faq->save();
        return redirect()->action([AdminController::class, 'VisualizzaFaq']);
    }

    public function salvafaq(Request $req) // funzione per salvare una faq all'interno del db
    {
        $req->validate([
            'domanda' => ['required', 'string', 'max:255'],
            'risposta' => ['required', 'string', 'max:255'],
        ]);

        $faq = new Faq();
        $faq->domanda = $req->input('domanda');
        $faq->risposta = $req->input('risposta');
        $faq->save();
        return  redirect()->route('adminFaqs');
    }

    //SEZIONE RELATIVA AGLI UTENTI

    public function visualizzaUtente() //  Questa è una funzione per visualizzazione degli utenti
    {
        $Users = $this->_adminUsers->getUtenti();
        return view('adminView.visualizzaUtente')->with('Users', $Users);
    }

    public function deleteUser($id) //  Questa è una funzione per eliminare le faq,
    {
        $User = $this->_adminUsers->getUtentebyID($id);
        $User->delete();
        return redirect()->back()->with('success', 'utente eliminato con successo');
    }


    //SEZIONE RELATIVA AL CRUD DELLE AZIENDE

    public function VisualizzaAziende()
    {
        $aziende = $this->_adminAziende->getAziende();
        return view('adminView.adminAziende')->with('aziende', $aziende);
    }

    public function deleteAgency($id) //funzione che elimina un'azienda e la relativa offerta
    {
        $azienda = $this->_adminAziende->getAziendabyID($id); //trova l'id dell'azienda da eliminare
        $offertaid = Emissione::where('azienda', $id)->value('offerta'); //trova l'id nella tabella emissione dell'offerta relativa da eliminare
        $offerta = $this->_adminOfferte->getOffertabyID($offertaid); //trova l'offerta relativa all'id trovato
        if($offerta)
            $offerta->delete(); //eliminazione dell'offerta
        $azienda->delete(); //eliminazione dell'azienda
        return redirect()->back()->with('success', 'Azienda eliminata con successo'); //ritorna alla pagina precedente
    }

    public function createAgency(Request $req) //funzione che permette di creare ed aggiungere una nuova azienda nel db
    {
        $req->validate([
            'partitaIva' => ['required', 'integer', 'digits:11'],
            'nome' => ['required', 'string', 'max:255'],
            'posizione' => ['required', 'string', 'max:255'],
            'descrizione' => ['required', 'string', 'max:255'],
            'tipologia' => ['required', 'string', 'max:255'],
            'logo' => ['required'],
        ]);

        if ($req->hasFile('logo')) {
            $image = $req->file('logo');
            $imageName = $image->getClientOriginalName();
        } else {
            $imageName = NULL;
        }

        if (!is_null($imageName)) {
            $destinationPath = public_path() .'/img/';
            $image->move($destinationPath, $imageName);
            $imageName = 'img/' . $image->getClientOriginalName();
        }

        $azienda = new Azienda();
        $azienda->partitaIva = $req->partitaIva;
        $azienda->nome = $req->nome;
        $azienda->posizione = $req->posizione;
        $azienda->descrizione = $req->descrizione;
        $azienda->tipologia = $req->tipologia;
        $azienda->logo = $imageName;
        $azienda->save();

        return  redirect()->route('adminAziende');
    }

    public function modifica1Azienda($id)
    {
        $azienda = $this->_adminAziende->getAziendabyID($id);
        return view('adminView.agencyedit', ['azienda' => $azienda]);
    }

    public function modificaAzienda(Request $req)
    {
        $req->validate([
            'partitaIva' => ['required', 'integer', 'digits:11'],
            'nome' => ['required', 'string', 'max:255'],
            'posizione' => ['required', 'string', 'max:255'],
            'descrizione' => ['required', 'string', 'max:255'],
            'tipologia' => ['required', 'string', 'max:255'],
            'logo' => ['required'],
        ]);


        if ($req->hasFile('logo')) {
            $image = $req->file('logo');
            $imageName = $image->getClientOriginalName();
        } else {
            $imageName = NULL;
        }

        if (!is_null($imageName)) {
            $destinationPath = public_path() .'/img/';
            $image->move($destinationPath, $imageName);
            $imageName = 'img/' . $image->getClientOriginalName();
        }
        $azienda = $this->_adminAziende->getAziendabyID($req->id);
        $azienda->partitaIva = $req->partitaIva;
        $azienda->nome = $req->nome;
        $azienda->posizione = $req->posizione;
        $azienda->descrizione = $req->descrizione;
        $azienda->tipologia = $req->tipologia;
        $azienda->logo = $imageName;
        $azienda->save();
        return redirect()->action([AdminController::class, 'VisualizzaAziende']);
    }

    // CONTROLLER PER LE STATISTICHE
    public function NumeroCoupon()
        // restituisce il numero di coupon emessi in totale nel sito
    {
        $numTotCoupon = coupon_off::count();
        return view('adminView.numTotCoupon', ['numTotCoupon' => $numTotCoupon]);;
    }

    public function VisualizzaOfferte()
    {
        $offerte = $this->_adminOfferte->getOfferte();
        return view('adminView.VisualizzaOfferte', ['offerte' => $offerte]);
    }

    public function CouponOfferta($id)// restituisce il numero di coupon emessi per ogni offerta
    {
        $offerta = $this->_adminOfferte->getOffertabyID($id);
        $numTotCoupon = coupon_off::where('offerta',$id)->count();
        return view('adminView.CouponOfferta', ['numTotCoupon' => $numTotCoupon,'offerta'=>$offerta]);
    }

    public function CouponUtente($id)//restituisce il numero totale di coupon emessi da un utente
    {
        $user= $this->_adminUsers->getUtentebyID($id);
        $numTot = coupon_off::where('utente', $user->username)->count();
        return view('adminView.CouponUtente', ['numTot' => $numTot,'user'=>$user]);
    }

    //SEZIONE RELATIVA ALLO STAFF
    public function VisualizzaStaff()
    {
        $staffs = $this->_adminUsers->getStaff();
        return view('adminView.VisualizzaStaff', ['staffs' => $staffs]);
    }

    public function ModificaStaff1($id)
    {
        $staff = $this->_adminUsers->getUtentebyID($id);
        return view('adminView.ModificaStaff', ['staff' => $staff]);
    }

    public function ModificaStaff(Request $req)
    {
        $req->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'età' => ['required', 'integer', 'between:0,100'],
            'username' => ['required', 'string', 'between:0,100'],
        ]);

        $User = $this->_adminUsers->getUtentebyID($req->id);
        $User->name=$req->name;
        $User->email=$req->email;
        $User->surname=$req->surname;
        $User->password = Hash::make($req->password);
        $User->username=$req->username;
        $User->età=$req->età;

        $User->save();
        return redirect()->action([AdminController::class, 'VisualizzaStaff']);
    }

    public function staffcreate(Request $req) // funzione per salvare una faq all'interno del db
    {
        $User = new User();
        $User->name=$req->name;
        $User->email=$req->email;
        $User->surname=$req->surname;
        $User->password = Hash::make($req->password);
        $User->username=$req->username;
        $User->età=$req->età;
        $User->role=$req->role;
        $User->genere=$req->genere;
        $User->telefono=$req->telefono;
        $User->save();

        return redirect()->action([AdminController::class, 'VisualizzaStaff']);
    }

}
