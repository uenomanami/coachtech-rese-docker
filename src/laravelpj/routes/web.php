<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdministorController;
use App\Http\Controllers\StoremanagerController;
use App\Http\Controllers\StoreDateController;
use App\Http\Controllers\MailSendController;
use App\Http\Controllers\QrCodeReserveController;
use App\Http\Controllers\PaymentController;

use Illuminate\Support\Facades\Mail;
use App\Mail\Test;


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

Route::get('/', [StoreController::class, 'index']);
Route::get('/search', [StoreController::class, 'search']);

Route::post('/favorite', [FavoriteController::class, 'create'])->name('favorite');
Route::post('/favorite/delete', [FavoriteController::class, 'delete'])->name('favorite.delete');

Route::prefix('detail')->group(function () {
    Route::get('', [StoreController::class, 'detail']);

    Route::prefix('reserve')->group(function () {
        Route::post('', [ReserveController::class, 'create'])->name('reserve');
        Route::post('delete', [ReserveController::class, 'delete'])->name('reserve.delete');
        Route::post('update', [ReserveController::class, 'update'])->name('reserve.update');
    });

    Route::post('comment', [CommentController::class, 'create'])->name('comment');
});

Route::get('/mypage', [UserController::class, 'mypage'])->middleware('auth');

Route::group(
    ['middleware' => ['auth', 'can:administor']],
    function () {
        Route::prefix('administor')->group(
            function () {
                Route::get('', [AdministorController::class, 'index']);
                Route::post('', [AdministorController::class, 'create']);
                Route::get('mail', [MailSendController::class, 'index']);
                Route::post('mail', [MailSendController::class, 'send']);
            }
        );
    }
);

Route::group(
    ['middleware' => ['verified', 'can:storemanager']],
    function () {
        Route::prefix('storemanager')->group(function () {
            Route::get('', [StoremanagerController::class, 'index']);
            Route::post('create', [StoremanagerController::class, 'create'])->name('storemanager.create');
            Route::get('reserve', [StoremanagerController::class, 'reserve'])->name('storemanager.reserve');
            Route::get('edit', [StoremanagerController::class, 'edit']);
            Route::post('edit', [StoremanagerController::class, 'update'])->name('storeinfo.update');
            Route::post('storedate/create', [StoreDateController::class, 'create'])->name('storedate.create');
            Route::post('storedate/delete', [StoreDateController::class, 'delete'])->name('storedate.delete');
        });
    }
);

Route::prefix('payment')->group(
    function () {
        Route::get('', [PaymentController::class, 'index'])->name('payment');
        Route::post('/form', [PaymentController::class, 'payment'])->name('payment.form');
        Route::get('/complete', [PaymentController::class, 'complete'])->name('payment.complete');
    }
);

Route::get('/thanks', function () {
    return view('thanks');
});

Route::get('/reserve/qrcode', [QrCodeReserveController::class, 'index'])->name('reserve.qrcode');

require __DIR__ . '/auth.php';
