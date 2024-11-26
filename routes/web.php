<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\peliculascontroller;
use App\http\Controllers\logincontroller;
use App\http\Controllers\ventascontroller;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('welcome');
});

Route::get('inicio',[logincontroller::class,'inicio'])->name('inicio');
Route::get('login',[logincontroller::class,'login'])->name('login');
Route::POST('validar',[logincontroller::class,'validar'])->name('validar');
Route::get('cerrarsesion',[logincontroller::class,'cerrarsesion'])->name('cerrarsesion');

Route::get('altapelicula',[peliculascontroller::class,'altapelicula'])->name('altapelicula');
Route::POST('guardapelicula',[peliculascontroller::class,'guardapelicula'])->name('guardapelicula');
Route::get('reportepelicula',[peliculascontroller::class,'reportepelicula'])->name('reportepelicula');
Route::get('editapelicula/{idp}',[peliculascontroller::class,'editapelicula'])->name('editapelicula');
Route::POST('guardacambios',[peliculascontroller::class,'guardacambios'])->name('guardacambios');
Route::get('desactivapelicula/{idp}',[peliculascontroller::class,'desactivapelicula'])->name('desactivapelicula');
Route::get('activapelicula/{idp}',[peliculascontroller::class,'activapelicula'])->name('activapelicula');
Route::get('eliminapelicula/{idp}',[peliculascontroller::class,'eliminapelicula'])->name('eliminapelicula');

Route::get('crearventa',[ventascontroller::class,'crearventa'])->name('crearventa');
Route::get('infocliente',[ventascontroller::class,'infocliente'])->name('infocliente');
Route::get('infoeleccion',[ventascontroller::class,'infoeleccion'])->name('infoeleccion');
Route::get('infogenero',[ventascontroller::class,'infogenero'])->name('infogenero');
Route::get('infopelicula',[ventascontroller::class,'infopelicula'])->name('infopelicula');
Route::get('datospeli',[ventascontroller::class,'datospeli'])->name('datospeli');

Route::get('newpassword',[logincontroller::class,'newpassword'])->name('newpassword');
Route::get('newpassword2',[logincontroller::class,'newpassword2'])->name('newpassword2');
Route::get('validauser',[logincontroller::class,'validauser'])->name('validauser');
Route::get('validauser2',[logincontroller::class,'validauser2'])->name('validauser2');
Route::get('captchanuevo',[logincontroller::class,'captchanuevo'])->name('captchanuevo');
Route::get('mandacorreo',[logincontroller::class,'mandacorreo'])->name('mandacorreo');
Route::get('reinicia/{idu}',[logincontroller::class,'reinicia'])->name('reinicia');
Route::get('cambiapass',[logincontroller::class,'cambiapass'])->name('cambiapass');


Route::get('/prueba',function(){
    //  return new notificacion("Joel");
    $response=Mail::to('j.herreracr@hotmail.com')
                    ->cc('shalojoey3@gmail.com')
                    ->send(new notificacion("Joel","213434"));
    dump($response);
});