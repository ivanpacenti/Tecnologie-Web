<?php

namespace App\Http\Controllers;

class PromoController
{
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
