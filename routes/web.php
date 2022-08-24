<?php

use Illuminate\Support\Facades\Route;


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

Route::get('/', function () {
    return view('Client.accueil');
});

Route::prefix('student')->group(function () {
    Route::view('/', 'Client.accueil')->name('accueil.student');
    Route::view('/registration', 'Client.InscriptionForms')->name('inscription');
    Route::view('/about', 'Client.about')->name('about');
    Route::view('/registration_complet', 'Client.registrationComplet')->name('registration_complet');
    Route::get('/formulaire/{matricule}', [\App\Http\Controllers\reporting::class, 'formulaire'])->where('matricule', '(.*)')->name('formulaire');
    Route::get('/profil', \App\Http\Livewire\ProfilEtudiantUpdate::class)->name('profilEtudiant');
    Route::get('/checkout/{matricule}', \App\Http\Livewire\CheckoutInscription::class)->where('matricule', '(.*)')->name('checkout');
});

route::prefix('adminUsakin')->group(function () {
    Auth::routes();

    route::view('/', 'Admin.dashboard')->name('Admin.dashboard')->middleware('auth');
    Route::get('/users', \App\Http\Livewire\Users::class)->name('users.admin')->middleware('auth');
    Route::get('/etudiant', \App\Http\Livewire\EtudiantInscris::class)->name('users.etudiant')->middleware('auth');
    Route::get('/All-etudiant', \App\Http\Livewire\AllStudent::class)->name('users.allEtdiant')->middleware('auth');
    Route::get('/rapport', \App\Http\Livewire\RapportFrais::class)->name('users.rapport')->middleware('auth');
    Route::get('/gestion_faculte', \App\Http\Livewire\FacultePromotion::class)->name('gestion_faculte.admin')->middleware('auth');
    Route::get('/etudiant/{id}', \App\Http\Livewire\FindEtudiantAdmin::class)->name('FindEtudiant')->middleware('auth');
    Route::get('/PaimentFrais', \App\Http\Livewire\PaimentFrais::class)->name('paiement.admin')->middleware('auth');
    route::get('/invoice', [\App\Http\Controllers\reporting::class, 'invoice'])->name('invoice');
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
