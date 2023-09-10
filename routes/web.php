<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\Pos\SupplierController;
use App\Http\Controllers\Pos\CustomerController;

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
    return view('admin.login');
});
Route::get('admin/login/page',[AdminController::class,'AdminLogin'])->name('admin/login');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::middleware(['auth','role:admin'])->group(function () {

    //Admin Controller
    Route::controller(AdminController::class)->group(function (){
        Route::get('admin/dashboard','AdminDashboard')->name('admin/dashboard');
        Route::get('admin/logout','destroy')->name('admin/logout');
        Route::get('admin/profile','AdminProfile')->name('admin/profile');
        Route::post('store/profile','StoreProfile')->name('store/profile');
        Route::get('/admin/change/password','ChangePassword')->name('admin.change.password');
        Route::post('/admin/updadte/password','UpdatePassword')->name('admin.update.password');
    });
    //End Admin Controller

    //Supplier Controller
    Route::controller(SupplierController::class)->group(function (){
        Route::get('supplier/all','SupplierAll')->name('supplier/all');
        Route::get('supplier/add','SupplierAdd')->name('supplier.add');
        Route::post('supplier/store','SupplierStore')->name('supplier.store');
        Route::get('supplier/edit/{id}', 'SupplierEdit')->name('supplier.edit');
        Route::post('supplier/update', 'SupplierUpdate')->name('supplier.update');
        Route::delete('/supplier/delete/{id}', 'SupplierDelete')->name('supplier/delete');

    });
    //End Supplier Controller





}); //End group Admin Middleware

    Route::middleware(['auth','role:agent'])->group(function () {
        Route::controller(AgentController::class)->group(function (){
        Route::get('agent/dashboard','AgentDashboard')->name('agent/dashboard');

        });
    }); //End group Agent Middleware

//test
    Route::get('customer/customer1', function () {
        return view('backend.customer.customer1');
    });

    Route::get('customer/customer2', function () {
        return view('backend.customer.customer2');
    });
    Route::get('customer/customer3', function () {
        return view('backend.customer.customer3');
    });

    //email
    Route::get('email/read', function () {
        return view('email.read');
    });

    Route::get('email/inbox', function () {
        return view('email.inbox');
    });

    Route::get('email/compose', function () {
        return view('email.compose');
    });
