<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
    Route::get('/', ['as' => 'admin.index', 'uses' => 'Backend\BackendController@index']);
    /* Cấu hình website */
    Route::get('/config', ['as' => 'admin.config.index', 'uses' => 'Backend\ConfigController@index']);
    Route::post('/config/update/{id}', ['as' => 'admin.config.update', 'uses' => 'Backend\ConfigController@update']);

    /* Quản lý danh mục */
    Route::get('/category/{type}', ['as' => 'admin.category.index', 'uses' => 'Backend\CategoryController@index']);
    Route::get('/category/{type}/create', ['as' => 'admin.category.create', 'uses' => 'Backend\CategoryController@create']);
    Route::get('/category/{type}/edit/{id}', ['as' => 'admin.category.edit', 'uses' => 'Backend\CategoryController@edit']);
    Route::post('/category/{type}/store', ['as' => 'admin.category.store', 'uses' => 'Backend\CategoryController@store']);
    Route::post('/category/{type}/update/{id}', ['as' => 'admin.category.update', 'uses' => 'Backend\CategoryController@update']);
    Route::delete('/category/{type}/delete/{id}', ['as' => 'admin.category.destroy', 'uses' => 'Backend\CategoryController@destroy']);


    /* Quản lý car */
    Route::get('/car', ['as' => 'admin.car.index', 'uses' => 'Backend\CarController@index']);
    Route::get('/car/create', ['as' => 'admin.car.create', 'uses' => 'Backend\CarController@create']);
    Route::post('/car/store', ['as' => 'admin.car.store', 'uses' => 'Backend\CarController@store']);
    Route::get('/car/edit/{id}', ['as' => 'admin.car.edit', 'uses' => 'Backend\CarController@edit']);
    Route::post('/car/update/{id}', ['as' => 'admin.car.update', 'uses' => 'Backend\CarController@update']);
    Route::delete('/car/delete/{id}', ['as' => 'admin.car.destroy', 'uses' => 'Backend\CarController@destroy']);

    /* Quản lý attribute */
    Route::get('/attribute', ['as' => 'admin.attribute.index', 'uses' => 'Backend\AttributeController@index']);
    Route::get('/attribute/create', ['as' => 'admin.attribute.create', 'uses' => 'Backend\AttributeController@create']);
    Route::post('/attribute/store', ['as' => 'admin.attribute.store', 'uses' => 'Backend\AttributeController@store']);
    Route::get('/attribute/edit/{id}', ['as' => 'admin.attribute.edit', 'uses' => 'Backend\AttributeController@edit']);
    Route::post('/attribute/update/{id}', ['as' => 'admin.attribute.update', 'uses' => 'Backend\AttributeController@update']);
    Route::delete('/attribute/delete/{id}', ['as' => 'admin.attribute.destroy', 'uses' => 'Backend\AttributeController@destroy']);

    // Lái xe
    Route::get('/drive', ['as' => 'admin.drive.index', 'uses' => 'Backend\DriveController@index']);
    Route::get('/drive/create', ['as' => 'admin.drive.create', 'uses' => 'Backend\DriveController@create']);
    Route::post('/drive/store', ['as' => 'admin.drive.store', 'uses' => 'Backend\DriveController@store']);
    Route::get('/drive/edit/{id}', ['as' => 'admin.drive.edit', 'uses' => 'Backend\DriveController@edit']);
    Route::post('/drive/update/{id}', ['as' => 'admin.drive.update', 'uses' => 'Backend\DriveController@update']);
    Route::delete('/drive/delete/{id}', ['as' => 'admin.drive.destroy', 'uses' => 'Backend\DriveController@destroy']);

    //Chuyên gia
    Route::get('/expert', ['as' => 'admin.expert.index', 'uses' => 'Backend\ExpertController@index']);
    Route::get('/expert/create', ['as' => 'admin.expert.create', 'uses' => 'Backend\ExpertController@create']);
    Route::post('/expert/store', ['as' => 'admin.expert.store', 'uses' => 'Backend\ExpertController@store']);
    Route::get('/expert/edit/{id}', ['as' => 'admin.expert.edit', 'uses' => 'Backend\ExpertController@edit']);
    Route::post('/expert/update/{id}', ['as' => 'admin.expert.update', 'uses' => 'Backend\ExpertController@update']);
    Route::delete('/expert/delete/{id}', ['as' => 'admin.expert.destroy', 'uses' => 'Backend\ExpertController@destroy']);


    //Hãng xe
    Route::get('/manufacturer', ['as' => 'admin.manufacturer.index', 'uses' => 'Backend\ManufacturerController@index']);
    Route::get('/manufacturer/create', ['as' => 'admin.manufacturer.create', 'uses' => 'Backend\ManufacturerController@create']);
    Route::post('/manufacturer/store', ['as' => 'admin.manufacturer.store', 'uses' => 'Backend\ManufacturerController@store']);
    Route::get('/manufacturer/edit/{id}', ['as' => 'admin.manufacturer.edit', 'uses' => 'Backend\ManufacturerController@edit']);
    Route::post('/manufacturer/update/{id}', ['as' => 'admin.manufacturer.update', 'uses' => 'Backend\ManufacturerController@update']);
    Route::delete('/manufacturer/delete/{id}', ['as' => 'admin.manufacturer.destroy', 'uses' => 'Backend\ManufacturerController@destroy']);

    /* Quản lý danh mục cấp bậc */
    Route::get('/rank', ['as' => 'admin.rank.index', 'uses' => 'Backend\RankController@index']);
    Route::get('/rank/create', ['as' => 'admin.rank.create', 'uses' => 'Backend\RankController@create']);
    Route::post('/rank/store', ['as' => 'admin.rank.store', 'uses' => 'Backend\RankController@store']);
    Route::get('/rank/edit/{id}', ['as' => 'admin.rank.edit', 'uses' => 'Backend\RankController@edit']);
    Route::post('/rank/update/{id}', ['as' => 'admin.rank.update', 'uses' => 'Backend\RankController@update']);
    Route::delete('/rank/delete/{id}', ['as' => 'admin.rank.destroy', 'uses' => 'Backend\RankController@destroy']);

    /* Quản lý user */
    Route::get('/user', ['as' => 'admin.user.index', 'uses' => 'Backend\UserController@index']);
    Route::get('/user/create', ['as' => 'admin.user.create', 'uses' => 'Backend\UserController@create']);
    Route::post('/user/store', ['as' => 'admin.user.store', 'uses' => 'Backend\UserController@store']);
    Route::get('/user/edit/{id}', ['as' => 'admin.user.edit', 'uses' => 'Backend\UserController@edit']);
    Route::post('/user/update/{id}', ['as' => 'admin.user.update', 'uses' => 'Backend\UserController@update']);
    Route::delete('/user/delete/{id}', ['as' => 'admin.user.destroy', 'uses' => 'Backend\UserController@destroy']);

    Route::get('/user/edit_profile/{id}', ['as' => 'admin.user.index_profile', 'uses' => 'Backend\UserController@editProfile']);
    Route::post('/user/update_profile/{id}', ['as' => 'admin.user.update_profile', 'uses' => 'Backend\UserController@updateProfile']);
    /* Quản lý quyền */
    Route::get('/role', ['as' => 'admin.role.index', 'uses' => 'Backend\RoleController@index']);
    Route::get('/role/create', ['as' => 'admin.role.create', 'uses' => 'Backend\RoleController@create']);
    Route::post('/role/store', ['as' => 'admin.role.store', 'uses' => 'Backend\RoleController@store']);
    Route::get('/role/edit/{id}', ['as' => 'admin.role.edit', 'uses' => 'Backend\RoleController@edit']);
    Route::post('/role/update/{id}', ['as' => 'admin.role.update', 'uses' => 'Backend\RoleController@update']);
    Route::delete('/role/delete/{id}', ['as' => 'admin.role.destroy', 'uses' => 'Backend\RoleController@destroy']);
});
