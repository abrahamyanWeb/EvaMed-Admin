<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
});

Route::group(['prefix'=>'/Eva_Clinic_Admin','namespace' => 'Admin', 'middleware' => 'auth'] , function (){
    Route::group(['prefix'=>'/','namespace' => 'HomeAdmin'] , function (){
        Route::get('/' , [\App\Http\Controllers\Admin\HomeAdminController::class,'index'])->name('Admin.home');
    });
    Route::group(['prefix'=>'/About','namespace' => 'AboutAdmin'] , function (){
        Route::get('/' , [\App\Http\Controllers\Admin\AboutAdminController::class,'index'])->name('Admin.about');
    });
    Route::group(['prefix'=>'/Career','namespace' => 'CareerAdmin'] , function (){
        Route::get('/' , [\App\Http\Controllers\Admin\CareerAdminController::class,'index'])->name('Admin.career');
    });
    Route::group(['prefix'=>'/News','namespace' => 'NewsAdmin'] , function (){
        Route::get('/' , [\App\Http\Controllers\Admin\NewsAdminController::class,'index'])->name('Admin.news');
    });
    Route::group(['prefix'=>'/Staff','namespace' => 'StaffAdmin'] , function (){
        Route::get('/' , [\App\Http\Controllers\Admin\StaffAdminController::class,'index'])->name('Admin.staff');
        Route::post('/create' , [\App\Http\Controllers\Admin\StaffAdminController::class,'create'])->name('Admin.staff.create');
        Route::get('/edit/{id}' , [\App\Http\Controllers\Admin\StaffAdminController::class,'edit'])->name('Admin.staff.edit');
        Route::put('/update/{id}' , [\App\Http\Controllers\Admin\StaffAdminController::class,'update'])->name('Admin.staff.update');
        Route::delete('/destroy/{id}' , [\App\Http\Controllers\Admin\StaffAdminController::class,'destroy'])->name('Admin.staff.destroy');

        Route::post('/createBio' , [\App\Http\Controllers\Admin\StaffAdminController::class,'createBio'])->name('Admin.staffBio.create');
        Route::get('/editBio/{id}' , [\App\Http\Controllers\Admin\StaffAdminController::class,'editBio'])->name('Admin.staffBio.edit');
        Route::put('/updateBio/{id}' , [\App\Http\Controllers\Admin\StaffAdminController::class,'updateBio'])->name('Admin.staffBio.update');
        Route::delete('/destroyBio/{id}' , [\App\Http\Controllers\Admin\StaffAdminController::class,'destroyBio'])->name('Admin.staffBio.destroy');
    });
    Route::group(['prefix'=>'/Service','namespace' => 'ServiceAdmin'] , function (){
        Route::get('/' , [\App\Http\Controllers\Admin\ServiceAdminController::class,'index'])->name('Admin.service');
        Route::post('/create' , [\App\Http\Controllers\Admin\ServiceAdminController::class,'create'])->name('Admin.service.create');
        Route::get('/edit/{id}' , [\App\Http\Controllers\Admin\ServiceAdminController::class , 'edit'])->name('Admin.service.edit');
        Route::put('/update/{id}' , [\App\Http\Controllers\Admin\ServiceAdminController::class , 'update'])->name('Admin.service.update');
        Route::delete('/destroy/{id}' , [\App\Http\Controllers\Admin\ServiceAdminController::class , 'destroy'])->name('Admin.service.destroy');

        Route::post('/createCategory' , [\App\Http\Controllers\Admin\ServiceAdminController::class,'createCategory'])->name('Admin.serviceCategory.create');
        Route::get('/editCategory/{id}' , [\App\Http\Controllers\Admin\ServiceAdminController::class,'editCategory'])->name('Admin.serviceCategory.edit');
        Route::put('/updateCategory/{id}' , [\App\Http\Controllers\Admin\ServiceAdminController::class,'updateCategory'])->name('Admin.serviceCategory.update');
        Route::delete('/destroyCategory/{id}' , [\App\Http\Controllers\Admin\ServiceAdminController::class,'destroyCategory'])->name('Admin.serviceCategory.destroy');

    });
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
