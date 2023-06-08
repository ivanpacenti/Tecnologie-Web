<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use App\Models\coupon_off;
use App\Models\Faq;
use App\Models\Offerta;
use App\Models\Azienda;
use App\Models\Emissione;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Utente;


class UserController extends Controller {
// non ha funzione costruttrice ma ha solo una funzione index che propone la vista user, sta di fatto che solo l'utente user può accedere a quella vista
// in questo caso il proceosso di autenticazione sta nella rotta(nell''admin sta nell admin controller))
    protected User $Utente;
    protected Offerta $Offerta;
    protected Azienda $Azienda;

    public function index() {
        return view('user');
    }
    public function CouponComprato() {
        return view('CouponComprato');
    }

    public function __construct() {
        $this->Utente = new User();
        $this->Offerta = new Offerta();
        $this->Azienda = new Azienda();
        $this->middleware('can:isUser');
    }

    public function Visualizza1Utente($id)
    {
        $User = $this->Utente->getUtentebyID($id);
        return view('userView.editUser', ['User' => $User]);
    }

    public function modificaUtente(Request $req)
    {
        $req->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'telefono' => ['required', 'string', 'regex:/^[+\s0-9]+$/i', 'min:8', 'max:255', function ($attribute, $value, $fail) {
                $plusCount = substr_count($value, '+');
                if ($plusCount > 1) {
                    $fail('Il campo :attribute può contenere al massimo un carattere "+"');
                }
            }],
            'età' => ['required', 'integer', 'between:0,100'],
            'password'=> ['required', 'string', 'min:8'],
        ]);

        $User= $this->Utente->getUtentebyID($req->id);
        $User->name=$req->name;
        $User->email=$req->email;
        $User->surname=$req->surname;
        $User->password = Hash::make($req->password);
        $User->età=$req->età;
        $User->telefono=$req->telefono;
        $User->genere=$req->genere;

        $User->save();

        return redirect()->action([UserController::class, 'index']);
    }

    public function home() {
        return view('index');
    }

    public function stampa(Request $request) {
        $couponId = $request->input('coupon_id');
        $userId = $request->input('user_id');
        $offertA = $this->Offerta->getOffertabyID($couponId);
        //dd($offertA);
        $user = $this->Utente->getUtentebyID($userId);

        if ($user) {
            $existingCoupon = coupon_off::where('utente', $user->username)
                ->where('offerta', $couponId)
                ->first();

            if ($existingCoupon) {
                return view('userView.coupongiaComprato');

            }
            else {
                // nel caso in cui il risultato della  La tupla non esiste
                $userUs = User::where('id', $userId)->first(); // mi estrae solo una tupla
                $couponOff = new coupon_off();
                $couponOff->offerta = $couponId;
                $couponOff->utente = $userUs['username'];
                $couponOff->save();
                $stringa = $userUs['username'] . $couponId;
                $azienda = $this->Azienda->getAziendabyID(Emissione::where('offerta', $offertA->id)->value('azienda'));
                return view('userView.stampa', ['stringa' => $stringa, 'offertaa' => $offertA, 'azienda'=>$azienda]);

            }
        }

    }


}
