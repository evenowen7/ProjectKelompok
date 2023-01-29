<?php

use App\Http\Controllers\Authentication_Controller;
use App\Http\Controllers\Home_Controller;
use App\Http\Controllers\Product_Details_Controller;
use App\Models\Product_Category;
use App\Models\Product_Details;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

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

View::composer('header', function($navbarIndex)
{
    $categories_list = Product_Category::get();
    $navbarIndex->with(['categories'=>$categories_list]);
});

Route::get('/', [Home_Controller::class, 'index']);

Route::get('/home', [Home_Controller::class, 'index']);

Route::post('/searchresult', [Home_Controller::class, 'searchIndex']);

Route::get('/register', [Home_Controller::class, 'registerIndex']);
Route::get('/register/id', [Home_Controller::class, 'registerIndexID']);
Route::post('/register', [Authentication_Controller::class, 'registerValidate']);

Route::get('/login', [Home_Controller::class, 'loginIndex']);
Route::get('/login/id', [Home_Controller::class, 'loginIndexID']);
Route::post('/login', [Authentication_Controller::class, 'loginValidate']);

Route::get('/logout', [Authentication_Controller::class, 'logout'])->middleware('loginCheck');

Route::get('/profile', [Home_Controller::class, 'profileIndex'])->middleware('loginCheck');

Route::get('/manage', [Home_Controller::class, 'manageIndex'])->middleware('adminCheck');

Route::get('/product/{id}', [Home_Controller::class, 'productIndex']);

Route::get('/category/{id}', [Home_Controller::class, 'categoryIndex']);

Route::get('/add', [Home_Controller::class, 'addIndex'])->middleware('adminCheck');
Route::post('/add', [Product_Details_Controller::class, 'add_product'])->middleware('adminCheck');

Route::get('/update/{id}', [Home_Controller::class, 'updateIndex'])->middleware('adminCheck');
Route::post('/update/{id}', [Product_Details_Controller::class, 'update_product'])->middleware('adminCheck');

Route::get('/delete/{id}', [Product_Details_Controller::class, 'delete_product'])->middleware('adminCheck');

Route::post('/checkout/{id}', [Product_Details_Controller::class, 'addToCart'])->middleware('userCheck');

Route::get('/cart', [Home_Controller::class, 'cartIndex'])->middleware('userCheck');

Route::get('/deleteCart/{id}', [Product_Details_Controller::class, 'deleteCart'])->middleware('userCheck');

Route::get('/purchase', [Product_Details_Controller::class, 'transferCartHistory'])->middleware('userCheck');

Route::get('/history', [Home_Controller::class, 'historyIndex'])->middleware('userCheck');
