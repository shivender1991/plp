<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/', 'HomeController@index')->name('admin.home');
Route::get('/logout', 'Auth\LoginController@logout');
Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');

Route::group(['namespace'=>'Admin'], function(){
	/* Dashboard */
	Route::get('admin/dashboard', 'DashboardController@index')->name('admin.dashboard');
	

	// start federal for state all route
	Route::get('federal/show', 'FederalController@show')->name('federal.show');
	Route::get('federal/create', 'FederalController@create')->name('federal.create');
	Route::get('federal/upload', 'FederalController@upload')->name('federal.upload');
	Route::get('federal/attributes', 'FederalController@attributes')->name('federal.attributes');
	Route::get('federal/elements', 'FederalController@elements')->name('federal.elements');
	Route::get('federal/view', 'FederalController@view')->name('federal.list');
	Route::get('federal/show/{id}', 'FederalController@show')->name('federal.show');
	Route::get('federal/edit/{id}', 'FederalController@edit')->name('federal.edit');
	Route::post('federal/store', 'FederalController@store')->name('federal.store');
	Route::post('federal/update/{id}', 'FederalController@update')->name('federal.update');
	Route::post('federal/uploadStoreform', 'FederalController@uploadStoreform')->name('federal.uploadStoreform');
	Route::get('federal/mapping/{id}', 'FederalController@mapping')->name('federal.mapping');
	Route::post('federal/storemapping/{id}', 'FederalController@storemapping')->name('federal.storemapping');
	// end federal for state all route

	// state for state all route
	Route::get('state/create', 'StateController@create')->name('state.create');
	Route::get('state/view', 'StateController@view')->name('state.list');
	Route::get('state/show/{id}', 'StateController@show')->name('state.show');
	Route::get('state/edit/{id}', 'StateController@edit')->name('state.edit');
	Route::post('state/store', 'StateController@store')->name('state.store');
	Route::post('state/update/{id}', 'StateController@update')->name('state.update');
	Route::get('state/upload', 'StateController@upload')->name('state.upload');
	Route::get('state/mapping/{id}', 'StateController@mapping')->name('state.mapping');
	Route::post('state/storemapping/{id}', 'StateController@storemapping')->name('state.storemapping');
	Route::post('state/getHeaderValues', 'StateController@getHeaderValues')->name('state.getHeaderValues');
	Route::post('state/updateHeaderValue', 'StateController@updateHeaderValue')->name('state.updateHeaderValue');
	Route::post('state/showAllColumnsForStateListOnPopUp', 'StateController@showAllColumnsForStateListOnPopUp')->name('state.showAllColumnsForStateListOnPopUp');
	Route::post('state/showHideStateListColumn', 'StateController@showHideStateListColumn')->name('state.showHideStateListColumn');
	// state for state all route


	// start LSP for state all route
	Route::get('lsp/create', 'LspController@create')->name('lsp.create');
	Route::post('lsp/ajaxCallGetForLstCatalogData', 'LspController@ajaxCallGetForLstCatalogData')->name('lsp.ajaxCallGetForLstCatalogData');
	Route::post('lsp/ajaxCallGetForFederalStateColumnName', 'LspController@ajaxCallGetForFederalStateColumnName')->name('lsp.ajaxCallGetForFederalStateColumnName');
	Route::post('lsp/ajaxCallGetForFederalStateData', 'LspController@ajaxCallGetForFederalStateData')->name('lsp.ajaxCallGetForFederalStateData');
	Route::post('lsp/getDataFromSelectedDropDown', 'LspController@getDataFromSelectedDropDown')->name('lsp.getDataFromSelectedDropDown');
	Route::post('lsp/getDataFromSelectedStateFeDropDown', 'LspController@getDataFromSelectedStateFeDropDown')->name('lsp.getDataFromSelectedStateFeDropDown');
	Route::post('lsp/mappingLspWithFederalStateData', 'LspController@mappingLspWithFederalStateData')->name('lsp.mappingLspWithFederalStateData');
	Route::post('lsp/activeDeactiveColumn', 'LspController@activeDeactiveColumn')->name('lsp.activeDeactiveColumn');
	Route::post('lsp/getAllData', 'LspController@getAllData')->name('lsp.getAllData');
	Route::post('lsp/getDataFromSelectedStateFeTable', 'LspController@getDataFromSelectedStateFeTable')->name('lsp.getDataFromSelectedStateFeTable');
	Route::post('lsp/fetchTableAfterMappedLspWithFederalState', 'LspController@fetchTableAfterMappedLspWithFederalState')->name('lsp.fetchTableAfterMappedLspWithFederalState');
	// start LSP for state all route



	// start for mappled all routes 
	Route::get('mapped/view', 'MappedController@view')->name('mapped.list');
	//Route::get('/', 'MappedController@index')->name('mapped.list');
	// end for mappled all routes 
	


	// for permissions list, update, delete,edit, view routing
	Route::get('admin/permission/create', 'PermissionController@create')->name('admin.permission.create');
	Route::get('admin/permission/view', 'PermissionController@view')->name('admin.permission.list');
	Route::get('admin/permission/show/{id}', 'PermissionController@show')->name('admin.permission.show');
	Route::get('admin/permission/edit/{id}', 'PermissionController@edit')->name('admin.permission.edit');
	Route::post('admin/permission/store', 'PermissionController@store')->name('admin.permission.store');
	Route::post('admin/permission/update/{id}', 'PermissionController@update')->name('admin.permission.update');
	// for profile routing
	Route::get('admin/dashboard/profile', 'DashboardController@profile')->name('admin.dashboard.profile');
	Route::post('admin/dashboard/profileUpdate/{id}', 'dashboardController@profileUpdate')->name('admin.dashboard.profileUpdate');
	
	// start element routing
	Route::get('element/create', 'ElementController@create')->name('element.create');
	Route::post('element/store', 'ElementController@store')->name('element.store');
	// end element routing
	//  start attribute routing
	Route::get('attribute/create', 'AttributeController@create')->name('attribute.create');
	Route::post('attribute/store', 'AttributeController@store')->name('attribute.store');
	// end attribute routing

});





