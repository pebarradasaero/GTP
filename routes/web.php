<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Juntas Freguesia
    Route::delete('juntas-freguesia/destroy', 'JuntasFreguesiaController@massDestroy')->name('juntas-freguesia.massDestroy');
    Route::resource('juntas-freguesia', 'JuntasFreguesiaController');

    // Grupo
    Route::delete('grupos/destroy', 'GrupoController@massDestroy')->name('grupos.massDestroy');
    Route::resource('grupos', 'GrupoController');

    // Equipa
    Route::delete('equipas/destroy', 'EquipaController@massDestroy')->name('equipas.massDestroy');
    Route::resource('equipas', 'EquipaController');

    // Actividadejf
    Route::delete('actividadejfs/destroy', 'ActividadejfController@massDestroy')->name('actividadejfs.massDestroy');
    Route::resource('actividadejfs', 'ActividadejfController');

    // Atividadeparticipante
    Route::delete('atividadeparticipantes/destroy', 'AtividadeparticipanteController@massDestroy')->name('atividadeparticipantes.massDestroy');
    Route::resource('atividadeparticipantes', 'AtividadeparticipanteController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
