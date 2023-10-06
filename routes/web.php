<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotefactionController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\SuggestionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('home');
});
//Auth routes
Auth::routes(['password.request' => false, 'reset' => false]);


//get routes
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/profile/edit', [ProfileController::class, 'profile_edit'])->name('profile.edit');
Route::get('/settings/edit', [ProfileController::class, 'settings_edit'])->name('settings.edit');
Route::get('/notefactions/index', [NotefactionController::class, 'index'])->name('notefactions.index');
Route::get('/notefactions/show/{notefaction}', [NotefactionController::class, 'show'])->name('notefactions.show');
Route::get('/notefactions/all', [NotefactionController::class, 'notefactions_all'])->name('notefactions.all');
Route::get('/user/active/{id}', [UserController::class, 'active'])->name('user.active');
Route::get('/rental/show/{car}', [RentalController::class, 'rental_show'])->name('rental.show');
Route::get('/rental/{rental}', [RentalController::class, 'rental'])->name('rental');
Route::get('/rental/contract/{car}', [RentalController::class, 'rental_contract'])->name('rental.contract');
Route::get('/cars/rental/', [RentalController::class, 'cars_rentals'])->name('cars.rentals');
Route::get('/cars/rental/submit{rental}', [RentalController::class, 'rental_submit'])->name('rental.submit');
Route::get('/cars/rental/end{rental}', [RentalController::class, 'end_rent'])->name('rental.end');
Route::get('/payment/user/info/{id}', [PaymentController::class, 'getInfoUser'])->name('user.get.info');


//POST routes
Route::POST('/profile/update/{user}', [ProfileController::class, 'profile_update'])->name('profile.update');
Route::POST('/settings/update/{user}', [ProfileController::class, 'settings_update'])->name('settings.update');
Route::post('/user/change/email/{user}', [UserController::class, 'changeEmail'])->name('user.change.email');
Route::post('/user/change/password/{user}', [UserController::class, 'changePassword'])->name('user.change.password');




//resources routes
Route::resources([
    'users' => UserController::class,
    'cars' => CarController::class,
    'payments' => PaymentController::class,
    'suggestions' => SuggestionController::class,
]);
