<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\MasterData\BankAcountController;
use App\Http\Controllers\MasterData\EstateController;
use App\Http\Controllers\MasterData\OutletController;
use App\Http\Controllers\MasterData\SupplierController;
use App\Http\Controllers\Accountancy\AccountancyController;
use App\Http\Controllers\Member\MemberController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Purchase\PurchaseController;
use App\Http\Controllers\Warehouse\WarehouseController;
use App\Http\Controllers\Warehouse\AdjustmentController;
use App\Http\Controllers\Warehouse\UnitController;
use App\Http\Controllers\Warehouse\GroupController;
use App\Http\Controllers\Sale\SaleController;
use App\Http\Controllers\Setting\LogActivityController;
use App\Http\Controllers\Setting\UserAccountController;
use App\Http\Controllers\Warehouse\ItemController;
use App\Http\Controllers\Warehouse\MutationController;
use App\Http\Controllers\Warehouse\PPNTypeController;
use App\Http\Controllers\Warehouse\VoucherController;
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

Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // Purchase
    Route::get('/purchase', [PurchaseController::class, 'index'])->name('purchase');
    Route::get('/purchase/view', [PurchaseController::class, 'view'])->name('purchase.view');
    Route::get('/purchase/create', [PurchaseController::class, 'create'])->name('purchase.create');
    Route::get('/purchase/report', [PurchaseController::class, 'report'])->name('purchase.report');
    Route::get('/purchase/return', [PurchaseController::class, 'return'])->name('purchase.return');
    Route::post('/purchase/store', [PurchaseController::class, 'store'])->name('purchase.store');
    Route::post('/purchase/update', [PurchaseController::class, 'update'])->name('purchase.update');
    Route::get('/purchase/return_report', [PurchaseController::class, 'return_report'])->name('purchase.return_report');
    Route::post('/purchase/get-items-data', [PurchaseController::class, 'getItemData'])->name('purchase.getitemdata');

    // sale
    Route::get('/sale', [SaleController::class, 'index'])->name('sale');
    Route::get('/sale/create', [SaleController::class, 'create'])->name('sale.create');
    Route::get('/sale/instalment', [SaleController::class, 'instalment'])->name('sale.instalment');
    Route::get('/sale/create_instalment', [SaleController::class, 'create_instalment'])->name('sale.create_instalment');

    //warehouse
    Route::get('/warehouse/mutation', [WarehouseController::class, 'mutation'])->name('warehouse.mutation');
    Route::get('/warehouse/stock', [WarehouseController::class, 'stock'])->name('warehouse.stock');
    Route::get('/warehouse/stock_outlet', [WarehouseController::class, 'stock_outlet'])->name('warehouse.stock_outlet');

    //warehouse - Item
    Route::get('/warehouse/item', [ItemController::class, 'index'])->name('item');
    Route::get('/warehouse/item/create', [ItemController::class, 'create'])->name('item.create');
    Route::post('/warehouse/item/stores', [ItemController::class, 'store'])->name('item.store');
    Route::get('/warehouse/item/edit/{id}', [ItemController::class, 'edit'])->name('item.edit');
    Route::put('/warehouse/item/update', [ItemController::class, 'update'])->name('item.update');

    //warehouse - Units
    Route::get('/warehouse/unit', [UnitController::class, 'index'])->name('unit');
    Route::post('/warehouse/unit/store', [UnitController::class, 'store'])->name('unit.store');
    Route::delete('/warehouse/unit/destroy/{id}', [UnitController::class, 'destroy'])->name('unit.destroy');

    //warehouse - Group
    Route::get('/warehouse/group', [GroupController::class, 'index'])->name('group');
    Route::post('/warehouse/group/store', [GroupController::class, 'store'])->name('group.store');
    Route::delete('/warehouse/group/destroy/{id}', [GroupController::class, 'destroy'])->name('group.destroy');

    //warehouse - Jenis PPN & Non PPN
    Route::get('/warehouse/ppn', [PPNTypeController::class, 'index'])->name('ppn');
    Route::post('/warehouse/ppn/store', [PPNTypeController::class, 'store'])->name('ppn.store');
    Route::delete('/warehouse/ppn/destroy/{id}', [PPNTypeController::class, 'destroy'])->name('ppn.destroy');

    //warehouse - Voucher
    Route::get('/warehouse/voucher', [VoucherController::class, 'index'])->name('voucher');
    Route::post('/warehouse/voucher/store', [VoucherController::class, 'store'])->name('voucher.store');
    Route::delete('/warehouse/voucher/destroy/{id}', [VoucherController::class, 'destroy'])->name('voucher.destroy');

    //warehouse - Adjustments
    Route::get('/warehouse/adjustment', [AdjustmentController::class, 'index'])->name('adjustment');
    Route::get('/warehouse/adjustment/getdata', [AdjustmentController::class, 'getData'])->name('adjustment.getData');
    Route::get('/warehouse/adjustment/update', [AdjustmentController::class, 'update'])->name('adjustment.update');

    //warehouse - Mutation
    Route::get('/warehouse/mutation', [MutationController::class, 'index'])->name('mutation');
    Route::get('/warehouse/mutation/getdata', [MutationController::class, 'getData'])->name('mutation.getData');
    Route::get('/warehouse/mutation/update', [MutationController::class, 'update'])->name('mutation.update');

    //accountancy
    Route::get('/accountancy/journal', [AccountancyController::class, 'journal'])->name('accountancy.journal');
    Route::get('/accountancy/ledger', [AccountancyController::class, 'ledger'])->name('accountancy.ledger');
    Route::get('/accountancy/pph', [AccountancyController::class, 'pph'])->name('accountancy.pph');
    Route::get('/accountancy/calculation', [AccountancyController::class, 'calculation'])->name('accountancy.calculation');
    Route::get('/accountancy/balance', [AccountancyController::class, 'balance'])->name('accountancy.balance');
    Route::get('/accountancy/trial', [AccountancyController::class, 'trial'])->name('accountancy.trial');

    // Member Data, Type and Position
    Route::get('/member', [MemberController::class, 'index'])->name('member');
    Route::get('/member/data/create', [MemberController::class, 'createData'])->name('member.create.data');
    Route::get('/member/type/create', [MemberController::class, 'createType'])->name('member.create.type');
    Route::get('/member/position/create', [MemberController::class, 'createPosition'])->name('member.create.position');
    Route::post('/member/data/store', [MemberController::class, 'storeData'])->name('member.store.data');
    Route::post('/member/type/store', [MemberController::class, 'storeType'])->name('member.store.type');
    Route::post('/member/position/store', [MemberController::class, 'storePosition'])->name('member.store.position');
    Route::get('/member/data/edit/{id}', [MemberController::class, 'editData'])->name('member.edit.data');
    Route::get('/member/type/edit/{id}', [MemberController::class, 'editType'])->name('member.edit.type');
    Route::get('/member/position/edit/{id}', [MemberController::class, 'editPosition'])->name('member.edit.position');
    Route::put('/member/data/update', [MemberController::class, 'updateData'])->name('member.update.data');
    Route::put('/member/type/update', [MemberController::class, 'updateType'])->name('member.update.type');
    Route::put('/member/position/update', [MemberController::class, 'updatePosition'])->name('member.update.position');

    // Master Data - Outlet
    Route::get('/master-data/outlet', [OutletController::class, 'index'])->name('outlet');
    Route::post('/master-data/outlet/store', [OutletController::class, 'store'])->name('outlet.store');
    Route::delete('/master-data/outlet/destroy/{id}', [OutletController::class, 'destroy'])->name('outlet.destroy');

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

    // Setting - Log Activity
    Route::get('/setting/log-activity', [LogActivityController::class, 'index'])->name('log-activity');
    Route::get('/setting/log-activity/detail/{id}', [LogActivityController::class, 'detail'])->name('log-activity.detail');

    // Setting - User Account
    Route::get('/setting/user-account', [UserAccountController::class, 'index'])->name('user-account');
    Route::get('/setting/user-account/creaete', [UserAccountController::class, 'create'])->name('user-account.create');
    Route::post('/setting/user-account/store', [UserAccountController::class, 'store'])->name('user-account.store');
    Route::get('/setting/user-account/edit/{id}', [UserAccountController::class, 'edit'])->name('user-account.edit');
    Route::put('/setting/user-account/update', [UserAccountController::class, 'update'])->name('user-account.update');

    Route::get('/bukubesar', function () {
        return view('bukubesar');
    });

    Route::get('/invoice', function () {
        return view('invoice');
    });

    // Profile
        Route::get('profile', [ProfileController::class, 'index'])->name('profile');
        Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile/destroy', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
