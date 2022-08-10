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
        Route::post('/create' , [\App\Http\Controllers\Admin\AboutAdminController::class,'create'])->name('Admin.about.create');
        Route::get('/edit/{id}' , [\App\Http\Controllers\Admin\AboutAdminController::class,'edit'])->name('Admin.about.edit');
        Route::put('/update/{id}' , [\App\Http\Controllers\Admin\AboutAdminController::class,'update'])->name('Admin.about.update');
        Route::delete('/destroy/{id}' , [\App\Http\Controllers\Admin\AboutAdminController::class,'destroy'])->name('Admin.about.destroy');

    });
    Route::group(['prefix'=>'/Career','namespace' => 'CareerAdmin'] , function (){
        Route::get('/' , [\App\Http\Controllers\Admin\CareerAdminController::class,'index'])->name('Admin.career');
        Route::post('/create' , [\App\Http\Controllers\Admin\CareerAdminController::class,'create'])->name('Admin.career.create');
        Route::get('/edit/{id}' , [\App\Http\Controllers\Admin\CareerAdminController::class,'edit'])->name('Admin.career.edit');
        Route::put('/update/{id}' , [\App\Http\Controllers\Admin\CareerAdminController::class,'update'])->name('Admin.career.update');
        Route::delete('/destroy/{id}' , [\App\Http\Controllers\Admin\CareerAdminController::class,'destroy'])->name('Admin.career.destroy');
    });
    Route::group(['prefix'=>'/News','namespace' => 'NewsAdmin'] , function (){
        Route::get('/' , [\App\Http\Controllers\Admin\NewsAdminController::class,'index'])->name('Admin.news');
        Route::post('/create' , [\App\Http\Controllers\Admin\NewsAdminController::class,'create'])->name('Admin.news.create');
        Route::get('/edit/{id}' , [\App\Http\Controllers\Admin\NewsAdminController::class,'edit'])->name('Admin.news.edit');
        Route::put('/update/{id}' , [\App\Http\Controllers\Admin\NewsAdminController::class,'update'])->name('Admin.news.update');
        Route::delete('/destroy/{id}' , [\App\Http\Controllers\Admin\NewsAdminController::class,'destroy'])->name('Admin.news.destroy');

        Route::post('/createCurrent' , [\App\Http\Controllers\Admin\NewsAdminController::class,'createCurrent'])->name('Admin.newsCurrent.create');
        Route::get('/editCurrent/{id}' , [\App\Http\Controllers\Admin\NewsAdminController::class,'editCurrent'])->name('Admin.newsCurrent.edit');
        Route::put('/updateCurrent/{id}' , [\App\Http\Controllers\Admin\NewsAdminController::class,'updateCurrent'])->name('Admin.newsCurrent.update');
        Route::delete('/deleteCurrent/{id}' , [\App\Http\Controllers\Admin\NewsAdminController::class,'updateCurrent'])->name('Admin.newsCurrent.update');

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

        Route::post('/createCategoryList' , [\App\Http\Controllers\Admin\ServiceAdminController::class,'createCategoryLists'])->name('Admin.serviceCategoryList.create');
        Route::get('/editCategoryList/{id}' , [\App\Http\Controllers\Admin\ServiceAdminController::class,'editCategoryLists'])->name('Admin.serviceCategoryList.edit');
        Route::put('/updateCategoryList/{id}' , [\App\Http\Controllers\Admin\ServiceAdminController::class,'updateCategoryLists'])->name('Admin.serviceCategoryList.update');
        Route::delete('/destroyCategoryList/{id}' , [\App\Http\Controllers\Admin\ServiceAdminController::class,'destroyCategoryLists'])->name('Admin.serviceCategoryList.destroy');
    });
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
