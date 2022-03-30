<?php
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\page\UserPageController;
use App\Http\Controllers\page\HomePageController;
use App\Http\Controllers\page\TrangtraiController;
use App\Http\Controllers\page\WithdrawController;
use App\Http\Controllers\page\DepositController;
use App\Http\Controllers\auth\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::group( ['middleware' => ['auth']], function() {
    Route::get('/', [HomePageController::class, 'index'])->name('page.home');
    Route::get('/home', [HomePageController::class, 'index'])->name('page.home');
    Route::post('/ajax-history', [TrangtraiController::class, 'ajax_history'])->name('page.ajax_history');

    Route::get('/profile', [UserPageController::class, 'profie'])->name('page.profile');
    Route::get('/tiet-kiem', [HomePageController::class, 'tiet_kiem'])->name('page.tiet_kiem');
    Route::post('/tiet-kiem', [HomePageController::class, 'tiet_kiem'])->name('page.tiet_kiem.post');
    Route::get('/trang-trai', [TrangtraiController::class, 'trang_trai'])->name('page.trang_trai');
    Route::get('/page-link', [HomePageController::class, 'pagelink'])->name('page.pagelink');

    Route::get('/upgrade-account', [UserPageController::class, 'upgrade_account'])->name('page.upgrade_account');
    Route::get('/income', [UserPageController::class, 'income'])->name('page.income');
    Route::get('/setting-account', [UserPageController::class, 'setting_account'])->name('page.setting_account');
    Route::get('/deposit', [DepositController::class, 'deposit'])->name('page.deposit');
    Route::post('/deposit', [DepositController::class, 'depositpost'])->name('page.deposit.post');
    Route::get('/withdraw', [WithdrawController::class, 'withdraw'])->name('page.withdraw');
    Route::post('/withdraw', [WithdrawController::class, 'withdrawpost'])->name('page.withdraw.post');
    Route::post('/add-bank', [UserPageController::class, 'addBank'])->name('page.addBank');
    Route::get('/transaction-history', [UserPageController::class, 'transaction_history'])->name('page.transaction_history');
    Route::post('/addChanNuoi',[HomePageController::class, 'addChanNuoi'])->name('addChanNuoi');

    Route::post('/change-password',[UserController::class, 'changePassword'])->name('page.ChangePassword');
    });

Route::match(['get', 'post'],'/register', [UserController::class, 'register'])->name('register');
Route::match(['get', 'post'],'/login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::group( ['middleware' => ['admin']], function() {
    Route::prefix('admin')->group(function () {

        Route::get('/', [HomeController::class, 'index'])->name('admin.home');
        Route::get('/users', [UserController::class, 'index'])->name('admin.users');
        Route::get('/deposit', [HomeController::class, 'deposit'])->name('admin.deposit');
        Route::get('/withdraw', [HomeController::class, 'withdraw'])->name('admin.withdraw');
        Route::post('/ajax-duyet', [HomeController::class, 'duyet'])->name('admin.duyet');
        Route::post('/ajax-duyetrut', [HomeController::class, 'duyetrut'])->name('admin.duyetrut');
        Route::resource('/product', ProductController::class);
        Route::get('/chitiettaikhoan/{id}', [HomeController::class, 'chitiettaikhoan'])->name('admin.chitiettaikhoan');


    });
});

