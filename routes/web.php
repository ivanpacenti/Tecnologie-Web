<?php

use App\Http\Controllers\CatalogoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OffertaController;
use App\Http\Controllers\FaqsController;

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

Route::get('/user', [UserController::class, 'index'])
        ->name('user')->middleware('can:isUser');


Route::view('/where', 'where')
        ->name('where');

Route::view('/who', 'who')
        ->name('who');*/

// Route::get('/index', function () {
//         return view('home');
// })-> name('index');

Route::view('/index', 'home')
    ->name('index');


Route::get('/catalogotest', [PublicController::class, 'visualizzaCatalogo'])->name('catalogo'); //funzionante

Route::view('/amministratore', 'admin')
    ->name('admin');

//QUESTA è LA PARTE DELL'ADMIN

// prova per visualizzazione Faqs da parte admin
Route::get('/adminFaqs', [PublicController::class, 'VisualizzaFaq'])->name('adminFaqs');

Route::get('/delete/{id}', [PublicController::class,'deleteFaq'])->name('elimina-faq');



//Route::post('/adminFaqs', 'admin')
//    ->name('admin');

//  Rotte aggiunte da Breeze

Route::get('/', function () {
    return view('welcome');
});

/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

*/

require __DIR__.'/auth.php';
