<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\RevisorController;
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

//announcement controls
Route::get('/', [FrontController::class, 'welcome'])->name('home');
Route::get('/nuovo-annuncio', [AnnouncementController::class, 'createAnnouncement'])->middleware('auth')->name('announcementCreate');
Route::get('/dettaglio-annuncio-{announcement}', [AnnouncementController::class, 'showAnnouncement'])->middleware('auth')->name('announcementShow');
                                                    //TODO: middleware necessario??
Route::get('/tutti-annunci', [AnnouncementController::class, 'indexAnnouncement'])->name('announcementIndex');

//category controls
Route::get('/categoria-{category}', [FrontController::class, 'categoryShow'])->name('categoryShow');
// ricerca annuncio
Route::get('/ricerca-annuncio', [FrontController::class, 'searchAnnouncement'])->name('announcementSearch');

// home revisore 
Route::get('/revisor/home', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');

// accetta annuncio
Route::patch('/accetta/annuncio/{announcement}', [RevisorController::class, 'acceptAnnouncement'])->middleware('isRevisor')->name('revisor.accept_announcement');

//Rifiuta annuncio 
Route::patch('/rifiuta/annuncio/{announcement}', [RevisorController::class,'rejectAnnouncement'])->middleware('isRevisor')->name('revisor.reject_announcement');

//Diventa Revisore
Route::get('/richiesta-revisore',[RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('becomeRevisor');

//Rendi utente revisore
Route::get('/rendi-revisore{user}',[RevisorController::class, 'makeRevisor'])->name('makeRevisor');
Route::patch('/annulla-revisione',[RevisorController::class, 'undoLastRevision'])->name('undoLastRevision');

//rotta per le bandierine e le lingue 
Route::post('/lingua-{lang}',[FrontController::class, 'setLanguage'])->name('setLanguageLocale');

Route::get('/test',[FrontController::class, 'test'])->name('test');