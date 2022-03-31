<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ClientController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PackageController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\SettingsController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\HeroController;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Backend\MenuBuilderController;
use App\Http\Controllers\Backend\TrainingController;
use Illuminate\Support\Facades\Route;



// Auth::routes();
Route::get('admin/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('admin/login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register'])->name('register');


//Backend Routes
Route::group([
    'as'=>'admin.',
    'prefix' => 'admin',
    'namespace' => 'Backend',
    'middleware' => ['auth'],
    ], function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::group(['as'=>'service.','prefix' => 'service'],function() {
        Route::get('/all',[ServiceController::class, 'index'])->name('index');
        Route::get('/create',[ServiceController::class, 'create'])->name('create');
        Route::post('/store',[ServiceController::class, 'store'])->name('store');
        Route::get('/edit/{service}',[ServiceController::class, 'edit'])->name('edit');
        Route::post('/{service}/publish',[ServiceController::class, 'publish'])->name('publish');
        Route::post('/{service}/unpublish',[ServiceController::class, 'unpublish'])->name('unpublish');
        Route::post('/update/{service}',[ServiceController::class, 'update'])->name('update');
        Route::delete('/delete/{service}',[ServiceController::class, 'delete'])->name('delete');

        // packages
        Route::get('/{service}/packages',[PackageController::class, 'packages'])->name('packages');
        Route::post('/{service}/store-packages',[PackageController::class, 'store_packages'])->name('store_packages');
        Route::get('/{package}/edit',[PackageController::class, 'edit_packages'])->name('edit_packages');
        Route::post('/{package}/update',[PackageController::class, 'update_packages'])->name('update_packages');
        Route::delete('/{package}/delete_packages',[PackageController::class, 'delete_packages'])->name('delete_packages');
    });


    Route::group(['as'=>'admin.','prefix' => 'admin'],function() {
        Route::get('/',[AdminController::class, 'index'])->name('index');
        Route::get('/create',[AdminController::class, 'create'])->name('create');
        Route::post('/store',[AdminController::class, 'store'])->name('store');
        Route::get('/edit/{user}',[AdminController::class, 'edit'])->name('edit');
        Route::post('/update/{user}',[AdminController::class, 'update'])->name('update');
        Route::delete('/delete/{category:slug}',[AdminController::class, 'delete'])->name('delete');

        Route::get('/change_password',[AdminController::class, 'change_password'])->name('change_password');
        Route::post('/change_password',[AdminController::class, 'set_new_password']);
    });

    // contact 
    Route::get('contact/all', [ContactController::class, 'all'])->name('contact.all');
    Route::get('contact/search', [ContactController::class, 'search'])->name('contact.search');
    Route::post('contact/{contact}/mark_as_read', [ContactController::class, 'mark_read'])->name('contact.mark_read');
    Route::delete('contact/{contact}/delete', [ContactController::class, 'delete'])->name('contact.delete');

    // settings start 
    Route::get('/setting',[SettingsController::class, 'index'])->name('setting');
    Route::post('/setting',[SettingsController::class, 'update'])->name('setting.update');


    Route::group(['as'=>'menus.','prefix' => 'menus'],function() {

        Route::get('/',[MenuController::class, 'index'])->name('index');
        Route::get('/get-menus',[MenuController::class, 'Getmenus'])->name('get-menus');
        Route::post('/store',[MenuController::class, 'store'])->name('store');
        Route::post('/update/{id}',[MenuController::class, 'update'])->name('update');
        Route::get('/delete/{id}',[MenuController::class, 'delete'])->name('delete');
       
    });


    Route::group(['as'=>'menus.','prefix' => 'menu/{id}'],function() {

        Route::get('builder',[MenuBuilderController::class, 'index'])->name('builder');

        Route::get('item/create',[MenuBuilderController::class, 'create'])->name('item.create');
        Route::post('item/store',[MenuBuilderController::class, 'store'])->name('item.store');

        Route::get('item/{itemId}/edit','MenuBuilderController@itemEdit')->name('item.edit');
        Route::post('item/{itemId}/update','MenuBuilderController@itemUpdate')->name('item.update');
        Route::get('item/{itemId}/delete','MenuBuilderController@itemDelete')->name('item.delete');

        Route::get('item/{itemId}/edit',[MenuBuilderController::class,'itemEdit'])->name('item.edit');
        Route::post('item/{itemId}/update',[MenuBuilderController::class,'itemUpdate'])->name('item.update');
        Route::get('item/{itemId}/delete',[MenuBuilderController::class,'itemDelete'])->name('item.delete');

          //Menus Order
          Route::post('order',[MenuBuilderController::class,'order'])->name('order');

    });

    Route::group(['as'=>'clients.','prefix' => 'clients'],function() {

        Route::get('/',[ClientController::class, 'index'])->name('index');
        Route::get('/create',[ClientController::class, 'create'])->name('create');
        Route::post('/store',[ClientController::class, 'store'])->name('store');
        Route::get('/{client}/edit/',[ClientController::class, 'edit'])->name('edit');
        Route::post('/{client}/update/',[ClientController::class, 'update'])->name('update');
        Route::delete('/{client}/delete/',[ClientController::class, 'delete'])->name('delete');
        // Route::get('/get-menus',[MenuController::class, 'Getmenus'])->name('get-menus');
        // Route::post('/store',[MenuController::class, 'store'])->name('store');
        // Route::post('/update/{id}',[MenuController::class, 'update'])->name('update');
        // Route::get('/delete/{id}',[MenuController::class, 'delete'])->name('delete');
       
    });

    Route::group(['as'=>'category.','prefix' => 'category'],function() {

        Route::get('/',[CategoryController::class, 'index'])->name('index');
        Route::get('/create',[CategoryController::class, 'create'])->name('create');
        Route::post('/store',[CategoryController::class, 'store'])->name('store');
        Route::get('/{category}/edit/',[CategoryController::class, 'edit'])->name('edit');
        Route::post('/{category}/update/',[CategoryController::class, 'update'])->name('update');
        Route::delete('/{category}/delete/',[CategoryController::class, 'delete'])->name('delete');
       
    });

    Route::group(['as'=>'training.','prefix' => 'training'],function() {

        Route::get('/',[TrainingController::class, 'index'])->name('index');
        Route::get('/create',[TrainingController::class, 'create'])->name('create');
        Route::post('/store',[TrainingController::class, 'store'])->name('store');
        Route::get('/{training}/edit/',[TrainingController::class, 'edit'])->name('edit');
        Route::post('/{training}/update/',[TrainingController::class, 'update'])->name('update');
        Route::delete('/{training}/delete/',[TrainingController::class, 'delete'])->name('delete');
       
    });

    Route::group(['as'=>'hero.','prefix' => 'hero'],function() {

        Route::get('/',[HeroController::class, 'index'])->name('index');
        Route::post('/create',[HeroController::class, 'create'])->name('create');
        // Route::post('/store',[TrainingController::class, 'store'])->name('store');
        // Route::get('/edit/{training}',[TrainingController::class, 'edit'])->name('edit');
        // Route::post('/update/{training}',[TrainingController::class, 'update'])->name('update');
        // Route::delete('/delete/{training}',[TrainingController::class, 'delete'])->name('delete');
       
    });

});