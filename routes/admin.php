<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();

    //dd($users);

    return view('admin.home');
})->name('home');

Route::get('/draft', 'AdminController@showDrafts')->name('drafts');

Route::get('/approved', 'AdminController@showApproved')->name('approved');

Route::get('/rejected', 'AdminController@showRejected')->name('rejected');

Route::get('/roles', 'AdminController@showRoles')->name('roles');

Route::get('/roles-create', 'AdminController@createRoles')->name('roles.create');

Route::post('/roles-create', 'AdminController@store_role')->name('roles.store');

Route::get('/roles-edit/{id}', 'AdminController@editRoles')->name('roles.edit');

Route::patch('/roles-update', 'AdminController@updateRoles')->name('roles.update');

Route::get('/subadmin', 'AdminController@showAdmins')->name('subadmins');

Route::get('/subadmin-create', 'AdminController@createAdmins')->name('subadmins.create');

Route::post('/subadmin-create', 'AdminController@storeAdmins')->name('subadmins.create');

Route::get('/subadmin-edit/{id}', 'AdminController@editAdmins')->name('subadmins.edit');

Route::patch('/subadmin-update', 'AdminController@updateAdmins')->name('subadmins.update');

Route::post('/status', 'AdminController@changeStatus')->name('status');

