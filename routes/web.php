<?php


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

// Route::get('/', function () {
//     return view('welcome');
// });


	Route::get('index',[
		
		'uses'=>'App\Http\Controllers\HomeController@getIndex',
		'as'=>'trang-chu'
	]);


Route::get('loai-san-pham/{loaisp}',[
		
		'uses'=>'App\Http\Controllers\HomeController@getLoaiSp',
		'as'=>'loai-san-pham'
	]);

Route::get('chi-tiet-san-pham/{id}',[
		
		'uses'=>'App\Http\Controllers\HomeController@getChiTiet',
		'as'=>'chi-tiet-san-pham'
	]);
Route::get('danh_muc',[
		
		'uses'=>'App\Http\Controllers\HomeController@getDanhMuc',
		'as'=>'danh_muc'
	]);

Route::get('lien-he',[
		
		'uses'=>'App\Http\Controllers\HomeController@getLienHe',
		'as'=>'lien-he'
	]);

Route::get('gio-hang',[
		
		'uses'=>'App\Http\Controllers\HomeController@getGioHang',
		'as'=>'gio-hang'
	]);
Route::get('thanh-toan',[
		
		'uses'=>'App\Http\Controllers\HomeController@getThanhToan',
		'as'=>'thanh-toan'
	]);
Route::get('Login',[
		
		'uses'=>'App\Http\Controllers\HomeController@getLogin',
		'as'=>'login'
	]);

Route::post('Login',[
		
		'uses'=>'App\Http\Controllers\HomeController@postLogin',
		'as'=>'login'
	]);

Route::post('register',[
		
		'uses'=>'App\Http\Controllers\HomeController@postRegister',
		'as'=>'register'
	]);
Route::get('logout',[
		
		'uses'=>'App\Http\Controllers\HomeController@getLogout',
		'as'=>'logout'
	]);

//Admin
	Route::get('admin',[
		
		'uses'=>'App\Http\Controllers\AdminController@getIndex',
		'as'=>'admin'
	]);
	Route::get('dashboard',[
		
		'uses'=>'App\Http\Controllers\AdminController@show_dashboard',
		'as'=>'dashboard'
	]);
		Route::post('admin-dashboard',[
		
		'uses'=>'App\Http\Controllers\AdminController@dashboard',
		'as'=>'admin-dashboard'
	]);
		Route::get('admin_logout',[
		
		'uses'=>'App\Http\Controllers\AdminController@getLogout',
		'as'=>'admin_logout'
	]);

//category product
	Route::get('add_category',[
		
		'uses'=>'App\Http\Controllers\CategoryProductController@add_category_product',
		'as'=>'add_category'
	]);
	Route::post('save_category',[
		
		'uses'=>'App\Http\Controllers\CategoryProductController@save_category_product',
		'as'=>'save_category'
	]);
	Route::get('all_category',[
		
		'uses'=>'App\Http\Controllers\CategoryProductController@all_category_product',
		'as'=>'all_category'
	]);
	Route::get('edit_category/{id_loai_san_pham}',[
		
		'uses'=>'App\Http\Controllers\CategoryProductController@edit_category_product',
		'as'=>'edit_category'
	]);
	Route::get('delete_category/{id_loai_san_pham}',[
		
		'uses'=>'App\Http\Controllers\CategoryProductController@delete_category_product',
		'as'=>'delete_category'
	]);
	Route::post('update_category/{id_loai_san_pham}',[
			
		'uses'=>'App\Http\Controllers\CategoryProductController@update_category_product',
		'as'=>'update_category'
	]);
	// product
	Route::get('add_product',[
		
		'uses'=>'App\Http\Controllers\ProductController@add_product',
		'as'=>'add_product'
	]);
	Route::post('save_product',[
		
		'uses'=>'App\Http\Controllers\ProductController@save_product',
		'as'=>'save_product'
	]);
	Route::get('all_product',[
		
		'uses'=>'App\Http\Controllers\ProductController@all_product',
		'as'=>'all_product'
	]);
	Route::get('edit_product/{id_san_pham}',[
		
		'uses'=>'App\Http\Controllers\ProductController@edit_product',
		'as'=>'edit_product'
	]);
	Route::get('delete_product/{id_san_pham}',[
		
		'uses'=>'App\Http\Controllers\ProductController@delete_product',
		'as'=>'delete_product'
	]);
	Route::post('update_product/{id_san_pham}',[
			
		'uses'=>'App\Http\Controllers\ProductController@update_product',
		'as'=>'update_product'
	]);
	// detail_product
	Route::get('add_detail_product',[
		
		'uses'=>'App\Http\Controllers\DetailProductController@add_detail_product',
		'as'=>'add_detail_product'
	]);
	Route::post('save_detail_product',[
		
		'uses'=>'App\Http\Controllers\DetailProductController@save_detail_product',
		'as'=>'save_detail_product'
	]);
	Route::post('save_color_size',[
		
		'uses'=>'App\Http\Controllers\DetailProductController@save_color_size',
		'as'=>'save_color_size'
	]);
	Route::get('all_detail_product',[
		
		'uses'=>'App\Http\Controllers\DetailProductController@all_detail_product',
		'as'=>'all_detail_product'
	]);
	Route::get('edit_detail_product/{id_san_pham}',[
		
		'uses'=>'App\Http\Controllers\DetailProductController@edit_detail_product',
		'as'=>'edit_detail_product'
	]);
	Route::get('delete_detail_product/{id_san_pham}',[
		
		'uses'=>'App\Http\Controllers\DetailProductController@delete_detail_product',
		'as'=>'delete_detail_product'
	]);
	Route::post('update_detail_product/{id_san_pham}',[
			
		'uses'=>'App\Http\Controllers\DetailProductController@update_detail_product',
		'as'=>'update_detail_product'
	]);
	
