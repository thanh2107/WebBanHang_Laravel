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


		Route::get('/',[

			'uses'=>'App\Http\Controllers\HomeController@getIndex',
			'as'=>'trang-chu'
		]);
		Route::post('search',[

			'uses'=>'App\Http\Controllers\HomeController@search',
			'as'=>'search'
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
		Route::get('reset-password',[

			'uses'=>'App\Http\Controllers\HomeController@reset_password',
			'as'=>'reset-password'
		]);
		Route::post('send_email_verify',[

			'uses'=>'App\Http\Controllers\HomeController@getForgotPassword',
			'as'=>'send_email_verify'
		]);
		Route::get('get-reset-password',[

			'uses'=>'App\Http\Controllers\HomeController@getFormResetPassword',
			'as'=>'get-reset-password'
		]);
		Route::post('post-reset-password',[

			'uses'=>'App\Http\Controllers\HomeController@resetPassword',
			'as'=>'post-reset-password'
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
		//bill_orders_admin
		Route::get('manage-orders',[
			'uses'=>'App\Http\Controllers\AdminController@manage_orders',
			'as'=>'manage-orders'
		]);
		Route::get('view-order/{order_id}',[
			'uses'=>'App\Http\Controllers\AdminController@view_order',
			'as'=>'view-order'
		]);
		Route::get('confirm-order/{order_id}',[
			'uses'=>'App\Http\Controllers\AdminController@confirm_order',
			'as'=>'confirm-order'
		]);

		//slide 
		Route::get('all-slide',[

			'uses'=>'App\Http\Controllers\SlideController@all_slide',
			'as'=>'all-slide'
		]);
		Route::get('add-slide',[

			'uses'=>'App\Http\Controllers\SlideController@add_slide',
			'as'=>'add-slide'
		]);
		Route::post('save-slide',[

			'uses'=>'App\Http\Controllers\SlideController@save_slide',
			'as'=>'save-slide'
		]);
		Route::get('edit-slide/{id_slide}',[

			'uses'=>'App\Http\Controllers\SlideController@edit_slide',
			'as'=>'edit-slide'
		]);
		Route::get('delete-slide/{id_slide}',[

			'uses'=>'App\Http\Controllers\SlideController@delete_slide',
			'as'=>'delete-slide'
		]);
		Route::post('update-slide/{id_slide}',[

			'uses'=>'App\Http\Controllers\SlideController@update_slide',
			'as'=>'update-slide'
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
		Route::get('delete_detail_product/{id_chi_tiet_sp}',[

			'uses'=>'App\Http\Controllers\DetailProductController@delete_detail_product',
			'as'=>'delete_detail_product'
		]);
		Route::post('update_detail_product/{id_chi_tiet_sp}',[

			'uses'=>'App\Http\Controllers\DetailProductController@update_detail_product',
			'as'=>'update_detail_product'
		]);
			//cart
		Route::post('add-cart/{id_product}',[

			'uses'=>'App\Http\Controllers\CartController@add_cart',
			'as'=>'add-cart'
		]);
		
		Route::post('update-cart-quantity','App\Http\Controllers\CartController@update_cart');
		Route::get('show-cart','App\Http\Controllers\CartController@show_cart');
		Route::get('delete-to-cart/{rowId}','App\Http\Controllers\CartController@delete_to_cart');
		//check out
		Route::get('check-login','App\Http\Controllers\CheckOutController@login_checkout');
		Route::post('save-checkout','App\Http\Controllers\CheckOutController@save_checkout');
		//order

		
		Route::get('orders/{id_user}',[

			'uses'=>'App\Http\Controllers\HomeController@manage_orders_customer',
			'as'=>'orders'
		]);

		Route::get('view-order-customer/{order_id}',[
			'uses'=>'App\Http\Controllers\HomeController@view_order_customer',
			'as'=>'view-order-customer'
		]);