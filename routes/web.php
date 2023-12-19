<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\testController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\PaymentController;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;


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
    $products = Product::where('property_for','=','1')->get();
    return view('welcome',compact('products'));
})->name('/');

Route::get('property_buy',[FrontController::class,'property_buy'])->name('property_buy');

Route::get('property_rent',[FrontController::class,'property_rent'])->name('property_rent');

Route::get('contact',[FrontController::class,'contact'])->name('contact');

Route::get('property_inquiry/{id}',[FrontController::class,'property_inquiry'])->name('property_inquiry');

Route::post('send_pro_spec_inquiry',[FrontController::class,'send_pro_spec_inquiry'])->name('send_pro_spec_inquiry');

Route::get('details/{id}',[FrontController::class,'details'])->name('details');

Route::post('pay',[PaymentController::class,'pay'])->name('payment');

Route::get('success',[PaymentController::class,'success']);

Route::get('error',[PaymentController::class,'error']);

Auth::routes([
    'verify' =>true
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin/home',[App\Http\Controllers\HomeController::class, 'adminHome'] )->name('admin.home')->middleware('is_admin');

Route::get('agent',[App\Http\Controllers\HomeController::class, 'agent'] )->name('agent');

Route::get('admin/agent',[App\Http\Controllers\HomeController::class, 'adminAgent'] )->name('admin.agent')->middleware('is_admin');

Route::get('admin/user',[App\Http\Controllers\HomeController::class, 'adminuser'] )->name('admin.user')->middleware('is_admin');

Route::post('admin/updateUserStatus',[App\Http\Controllers\HomeController::class, 'updateUserStatus'] )->name('admin.updateUserStatus')->middleware('is_admin');

Route::get('agent_profile',[App\Http\Controllers\HomeController::class, 'agent_profile'])->name('agent_profile');

Route::post('update_profile',[App\Http\Controllers\HomeController::class,'update_profile'])->name('update_profile');

Route::post('profile-pic',[App\Http\Controllers\HomeController::class,'profile_pic'])->name('profile_pic');

Route::get('send_inquiry',[App\Http\Controllers\HomeController::class,'send_inquiry'])->name('send_inquiry');

Route::post('inquiry',[App\Http\Controllers\HomeController::class,'inquiry'])->name('inquiry');

Route::get('/fetch-messages',[App\Http\Controllers\HomeController::class,'fetchMessages']);

Route::post('/update-response-status',[App\Http\Controllers\HomeController::class,'update_response_status']);

Route::get('index',[testController::class,'index'])->name('index');

Route::get('/fetch',[QuestionController::class,'fetchInsert'])->name('fetchInsert');

Route::get('/show',[QuestionController::class,'show'])->name('show');

Route::get('product',[ProductController::class,'product'])->name('product');

Route::get('add_product',[ProductController::class,'add_product'])->name('add_product');

Route::post('add_new_product',[ProductController::class,'add_new_product'])->name('add_new_product');

Route::get('gallery/{id}',[ProductController::class ,'gallery'])->name('gallery');

Route::post('property_gallery_update/{id}',[ProductController::class,'property_gallery_update'])->name('property_gallery_update');

Route::any('delete_image',[ProductController::class,'delete_image']);

Route::get('test',[ProductController::class,'test']);
