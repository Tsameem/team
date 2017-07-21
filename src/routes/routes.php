<?php
Route::group(['middleware' => 'web'], function() {
	// Admin routes:
	Route::post('admin/logout','\App\Http\Controllers\Admin\LoginController@logout')->name('logout_admin');
	Route::get('admin/dashboard','\App\Http\Controllers\Admin\AdminsController@index');
	Route::get('admin','\App\Http\Controllers\Admin\LoginController@showLoginForm')->name('admin.login');
	Route::post('admin','\App\Http\Controllers\Admin\LoginController@login');
	Route::post('admin-password/email','\App\Http\Controllers\Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
	Route::get('admin-password/reset','\App\Http\Controllers\Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	Route::post('admin-password/reset','\App\Http\Controllers\Admin\ResetPasswordController@reset');
	Route::get('admin-password/reset/{token}','\App\Http\Controllers\Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');

	// Team routes:
	Route::get('admin/team/dashboard','\App\Http\Controllers\Team\TeamController@index')->name('team_dash');
	Route::get('admin/team', function () {
		return redirect()->route('team_dash');
	});
});