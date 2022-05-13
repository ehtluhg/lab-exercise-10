<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\PetController;

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

Auth::routes();

Route::get('/pets', [PetController::class, 'index']);
Route::get('/edit-pet/{id}', [PetController::class, 'showEditForm']);
Route::post('/save-edit-pet', [PetController::class, 'savePetChanges']);
Route::get('/add-pet-form', [PetController::class, 'showNewForm']);
Route::post('/save-new-pet', [PetController::class, 'saveNewPet']);
Route::get('/delete-pet/{id}', [PetController::class, 'deletePet']);