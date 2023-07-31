<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\Outlet\OutletController;
use App\Http\Controllers\Outlet\SupplierController;
use App\Http\Controllers\Accountancy\AccountancyController;
use App\Http\Controllers\Member\EstateController;
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

    Route::middleware('role:superadmin,admin,cashier')->group(function () {
        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Purchase
        Route::get('/purchase', [PurchaseController::class, 'index'])->name('purchase');
        Route::get('/purchase/view/{id}', [PurchaseController::class, 'view'])->name('purchase.view');
        Route::get('/purchase/create', [PurchaseController::class, 'create'])->name('purchase.create');
        Route::post('/purchase/store', [PurchaseController::class, 'store'])->name('purchase.store');

        // sale
        Route::get('/sale', [SaleController::class, 'index'])->name('sale');
        Route::get('/sale/create', [SaleController::class, 'create'])->name('sale.create');
        Route::post('/sale/store', [SaleController::class, 'store'])->name('sale.store');
        Route::get('/sale/view/{id}', [SaleController::class, 'view'])->name('sale.view');
        Route::get('/sale/print', [SaleController::class, 'print'])->name('sale.print');
        Route::post('/sale/getData', [SaleController::class, 'getData'])->name('sale.getData');
        Route::post('/purchase/get-items-data', [PurchaseController::class, 'getItemData'])->name('purchase.getitemdata');

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

        //Voucher
        Route::get('/voucher', [\App\Http\Controllers\Voucher\VoucherMemberController::class, 'index'])->name('voucher-member');
        Route::post('/voucher/store', [\App\Http\Controllers\Voucher\VoucherMemberController::class, 'store'])->name('voucher-member.store');
        Route::delete('/voucher/destroy/{id}', [\App\Http\Controllers\Voucher\VoucherMemberController::class, 'destroy'])->name('voucher-member.destroy');

        //warehouse - Adjustments
        Route::get('/warehouse/adjustment', [AdjustmentController::class, 'index'])->name('adjustment');
        Route::get('/warehouse/adjustment/getdata', [AdjustmentController::class, 'getData'])->name('adjustment.getData');
        Route::get('/warehouse/adjustment/update', [AdjustmentController::class, 'update'])->name('adjustment.update');

        //warehouse - Mutation
        Route::get('/warehouse/mutation', [MutationController::class, 'index'])->name('mutation');
        Route::get('/warehouse/mutation/create', [MutationController::class, 'create'])->name('mutation.create');
        Route::get('/warehouse/mutation/getdata', [MutationController::class, 'getData'])->name('mutation.getData');
        Route::get('/warehouse/mutation/update', [MutationController::class, 'update'])->name('mutation.update');

        //accountancy
        Route::get('/accountancy/journal', [AccountancyController::class, 'journal'])->name('accountancy.journal');
        Route::get('/accountancy/journal_view', [AccountancyController::class, 'journal_view'])->name('accountancy.journal_view');

        // Profile
        Route::get('profile', [ProfileController::class, 'index'])->name('profile');
        Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile/destroy', [ProfileController::class, 'destroy'])->name('profile.destroy');

    });

    Route::middleware('role:superadmin,admin')->group(function () {
        // Purchase
        Route::get('/purchase/report', [PurchaseController::class, 'report'])->name('purchase.report');
        Route::get('/purchase/return', [PurchaseController::class, 'return'])->name('purchase.return');
        Route::get('/purchase/return_report', [PurchaseController::class, 'return_report'])->name('purchase.return_report');
        Route::post('/purchase/get-items-data', [PurchaseController::class, 'getItemData'])->name('purchase.getitemdata');

        // Sale
        Route::get('/sale/instalment', [SaleController::class, 'instalment'])->name('sale.instalment');
        Route::get('/sale/create_instalment', [SaleController::class, 'create_instalment'])->name('sale.create_instalment');

        //accountancy
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

        // Purchase - Supplier
        Route::get('/purchase/supplier', [SupplierController::class, 'index'])->name('supplier');
        Route::get('/purchase/supplier/create', [SupplierController::class, 'create'])->name('supplier.create');
        Route::post('/purchase/supplier/store', [SupplierController::class, 'store'])->name('supplier.store');
        Route::get('/purchase/supplier/edit/{id}', [SupplierController::class, 'edit'])->name('supplier.edit');
        Route::put('/purchase/supplier/update', [SupplierController::class, 'update'])->name('supplier.update');
        Route::delete('/purchase/supplier/destroy/{id}', [SupplierController::class, 'destroy'])->name('supplier.destroy');

        // Member - Estate
        Route::get('/member/estate/create', [EstateController::class, 'create'])->name('estate.create');
        Route::post('/member/estate/store', [EstateController::class, 'store'])->name('estate.store');
        Route::get('/member/estate/edit/{id}', [EstateController::class, 'edit'])->name('estate.edit');
        Route::put('/member/estate/update', [EstateController::class, 'update'])->name('estate.update');
        Route::delete('/member/estate/destroy/{id}', [EstateController::class, 'destroy'])->name('estate.destroy');

        // Setting - Log Activity
        Route::get('/setting/log-activity', [LogActivityController::class, 'index'])->name('log-activity');
        Route::get('/setting/log-activity/detail/{id}', [LogActivityController::class, 'detail'])->name('log-activity.detail');
    });

    Route::middleware('role:superadmin')->group(function () {
        // Master Data - Outlet
        Route::get('/outlet/outlet', [OutletController::class, 'index'])->name('outlet');
        Route::post('/outlet/outlet/store', [OutletController::class, 'store'])->name('outlet.store');
        Route::delete('/outlet/outlet/destroy/{id}', [OutletController::class, 'destroy'])->name('outlet.destroy');

        // Setting - User Account
        Route::get('/setting/user-account', [UserAccountController::class, 'index'])->name('user-account');
        Route::get('/setting/user-account/creaete', [UserAccountController::class, 'create'])->name('user-account.create');
        Route::post('/setting/user-account/store', [UserAccountController::class, 'store'])->name('user-account.store');
        Route::get('/setting/user-account/edit/{id}', [UserAccountController::class, 'edit'])->name('user-account.edit');
        Route::put('/setting/user-account/update', [UserAccountController::class, 'update'])->name('user-account.update');
    });

    Route::group([
        'middleware' => 'role:member',
        'prefix' => '_member',
    ], function () {
        // Dashboard Member
        Route::get('/dashboard', [\App\Http\Controllers\RoleMember\MemberDashboardController::class, 'index'])->name('member.dashboard');
        Route::get('/dashboard/view/{id}', [\App\Http\Controllers\RoleMember\MemberDashboardController::class, 'view'])->name('member.dashboard.view');
        Route::post('/reject/{id}', [\App\Http\Controllers\RoleMember\MemberDashboardController::class, 'reject'])->name('member.dashboard.reject');
        Route::post('/approved/{id}', [\App\Http\Controllers\RoleMember\MemberDashboardController::class, 'approved'])->name('member.dashboard.approved');

        // Sales History Member
        Route::get('/history', [\App\Http\Controllers\RoleMember\PurchaseHistoryController::class, 'index'])->name('member.history');
        Route::get('/history/view/{id}', [\App\Http\Controllers\RoleMember\PurchaseHistoryController::class, 'view'])->name('member.history.view');

    });;
});
