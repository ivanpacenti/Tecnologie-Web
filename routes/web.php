<?php

use App\Http\Controllers\CatalogoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OffertaController;
use App\Http\Controllers\FaqsController;
use App\Http\Controllers\StaffController;
use App\Models\Resources\Staff;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
|--------------------------------------------------------------------------
| ROTTE PUBBLICHE
|--------------------------------------------------------------------------
|
|
|
|
|
*/
Route::view('/', 'home')
    ->name('index');
Route::get('/homeAziende',[PublicController::class, 'visualizzaAziende'])->name('homeAziende');

Route::get('/catalogo', [PublicController::class, 'visualizzaCatalogo'])->name('catalogo'); //funzionante
Route::get('/filtroOfferte', [PublicController::class, 'filtroOfferte'])->name('filtroOfferte');
Route::get('/ricerca', [PublicController::class, 'ricerca'])->name('ricerca');
Route::post('/filtraggioAziende2_test', [PublicController::class, 'filtraggioAziende2_test'])->name('filtraggioAziende2_test');

Route::view('/profilepage', 'profilepage')
    ->name('profilepage');

Route::get('/offerta/{id}', [PublicController::class,'visualizzaDettagliOfferta'])->name('offerdetail');

//ROTTE PER LA VISUALIZZAZIONE DELLE FAQ
Route::view('/Faq', 'publicFaqs')
    ->name('Faq');
Route::get('/Faq',[PublicController::class, 'vis'])->name('visualizza_listaFaq');

//rotta che visualizza tutta la lista delle faq
Route::get('/Faq', [PublicController::class, 'vis'])-> name('visualizza_listafaq');

//ROTTE DELL'ADMIN
/*
|--------------------------------------------------------------------------
| ROTTE PER L'ADMIN
|--------------------------------------------------------------------------
|   QUI SI TROVANO LE ROTTE PER GESTIRE IL CRUD DELLE FAQ
|   LA PRIMA VISUALIZZA
|   SECONDA FA L'ELIMINAZIONE
|   TERZA FA LA VISUALIZZAZIONE DI UNA FAQ
|   QUARTA FA LA MODIFICA
|   QUINTA FA IL SALVATAGGIO DI UNA NUOVA FAQ
|   SESTA visualizzazione membri utenti
*/
//

Route::get('/adminFaqs', [AdminController::class, 'VisualizzaFaq'])->name('adminFaqs');
Route::get('/delete/{id}', [AdminController::class,'deleteFaq'])->name('elimina-faq');
Route::get('/edit/{id}', [AdminController::class,'visualizza1Faq'])->name('editid');
Route::post('/edit', [AdminController::class,'modificaFaq'])->name('edit');
Route::view('/faqsCreate','adminView.faqsCreate')->name('faqsCreate');
Route::post('/faqsCreate', [AdminController::class, 'salvafaq'])->name('faqsCreate2');

Route::view('/amministratore', 'admin')->name('admin')->middleware('can:isAdmin');
Route::get('/visualizzaUtente', [AdminController::class,'visualizzaUtente'])->name('visualizzaUtente');
Route::get('/deleteUser/{id}', [AdminController::class,'deleteUser'])->name('deleteUser');

Route::get('/adminAziende', [AdminController::class, 'VisualizzaAziende'])->name('adminAziende');
Route::view('/agencycreate', 'adminView.agencycreate')->name('agencycreate');
Route::post('/agencycreate', [AdminController::class, 'createAgency'])->name('agencycreate2');
Route::get('/agencyedit/{id}', [AdminController::class,'modifica1Azienda'])->name('agencyeditid');
Route::post('/agencyedit', [AdminController::class,'modificaAzienda'])->name('agencyedit');
Route::get('/deleteagency/{id}', [AdminController::class,'deleteAgency'])->name('elimina-azienda');


// ROTTE PER LE STATISTICHE
Route::view('/statistiche', 'adminView.statistiche')->name('statistiche');
Route::get('/totaleCoupon',[AdminController::class,'NumeroCoupon'])->name('NumeroCoupon');
Route::get('/VisualizzaOfferte',[AdminController::class,'VisualizzaOfferte'])->name('VisualizzaOfferte');
Route::get('/CouponOfferta{id}',[AdminController::class,'CouponOfferta'])->name('CouponOfferta');
Route::get('/CouponUtente{id}',[AdminController::class,'CouponUtente'])->name('CouponUtente');

/*
|--------------------------------------------------------------------------
| ROTTE PER L'USER
|--------------------------------------------------------------------------
|   la prima rotta serve per aprire la home una volta autenticati
|   la seconda rotta serve per visualizzare il form di un solo user
|   la terza rotta serve per modificare un singolo utente
|
|
|

*/

Route::get('/user', [UserController::class, 'index'])
    ->name('user');

Route::get('/couponComprato', [UserController::class, 'CouponComprato'])
    ->name('CouponComprato');

Route::get('/editUser/{id}', [UserController::class,'Visualizza1Utente'])->name('editUser');

Route::post('/editUser', [UserController::class,'modificaUtente'])->name('editx');

// rotta in costruzione per stampa e controllo se coupon già comprato
Route::get('stampa',[UserController::class,'stampa'])->name('stampa');

    /*
|--------------------------------------------------------------------------
| ROTTE PER LO STAFF
|--------------------------------------------------------------------------
| la prima rotta serve per visualizzare la pagina privata dello staff
|  la seconda rotta serve per modificare i propri dati |
|
|
|

*/

Route::get('/staff', [StaffController::class, 'staff'])
    ->name('staff');

Route::get('/editStaff/{id}', [StaffController::class,'Visualizza1Staff'])->name('editStaff');

Route::post('/editStaff', [StaffController::class,'modificaStaff'])->name('editStaffxx');


//ROTTE PER IL CRUD DELLE PROMOZIONI
//Route::view('/staff/crudPromozioni', 'couponEdit')
//    ->name('crudPromozioni');
Route::get('/staff/crudPromozioni', [CatalogoController::class, 'visualizzaCoupon'])->name('crudPromozioni');


//Route::get('/staff/crudPromozioni', [StaffController::class, 'modifyCoupon'])->name('crudPromozioni');
//Route::get('/staff/crudPromozioni', [StaffController::class, 'deleteCoupon'])->name('crudPromozioni');
//Route::get('/staff/crudPromozioni', [StaffController::class, 'createCoupon'])->name('crudPromozioni');

//DA CAMBIARE PERCHè NON FA FUNZIONARE LE ROTTE
/*Route::view('/staff/modify', 'editPromo')
    -> name('editPromo');*/
/*Route::get('/modify/{id}', [CatalogoController::class, 'visualizzaCoupon']) ->name('modificaid');
Route::post('/modify', [StaffController::class, 'modifyCoupon']) ->name('modificaP');*/

Route::get('/staff/modify', [\App\Http\Controllers\PromoController::class, 'editPromo'])
    ->name('editPromo');

Route::get('/modify/{id}', [\App\Http\Controllers\PromoController::class,'VisualizzaCoupon2'])->name('editCoupon');

Route::post('/modify', [\App\Http\Controllers\PromoController::class,'update'])->name('editCoupon2');


require __DIR__.'/auth.php';

