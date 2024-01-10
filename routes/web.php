<?php   

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactsController;

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

Route::get('/', [ContactsController::class, 'index']);

//export Contacts
Route::get('/contact/export', [ContactsController::class, 'export']);

// Show Create Form
Route::get('/contact/create', [ContactsController::class, 'create'])->middleware('auth');

// // Store Contacts Data
Route::post('/contact', [ContactsController::class, 'store'])->middleware('auth');

// Show Edit Form
Route::get('/contact/{contact}/edit', [ContactsController::class, 'edit'])->middleware('auth');

// Update Contacts
Route::put('/contact/{contact}', [ContactsController::class, 'update'])->middleware('auth');

// Delete Contacts
Route::delete('/contact/{contact}', [ContactsController::class, 'destroy'])->middleware('auth');

// Manage Contacts
Route::get('/contact/manage', [ContactsController::class, 'manage'])->middleware('auth');

// Single Contact
Route::get('/contact/{contact}', [ContactsController::class, 'show']);




// Show Register/Create Form
Route::get('/register', [UserController::class, 'register'])->middleware('guest');

// Create New User
Route::post('/users', [UserController::class, 'store']);

// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
