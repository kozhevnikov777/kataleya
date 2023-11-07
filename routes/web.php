<?php


use App\Http\Controllers\Category\CreateController;
use App\Http\Controllers\Category\DeleteController;
use App\Http\Controllers\Category\EditController;
use App\Http\Controllers\Category\IndexController;
use App\Http\Controllers\Category\ShowController;
use App\Http\Controllers\Category\StoreController;
use App\Http\Controllers\Category\UpdateController;
use App\Http\Controllers\Main\MainController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function() {

    Route::get('/', MainController::class)->name('main.index');

    Route::group(['prefix'=> 'categories'], function () {
        Route::get('/main', IndexController::class)->name('category.index');
        Route::get('/create', CreateController::class)->name('category.create');
        Route::post('/', StoreController::class)->name('category.store');
        Route::get('/{category}-edit', EditController::class)->name('category.edit');
        Route::get('/{category}-show', ShowController::class)->name('category.show');
        Route::patch('/{category}-update', UpdateController::class)->name('category.update');
        Route::delete('/{category}-delete', DeleteController::class)->name('category.delete');
    });

    Route::group(['prefix'=> 'colors'], function () {
        Route::get('/main', \App\Http\Controllers\Color\IndexController::class)->name('color.index');
        Route::get('/create', \App\Http\Controllers\Color\CreateController::class)->name('color.create');
        Route::post('/', \App\Http\Controllers\Color\StoreController::class)->name('color.store');
        Route::get('/{color}-edit', \App\Http\Controllers\Color\EditController::class)->name('color.edit');
        Route::get('/{color}-show', \App\Http\Controllers\Color\ShowController::class)->name('color.show');
        Route::patch('/{color}-update', \App\Http\Controllers\Color\UpdateController::class)->name('color.update');
        Route::delete('/{color}-delete', \App\Http\Controllers\Color\DeleteController::class)->name('color.delete');
    });

    Route::group(['prefix'=> 'tags'], function () {
        Route::get('/main', \App\Http\Controllers\Tag\IndexController::class)->name('tag.index');
        Route::get('/create', \App\Http\Controllers\Tag\CreateController::class)->name('tag.create');
        Route::post('/', \App\Http\Controllers\Tag\StoreController::class)->name('tag.store');
        Route::get('/{tag}-edit', \App\Http\Controllers\Tag\EditController::class)->name('tag.edit');
        Route::get('/{tag}-show', \App\Http\Controllers\Tag\ShowController::class)->name('tag.show');
        Route::patch('/{tag}-update', \App\Http\Controllers\Tag\UpdateController::class)->name('tag.update');
        Route::delete('/{tag}-delete', \App\Http\Controllers\Tag\DeleteController::class)->name('tag.delete');
    });

    Route::group(['prefix'=> 'users'], function () {
        Route::get('/main', \App\Http\Controllers\User\IndexController::class)->name('user.index');
        Route::get('/create', \App\Http\Controllers\User\CreateController::class)->name('user.create');
        Route::post('/', \App\Http\Controllers\User\StoreController::class)->name('user.store');
        Route::get('/{user}-edit', \App\Http\Controllers\User\EditController::class)->name('user.edit');
        Route::get('/{user}-show', \App\Http\Controllers\User\ShowController::class)->name('user.show');
        Route::patch('/{user}-update', \App\Http\Controllers\User\UpdateController::class)->name('user.update');
        Route::delete('/{user}-delete', \App\Http\Controllers\User\DeleteController::class)->name('user.delete');
    });

    Route::group(['prefix'=> 'products'], function () {
        Route::get('/main', \App\Http\Controllers\Product\IndexController::class)->name('product.index');
        Route::get('/create', \App\Http\Controllers\Product\CreateController::class)->name('product.create');
        Route::post('/', \App\Http\Controllers\Product\StoreController::class)->name('product.store');
        Route::get('/{product}-edit', \App\Http\Controllers\Product\EditController::class)->name('product.edit');
        Route::get('/{product}-show', \App\Http\Controllers\Product\ShowController::class)->name('product.show');
        Route::patch('/{product}-update', \App\Http\Controllers\Product\UpdateController::class)->name('product.update');
        Route::delete('/{product}-delete', \App\Http\Controllers\Product\DeleteController::class)->name('product.delete');
    });

    Route::group(['prefix'=> 'groups'], function () {
        Route::get('/main', \App\Http\Controllers\Group\IndexController::class)->name('group.index');
        Route::get('/create', \App\Http\Controllers\Group\CreateController::class)->name('group.create');
        Route::post('/', \App\Http\Controllers\Group\StoreController::class)->name('group.store');
        Route::get('/{group}-edit', \App\Http\Controllers\Group\EditController::class)->name('group.edit');
        Route::get('/{group}-show', \App\Http\Controllers\Group\ShowController::class)->name('group.show');
        Route::patch('/{group}-update', \App\Http\Controllers\Group\UpdateController::class)->name('group.update');
        Route::delete('/{group}-delete', \App\Http\Controllers\Group\DeleteController::class)->name('group.delete');
    });

    Route::group(['prefix'=> 'orders'], function () {
        Route::get('/main', \App\Http\Controllers\Order\IndexController::class)->name('order.index');
    });

});


Route::group(['prefix' => ''], function() {
Route::get('{page}',\App\Http\Controllers\Client\IndexController::class)->where('page', '.*');
});

