<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\Transaction\SaleController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProductController;
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


Route::get('/',           [FrontendController::class,'index']);
Route::get('/cart',       [FrontendController::class,'cart']);
Route::post('/register-user',[FrontendController::class,'registerUser']);
Route::get('/create-user',[FrontendController::class,'createUser']);
/* Administrator route list ------------------------------------------------------*/

Route::get('administrator',[AdministratorController::class,'index']);

//All Sale route
Route::get('sale-upload-excel',[SaleController::class,'addByExcel']);
Route::post('sales-excel-data-review',[SaleController::class,'reviewExcelData']);
Route::get('sales-excel-fetch-editdata',[SaleController::class,'fetchEditExcelData']);
Route::post('sales-excel-update-editdata',[SaleController::class,'updateEditExcelData']);
Route::get('sales-excel-remove-editdata',[SaleController::class,'removeEditExcelData']);
Route::get('sales-excel-upload-alldata',[SaleController::class,'uploadAllExcelData']);
Route::get('add-sale',[SaleController::class,'create']);
Route::post('sales-save-data',[SaleController::class,'store']);
Route::get('sale-report',[SaleController::class,'index']);
Route::get('sales-fetch-editdata',[SaleController::class,'edit']);
Route::post('sales-update-editdata',[SaleController::class,'update']);
Route::get('sales-remove-editdata',[SaleController::class,'destroy']);

//All Stock route
Route::get('purchase',[StockController::class,'create']);
/* -------------------------------------------------------------------------------*/

//All product route
Route::get('products',[ProductController::class,'index'])->name("products");
Route::get('add-product',[ProductController::class,'create']);
Route::post('create-product',[ProductController::class,'store']);


Route::prefix('product')->group(function () {
    Route::get('delete/{id}',[ProductController::class,'destroy'])->name("deleteProduct");
});
/* -------------------------------------------------------------------------------*/

//All Quiz route
Route::get('quiz',[QuizController::class,'create']);
/* -------------------------------------------------------------------------------*/

