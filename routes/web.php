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

Route::prefix('student')->group( function (){
    Route::view('/','Client.accueil')->name('accueil.student');
    Route::view('/registration','Client.InscriptionForms')->name('inscription');
    Route::view('/registration_complet','Client.registrationComplet')->name('registration_complet');
    Route::get('/formulaire/{matricule}', [\App\Http\Controllers\reporting::class, 'formulaire'])->where('matricule', '(.*)')->name('formulaire');
});

route::prefix('adminUsakin')->group( function(){
    Auth::routes();

    route::view('/dashboard','Admin.dashboard')->name('Admin.dashboard')->middleware('auth');
    Route::get('/users', \App\Http\Livewire\Users::class)->name('users.admin')->middleware('auth');
    Route::get('/etudiant', \App\Http\Livewire\EtudiantInscris::class)->name('users.etudiant')->middleware('auth');
    Route::get('/gestion_faculte', \App\Http\Livewire\FacultePromotion::class)->name('gestion_faculte.admin')->middleware('auth');
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
