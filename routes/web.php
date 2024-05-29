<?php

use App\Http\Controllers\AccueilController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\fournisseurController;
use App\Http\Controllers\categorieController;
use App\Http\Controllers\EquipeController;
use App\Http\Controllers\ExpertiseController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PartenaireController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\PubController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\TemoignageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AccueilController::class, 'accueil'])->name ('accueil');
Route::get('service', [AccueilController::class, 'service'])->name ('service');

//     return view('Front.page.main');
// 

// Route::get('/blog', function(){
//     return 'hello world';

// });


Route::prefix('Admin/')->group(function(){
    Route::middleware(['auth:web'])->group(function(){
        Route::view('/','Admin.pages.main')->name('dashboard');
        //debut du module client
        Route::resource('/client',ClientController::class);
        Route::get('/client/activer/{id}',[ClientController::class, 'activer'])->name('client.activer');

        // debut du module fournisseur
        Route::resource('/fournisseur',fournisseurController::class);
        Route::get('/fournisseur/activer/{id}',[fournisseurController::class, 'activer'])->name('fournisseur.activer');

        // debut du module categorie
        Route::get('/categorie/activer/{id}',[categorieController::class, 'activer'])->name('categorie.activer');
        Route::resource('/categorie',categorieController::class);

        //debut du module produit
        Route::get('/produit/activer/{id}',[ProduitController::class, 'activer'])->name('produit.activer');
        Route::resource('/produit',ProduitController::class);

        ///////////////
        Route::resource('/Slide',SlideController::class);
        Route::get('/Slide/activer/{id}',[SlideController::class, 'activer'])->name('Slide.activer');
        
        Route::resource('/pub',PubController::class);
        Route::get('/pub/activer/{id}',[PubController::class, 'activer'])->name('pub.activer');
            //page
        Route::resource('/page',PageController::class);
        Route::get('/page/activer/{id}',[PageController::class, 'activer'])->name('page.activer');

            //Temoignage
        Route::resource('/temoignage',TemoignageController::class);
        Route::get('/temoignage/activer/{id}',[TemoignageController::class, 'activer'])->name('temoignage.activer');

        //Partenaire
        Route::resource('/partenaire',PartenaireController::class);
        Route::get('/partenaire/activer/{id}',[PartenaireController::class, 'activer'])->name('partenaire.activer');

        //Blog
        Route::resource('/blog',BlogController::class);
        Route::get('/blog/activer/{id}',[BlogController::class, 'activer'])->name('blog.activer');

        // equipe
        Route::resource('/equipe',EquipeController::class);
        Route::get('/equipe/activer/{id}',[EquipeController::class, 'activer'])->name('equipe.activer');

        //Expertise
        Route::resource('/expertise',ExpertiseController::class);
        Route::get('/expertise/activer/{id}',[ExpertiseController::class, 'activer'])->name('expertise.activer');
    });
});


//Route::get('/dashboard', function () {
  //  return view('Admin.index'); 
//})->middleware(['auth', 'verified'])->name('dashboard');
//  Route::put('/client/update/{id}', 'ClientController@update')->name('Client.update');

Route::middleware('auth')->group(function(){
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

require __DIR__ . '/auth.php';
require __DIR__ . '/Clientauth.php';
