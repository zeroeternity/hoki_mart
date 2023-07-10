<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\MasterData\BankAcountController;
use App\Http\Controllers\MasterData\EstateController;
use App\Http\Controllers\MasterData\OutletController;
use App\Http\Controllers\MasterData\SupplierController;
use App\Http\Controllers\MasterData\UnitController;
use App\Http\Controllers\Accountancy\AccountancyController;
use App\Http\Controllers\Member\MemberController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Purchase\PurchaseController;
use App\Http\Controllers\Warehouse\WarehouseController;
use App\Http\Controllers\Sale\SaleController;
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

// Auth
Route::controller(AuthenticationController::class)->group(function () {
    Route::get('/', 'index')->name('auth');
    Route::post('/signin', 'signin');
    Route::get('/signup', 'signup');
});

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index']);

// Purchase
Route::get('/purchase', [PurchaseController::class, 'index'])->name('purchase');
Route::get('/purchase/view', [PurchaseController::class, 'view'])->name('purchase.view');
Route::get('/purchase/create', [PurchaseController::class, 'create'])->name('purchase.create');
Route::get('/purchase/report', [PurchaseController::class, 'report'])->name('purchase.report');
Route::get('/purchase/return', [PurchaseController::class, 'return'])->name('purchase.return');
Route::get('/purchase/return_report', [PurchaseController::class, 'return_report'])->name('purchase.return_report');

// sale
Route::get('/sale', [SaleController::class, 'index'])->name('sale');
Route::get('/sale/create', [SaleController::class, 'create'])->name('sale.create');
Route::get('/sale/instalment', [SaleController::class, 'instalment'])->name('sale.instalment');
Route::get('/sale/create_instalment', [SaleController::class, 'create_instalment'])->name('sale.create_instalment');

//warehouse
Route::get('/warehouse', [WarehouseController::class, 'index'])->name('warehouse');
Route::get('/warehouse/mutation', [WarehouseController::class, 'mutation'])->name('warehouse.mutation');
Route::get('/warehouse/adjust', [WarehouseController::class, 'adjust'])->name('warehouse.adjust');
Route::get('/warehouse/stock', [WarehouseController::class, 'stock'])->name('warehouse.stock');
Route::get('/warehouse/stock_outlet', [WarehouseController::class, 'stock_outlet'])->name('warehouse.stock_outlet');

//accountancy
Route::get('/accountancy/journal', [AccountancyController::class, 'journal'])->name('accountancy.journal');
Route::get('/accountancy/ledger', [AccountancyController::class, 'ledger'])->name('accountancy.ledger');
Route::get('/accountancy/pph', [AccountancyController::class, 'pph'])->name('accountancy.pph');
Route::get('/accountancy/calculation', [AccountancyController::class, 'calculation'])->name('accountancy.calculation');
Route::get('/accountancy/balance', [AccountancyController::class, 'balance'])->name('accountancy.balance');
Route::get('/accountancy/trial', [AccountancyController::class, 'trial'])->name('accountancy.trial');

// Member
Route::get('/member', [MemberController::class, 'index'])->name('member');

// Master Data - Outlet
Route::get('/master-data/outlet', [OutletController::class, 'index'])->name('outlet');
Route::post('/master-data/outlet/store', [OutletController::class, 'store'])->name('outlet.store');
Route::delete('/master-data/outlet/destroy/{id}', [OutletController::class, 'destroy'])->name('outlet.destroy');

// Master Data - Unit
Route::get('/master-data/unit', [UnitController::class, 'index'])->name('unit');
Route::post('/master-data/unit/store', [UnitController::class, 'store'])->name('unit.store');
Route::delete('/master-data/unit/destroy/{id}', [UnitController::class, 'destroy'])->name('unit.destroy');

// Master Data - Supplier
Route::get('/master-data/supplier', [SupplierController::class, 'index'])->name('supplier');
Route::get('/master-data/supplier/create', [SupplierController::class, 'create'])->name('supplier.create');
Route::post('/master-data/supplier/store', [SupplierController::class, 'store'])->name('supplier.store');
Route::get('/master-data/supplier/edit/{id}', [SupplierController::class, 'edit'])->name('supplier.edit');
Route::put('/master-data/supplier/update', [SupplierController::class, 'update'])->name('supplier.update');
Route::delete('/master-data/supplier/destroy/{id}', [SupplierController::class, 'destroy'])->name('supplier.destroy');

// Master Data - Estate
Route::get('/master-data/estate', [EstateController::class, 'index'])->name('estate');
Route::get('/master-data/estate/create', [EstateController::class, 'create'])->name('estate.create');
Route::post('/master-data/estate/store', [EstateController::class, 'store'])->name('estate.store');
Route::get('/master-data/estate/edit/{id}', [EstateController::class, 'edit'])->name('estate.edit');
Route::put('/master-data/estate/update', [EstateController::class, 'update'])->name('estate.update');
Route::delete('/master-data/estate/destroy/{id}', [EstateController::class, 'destroy'])->name('estate.destroy');



Route::get('/bukubesar', function () {
    return view('bukubesar');
});

Route::get('/invoice', function () {
    return view('invoice');
});

// Profile
Route::middleware('auth')->group(function () {
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/destroy', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
