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
    return view('welcome');
});

Route::group(['middleware'=>'auth'], function() { 
    Route::group(['middleware'=>['auth','is_admin']], function() {
//PLANETES :
// Pas 2. LListat de tots els planetes
Route::get('/planets', [App\Http\Controllers\PlanetController::class, 'index'])->name('planets.index');

// Pas 3. Obtenir dades d'un planeta en concret
Route::get('/planets/show/{id}', [App\Http\Controllers\PlanetController::class, 'show'])->name('planets.show');

Route::get('/planets/create', [App\Http\Controllers\PlanetController::class, 'create'])->name('planets.create');

Route::post('/planets/store', [App\Http\Controllers\PlanetController::class, 'store'])->name('planets.store');

Route::get('/planets/destroy/{id}', [App\Http\Controllers\PlanetController::class, 'destroy'])->name('planets.destroy');

Route::get('/planets/edit/{id}', [App\Http\Controllers\PlanetController::class, 'edit'])->name('planets.edit');

Route::post('/planets/update/{id}', [App\Http\Controllers\PlanetController::class, 'update'])->name('planets.update');
//SUPER POWERS :
Route::get('/superpowers', [App\Http\Controllers\SuperPowerController::class, 'index'])->name('superPower.index');
Route::get('/superpowers/show/{id}', [App\Http\Controllers\SuperPowerController::class, 'show'])->name('superPower.show');
Route::get('/superpowers/create', [App\Http\Controllers\SuperPowerController::class, 'create'])->name('superPower.create');
Route::post('/superpowers/store', [App\Http\Controllers\SuperPowerController::class, 'store'])->name('superPower.store');
Route::get('/superpowers/destroy/{id}', [App\Http\Controllers\SuperPowerController::class, 'destroy'])->name('superPower.destroy');
Route::get('/superpowers/edit/{id}', [App\Http\Controllers\SuperPowerController::class, 'edit'])->name('superPower.edit');
Route::post('/superpowers/update/{id}', [App\Http\Controllers\SuperPowerController::class, 'update'])->name('superPower.update');

});
//Herois
Route::get('/superheroes', [App\Http\Controllers\SuperheroController::class, 'index'])->name('superhero.index');
Route::get('/superheroes/show/{id}', [App\Http\Controllers\SuperheroController::class, 'show'])->name('superhero.show');
Route::get('/superhero/create', [App\Http\Controllers\SuperheroController::class, 'create'])->name('superhero.create');
Route::post('/superhero/store', [App\Http\Controllers\SuperheroController::class, 'store'])->name('superhero.store');
Route::get('/superhero/destroy/{id}', [App\Http\Controllers\SuperheroController::class, 'destroy'])->name('superhero.destroy');
Route::get('/superhero/edit/{id}', [App\Http\Controllers\SuperheroController::class, 'edit'])->name('superhero.edit');
Route::post('/superhero/update/{id}', [App\Http\Controllers\SuperheroController::class, 'update'])->name('superhero.update');
Route::get('/superheroes/poders/{id}', [App\Http\Controllers\SuperheroController::class, 'poders'])->name('superhero.poders');
Route::post('/superheroes/poders/modificar/{id}/{id_power}/', [App\Http\Controllers\SuperheroController::class, 'edit_superpower'])->name('superhero.edit_superpower');
Route::get('/superheroes/poders/delete/{id}/{id_power}/', [App\Http\Controllers\SuperheroController::class, 'delete_superpower'])->name('superhero.delete_superpower');
Route::post('/superheroes/poders/afegir/{id}/', [App\Http\Controllers\SuperheroController::class, 'add_superpower'])->name('superhero.add_superpower');
//Els meus superherois
//Herois
Route::get('/mysuperheroes', [App\Http\Controllers\MySuperheroController::class, 'index'])->name('mysuperhero.index');
Route::get('/mysuperheroes/show/{id}', [App\Http\Controllers\MySuperheroController::class, 'show'])->name('mysuperhero.show');
Route::get('/mysuperhero/create', [App\Http\Controllers\MySuperheroController::class, 'create'])->name('mysuperhero.create');
Route::post('/mysuperhero/store', [App\Http\Controllers\MySuperheroController::class, 'store'])->name('mysuperhero.store');
Route::get('/mysuperhero/destroy/{id}', [App\Http\Controllers\MySuperheroController::class, 'destroy'])->name('mysuperhero.destroy');
Route::get('/mysuperhero/edit/{id}', [App\Http\Controllers\MySuperheroController::class, 'edit'])->name('mysuperhero.edit');
Route::post('/mysuperhero/update/{id}', [App\Http\Controllers\MySuperheroController::class, 'update'])->name('mysuperhero.update');
Route::get('/mysuperheroes/poders/{id}', [App\Http\Controllers\MySuperheroController::class, 'poders'])->name('mysuperhero.poders');
Route::post('/mysuperheroes/poders/modificar/{id}/{id_power}/', [App\Http\Controllers\MySuperheroController::class, 'edit_superpower'])->name('mysuperhero.edit_superpower');
Route::get('/mysuperheroes/poders/delete/{id}/{id_power}/', [App\Http\Controllers\MySuperheroController::class, 'delete_superpower'])->name('mysuperhero.delete_superpower');
Route::post('/mysuperheroes/poders/afegir/{id}/', [App\Http\Controllers\MySuperheroController::class, 'add_superpower'])->name('mysuperhero.add_superpower');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
