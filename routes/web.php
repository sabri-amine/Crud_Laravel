<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;


###############  Affiche les personnes ############"
Route::get('/',[CrudController::class,"index"])->name('index');

############## Affiche un personne #############
Route::get('profiles/{id}',[CrudController::class,"show"])->name('profile.show');

######## deux methode supprimer #############
Route::delete('profiles/{crud}',[CrudController::class,"delete"])->name('profile.delete');
// Route::delete('profiles/{id}',[CrudController::class,"delete"])->name('profile.delete');
    
########## Ajouter Profile ############
Route::get('create',[CrudController::class,"create"])->name('profile.create');
Route::post('/profiles/store',[CrudController::class,"store"])->name('profile.store');

############# edit #######################

Route::get('/profiles/{profile}/edit',[CrudController::class,"edit"])->name('profiles.edit');
Route::put('/profiles/{profile}',[CrudController::class,"update"])->name('profiles.update');