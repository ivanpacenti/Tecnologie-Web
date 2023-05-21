<?php

use App\Http\Controllers\CatalogoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\userController;
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
Route::get('/', [PublicController::class, 'showCatalog1'])
        ->name('catalog1');

Route::get('/selTopCat/{topCatId}', [PublicController::class, 'showCatalog2'])
        ->name('catalog2');

Route::get('/selTopCat/{topCatId}/selCat/{catId}', [PublicController::class, 'showCatalog3'])
        ->name('catalog3');

Route::get('/admin', [AdminController::class, 'index'])
        ->name('admin');

Route::get('/admin/newproduct', [AdminController::class, 'addProduct'])
        ->name('newproduct');;

Route::post('/admin/newproduct', [AdminController::class, 'storeProduct'])
        ->name('newproduct.store');
*/

Route::view('/index', 'home')
    ->name('index');

Route::get('/catalogo', [PublicController::class, 'visualizzaCatalogo'])->name('catalogo'); //funzionante
Route::post('/filtroOfferte', [PublicController::class, 'filtroOfferte'])->name('filtroOfferte');
Route::post('/filtraggioAziende_test', [PublicController::class, 'filtraggioAziende_test'])->name('filtraggioAziende_test');
Route::post('/filtraggioAziende2_test', [PublicController::class, 'filtraggioAziende2_test'])->name('filtraggioAziende2_test');



Route::view('/profilepage', 'profilepage')
    ->name('profilepage');

Route::get('/offerta/{id}', [PublicController::class,'visualizzaDettagliOfferta'])->name('offerdetail');

//ROTTE PER LA VISUALIZZAZIONE DELLE FAQ
Route::view('/Faq', 'publicFaqs')
    ->name('Faq');
Route::get('/Faq',[PublicController::class, 'vis'])->name('visualizza_listaFaq');

//QUESTA è LA PARTE DELL'ADMIN( sono funzionalità a lui riservate), una volta fatta la aprte admin verranno implementate


// possibilità di modificare le faq, in questa ne vedi solo una e scegli, nella rotta seguente modificherai la faq
//Route::get('/edit/{id}', [PublicController::class,'visualizza1Faq'])->name('editid');
//// in questa rotta avviene la vera e propria modifica
//Route::post('/edit', [PublicController::class,'modificaFaq'])->name('edit');
//// in questa rotta vai ad aggiungere una faq
//Route::get('/faqsCreate', [PublicController::class, 'salvafaq'])->name('faqsCreate');
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

*/
//
Route::get('/adminAziende', [AdminController::class, 'VisualizzaAziende'])->name('adminAziende');
Route::get('/adminFaqs', [AdminController::class, 'VisualizzaFaq'])->name('adminFaqs');
Route::get('/delete/{id}', [AdminController::class,'deleteFaq'])->name('elimina-faq');
Route::get('/edit/{id}', [AdminController::class,'visualizza1Faq'])->name('editid');
Route::post('/edit', [AdminController::class,'modificaFaq'])->name('edit');
Route::get('/faqsCreate', [AdminController::class, 'salvafaq'])->name('faqsCreate');
Route::view('/amministratore', 'admin')
    ->name('admin')->middleware('can:isAdmin');
Route::get('/deleteagency/{id}', [AdminController::class,'deleteAgency'])->name('elimina-azienda');

/*
|--------------------------------------------------------------------------
| ROTTE PER L'USER
|--------------------------------------------------------------------------
|
|
|
|
|
|

*/

Route::get('/user', [userController::class, 'index'])
    ->name('user')->middleware('can:isUser');// controllo dell'autenticazione a livello di rotta, se non è l'user non parte la rotta

Route::get('/editUser/{id}', [userController::class,'Visualizza1Utente'])->name('editUser');
Route::post('/editUser', [userController::class,'modificaUtente'])->name('editx');

    /*
|--------------------------------------------------------------------------
| ROTTE PER LO STAFF
|--------------------------------------------------------------------------
|
|
|
|
|
|

*/

Route::get('/staff', [StaffController::class, 'staff'])
    ->name('staff');


// prima di arrivare al  controller
//  Rotte aggiunte da Breeze

/*Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');*/

require __DIR__.'/auth.php';
