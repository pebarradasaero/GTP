<?php

Route::get('/', function(){
    return redirect()->route('login');
});
Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
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

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);
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
Route::group(['as' => 'frontend.', 'namespace' => 'Frontend', 'middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

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

    Route::get('frontend/profile', 'ProfileController@index')->name('profile.index');
    Route::post('frontend/profile', 'ProfileController@update')->name('profile.update');
    Route::post('frontend/profile/destroy', 'ProfileController@destroy')->name('profile.destroy');
    Route::post('frontend/profile/password', 'ProfileController@password')->name('profile.password');
});
