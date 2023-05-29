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
Route::view('/', 'home')->name('index');
Route::view('/dovesiamo', 'dovesiamo')->name('dovesiamo');
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
    Route::get('/adminFaqs', [AdminController::class, 'VisualizzaFaq'])->name('adminFaqs')->middleware('can:isAdmin');
    Route::get('/delete/{id}', [AdminController::class,'deleteFaq'])->name('elimina-faq')->middleware('can:isAdmin');
    Route::get('/edit/{id}', [AdminController::class,'visualizza1Faq'])->name('editid')->middleware('can:isAdmin');
    Route::post('/edit', [AdminController::class,'modificaFaq'])->name('edit')->middleware('can:isAdmin');
    Route::view('/faqsCreate','adminView.faqsCreate')->name('faqsCreate')->middleware('can:isAdmin');
    Route::post('/faqsCreate', [AdminController::class, 'salvafaq'])->name('faqsCreate2')->middleware('can:isAdmin');

    Route::view('/amministratore', 'admin')->name('admin')->middleware('can:isAdmin');
    Route::get('/visualizzaUtente', [AdminController::class,'visualizzaUtente'])->name('visualizzaUtente')->middleware('can:isAdmin');
    Route::get('/deleteUser/{id}', [AdminController::class,'deleteUser'])->name('deleteUser')->middleware('can:isAdmin');

    Route::get('/adminAziende', [AdminController::class, 'VisualizzaAziende'])->name('adminAziende')->middleware('can:isAdmin');
    Route::view('/agencycreate', 'adminView.agencycreate')->name('agencycreate')->middleware('can:isAdmin');
    Route::post('/agencycreate', [AdminController::class, 'createAgency'])->name('agencycreate2')->middleware('can:isAdmin');
    Route::get('/agencyedit/{id}', [AdminController::class,'modifica1Azienda'])->name('agencyeditid')->middleware('can:isAdmin');
    Route::post('/agencyedit', [AdminController::class,'modificaAzienda'])->name('agencyedit')->middleware('can:isAdmin');
    Route::get('/deleteagency/{id}', [AdminController::class,'deleteAgency'])->name('elimina-azienda')->middleware('can:isAdmin');


// ROTTE PER LE STATISTICHE
Route::view('/statistiche', 'adminView.statistiche')->name('statistiche')->middleware('can:isAdmin');
Route::get('/totaleCoupon',[AdminController::class,'NumeroCoupon'])->name('NumeroCoupon')->middleware('can:isAdmin');
Route::get('/VisualizzaOfferteS',[AdminController::class,'VisualizzaOfferte'])->name('VisualizzaOfferteS')->middleware('can:isAdmin');
Route::get('/CouponOfferta{id}',[AdminController::class,'CouponOfferta'])->name('CouponOfferta')->middleware('can:isAdmin');
Route::get('/CouponUtente{id}',[AdminController::class,'CouponUtente'])->name('CouponUtente')->middleware('can:isAdmin');


// CRUD DELLO STAFF
//*valeria
// creo la rotta per la visualizzazione, li chiamo uguale cosi non faccio confusione, quindi vado sull'admin controller e creo la funzione, questa rotta è da richiamare dalla navbar
Route::get('/VisualizzaStaff',[AdminController::class,'VisualizzaStaff'])->name('VisualizzaStaff')->middleware('can:isAdmin');
//Route::get('/eliminastaff/{id}', [AdminController::class,'EliminaStaff'])->name('EliminaStaff'); IO UTILIZZO UNA ROTTA FATTA IN PASSATO, VALERIA LA DEVI FARE SIMILE
Route::get('/ModificaStaff/{id}', [AdminController::class,'ModificaStaff1'])->name('ModificaStaff1')->middleware('can:isAdmin');
Route::post('/ModificaStaff', [AdminController::class,'ModificaStaff'])->name('ModificaStaff')->middleware('can:isAdmin');
Route::view('/staffcreate','adminView.staffcreate')->name('staffcreate')->middleware('can:isAdmin'); // prima rotta di sola visualizzazione
Route::post('/staffcreate', [AdminController::class, 'staffcreate'])->name('staffcreate')->middleware('can:isAdmin');// prima rotta di sola visualizzazione
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
    ->name('user')->middleware('can:isUser');

Route::get('/couponComprato', [UserController::class, 'CouponComprato'])
    ->name('CouponComprato')->middleware('can:isUser');

Route::get('/editUser/{id}', [UserController::class,'Visualizza1Utente'])->name('editUser')->middleware('can:isUser');

Route::post('/editUser', [UserController::class,'modificaUtente'])->name('editx')->middleware('can:isUser');

// rotta in costruzione per stampa e controllo se coupon già comprato
Route::get('stampa',[UserController::class,'stampa'])->name('stampa')->middleware('can:isUser');

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
    ->name('staff')->middleware('can:isStaff');

Route::get('/editStaff/{id}', [StaffController::class,'Visualizza1Staff'])->name('editStaff')->middleware('can:isStaff');

Route::post('/editStaff', [StaffController::class,'modificaStaff'])->name('editStaffxx')->middleware('can:isStaff');



//ROTTE PER IL CRUD DELLE PROMOZIONI
Route::get('/staff/crudPromozioni', [CatalogoController::class, 'visualizzaCoupon'])->name('crudPromozioni')->middleware('can:isStaff');
// prima rotta per la visualizzazione delle offerte
Route::get('/VisualizzaOfferte', [StaffController::class, 'visualizzaOfferte'])->name('visualizzaOfferte')->middleware('can:isStaff');
//rotta per eliminare un'offerta
Route::get('/EliminaOfferta/{id}', [StaffController::class,'EliminaOfferta'])->name('EliminaOfferta')->middleware('can:isStaff');
//rotta per modificare un'offerta
Route::get('/ModificaOfferta/{id}', [StaffController::class, 'Modifica1Offerta'])->name('ModificaOfferta')->middleware('can:isStaff');
Route::post('/ModificaOfferta', [StaffController::class, 'ModificaOfferta'])->name('ModificaOffertaxx')->middleware('can:isStaff');
//rotta per creare/aggiungere una nuova offerta
Route::view('/createOfferta','staffView.CreaOfferta')->name('CreaOfferta')->middleware('can:isStaff');
Route::post('/createOfferta', [StaffController::class, 'Creaofferta'])->name('CreaOfferta')->middleware('can:isStaff');



require __DIR__.'/auth.php';

