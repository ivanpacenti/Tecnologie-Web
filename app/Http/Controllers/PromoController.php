<?php

namespace App\Http\Controllers;

use App\Models\Azienda;
use App\Models\Offerta;

class PromoController
{
    public function editPromo(){
        return view('editPromo');
    }
    public function visualizzaCoupon2($id)
    {
        $offerte = Offerta::find($id);
        $aziende = Azienda::find($id);
        $offerte = Offerta::all();
        $aziende = Azienda::all();
        //return view('couponEdit')->with('offerte', $offerte)->with('aziende',$aziende);
        return view('editPromo',['Offerta' => $offerte,'Azienda'=>$aziende]);
    }
    /*public function edit(Offerta $offerte)
    {
        $offerte = Offerta::all();
        return view('editPromo', compact('offerte'));
    }*/

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'modalità' => 'required',
            'descrizione' => 'required',
            'luogoFruizione'=> 'required',
            'dataInizio'=>'required',
            'dataFine' => 'required'
        ]);

        $offerte = Offerta::find($request->id);

        $offerte->update($request->all());
        $offerte->save();
        /*return redirect()->route('coupons.edit', $offerte->id)
            ->with('success', 'Coupon aggiornato con successo.');*/
        return view('editPromo');
        return redirect()->action([PromoController::class, 'VisualizzaCoupon2']);
    }

    public function deleteCoupon($id)
    {
        $offerta = Offerta::find($id);
        $offerta->delete();
        return redirect()->back()->with('success', 'Coupon eliminato con successo');
    }
    public function modifyCoupon($id)
    {
        $offerta = Offerta::find($id);
        $offerta ->modify();
        return redirect()->back()->with('success', 'Coupon modificato con successo');
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

}
