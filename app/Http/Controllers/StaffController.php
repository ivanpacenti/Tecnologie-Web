<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Azienda;
use App\Models\Faq;
use App\Models\Offerta;
use App\Models\Resources\Product;
use App\Http\Requests\NewProductRequest;
use App\Models\Resources\Staff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller {
   // protected $_staffModel;
    public function __construct() {
       // $this->_staffModel = new Staff();
        $this->middleware('can:isStaff');
    }
    public function staff() {
        return view('staff');
    }
    public function Visualizza1Staff($id)
    {
        $User = User::find($id);
        //dd($User);
        return view('staffView.editStaff', ['User' => $User]);
    }
    public function modificaStaff(Request $req)
    {

// funzione che serve per modificare  UN UTENTE
        $req->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
        ]);

        $User= User::find($req->id);
        $User->name=$req->name;
        $User->surname=$req->surname;
        $User->password = Hash::make($req->password);

        //dd($staff);
        $User->save();

        return view('staff');
    }
//INSERITE DA VALERIA

    public function index() {
        return view('couponEdit');
        //return view('editPromo');
    }

    public function deleteCoupon($id)
    {
        $offerta = Offerta::find($id);
        $offerta->delete();
        return redirect()->back()->with('success', 'Coupon eliminato con successo');
    }
    public function modifyCoupon(Request $request)
    {
        //$offerta = Offerta::find($id);
        /*$offerta = Offerta::all();
        $offerta ->modify();
        //return redirect()->back()->with('success', 'Coupon modificato con successo');
        return view('editPromo',)->with('offerta', $offerta);*/

        $request->validate([
            'id' => ['required'],
            'descrizione' => ['required'],
            'modalita'=> ['required'],
            'luogoFruizione'=> ['required']
        ]);

        $offerta= Offerta::find($request->id);
        $offerta->descrizione=$request->descrizione;
        $offerta->modalita=$request->modalita;
        $offerta->luogoFruizione=$request->luogoFruizione;

        $offerta->save();

        return view('editPromo');
    }
    /*public function createCoupon($id)
    {
        $offerta = Offerta::find($id);
        $offerta ->create();
        return redirect()->back()->with('success', 'Coupon creato con successo');
    }*/
    /*public function createCoupon(Request $request)
    {
        $coupon = new Coupon();
        $coupon->id = $request->input('id');
        $coupon->offerta = $request->input('offerta');
        $coupon->expiry_date = $request->input('Data inizio');
        $coupon->save();

        return response()->json(['message' => 'Coupon creato con successo'], 200);
    }*/
    public function VisualizzaAziende_STAFF()
    {
        $aziende= Azienda::all();
        //dd($faqs);
        return view('layouts.couponEdit')->with('aziende', $aziende);
    }
}
