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

Route::get('/', function () {
    return view('welcome');
});

Route::get('index',[
	'as'=>'trang-chu',
	'uses'=>'PageController@getIndex'
]);

Route::get('loai-san-pham/{type}',[
	'as'=>'loaisanpham',
	'uses'=>'PageController@getLoaiSp'
]);

Route::get('chi-tiet-san-pham/{id}',[
	'as'=>'chitietsanpham',
	'uses'=>'PageController@getChitiet'
]);

Route::get('lien-he',[
	'as'=>'lienhe',
	'uses'=>'PageController@getLienHe'
]);

Route::get('gioi-thieu',[
	'as'=>'gioithieu',
	'uses'=>'PageController@getGioiThieu'
]);

Route::get('add-to-cart/{id}',[
	'as'=>'themgiohang',
	'uses'=>'PageController@getAddtoCart'
]);
Route::get('add-Many-to-cart/{id}',[
'as'=>'themnhieu',
'uses'=> 'PageController@getAddmanytoCart'
]);

Route::get('del-cart/{id}',[
	'as'=>'xoagiohang',
	'uses'=>'PageController@getDelItemCart'
]);
Route::get('dat-hang',[
	'as'=>'dathang',
	'uses'=>'PageController@getCheckout'
]);
Route::post('dat-hang',[
	'as'=>'dathang',
	'uses'=>'PageController@postCheckout'
]);

Route::get('dang-nhap',[
	'as'=>'login',
	'uses'=>'PageController@getLogin'
]);
Route::post('dang-nhap',[
	'as'=>'login',
	'uses'=>'PageController@postLogin'
]);

Route::get('dang-ki',[
	'as'=>'signin',
	'uses'=>'PageController@getSignin'
]);

Route::post('dang-ki',[
	'as'=>'signin',
	'uses'=>'PageController@postSignin'
]);

Route::get('dang-xuat',[
	'as'=>'logout',
	'uses'=>'PageController@postLogout'
]);

Route::get('search',[
	'as'=>'search',
	'uses'=>'PageController@getSearch'
]);

Route::group(['prefix'=>'admin'],function(){
	Route::group(['prefix'=>'loaisp'],function(){
		Route::get('danhsach','ProductTypeController@getDS');

		Route::get('sua/{id}','ProductTypeController@getSua');
		Route::post('sua/{id}','ProductTypeController@postSua');

		Route::get('them','ProductTypeController@getThem');
		Route::post('them','ProductTypeController@postThem');

		Route::get('xoa/{id}','ProductTypeController@getXoa');

		Route::get('anloaisp/{id}','ProductTypeController@getAn');
		Route::get('hienloaisp/{id}','ProductTypeController@getHien');
	});

	Route::group(['prefix'=>'sanpham'],function(){
		Route::get('danhsach','ProductController@getDS');

		Route::get('sua/{id}','ProductController@getSua');
		Route::post('sua/{id}','ProductController@postSua');

		Route::get('them','ProductController@getThem');
		Route::post('them','ProductController@postThem');

		Route::get('xoa/{id}','ProductController@getXoa');

		Route::get('ansp/{id}','ProductController@getAn');
		Route::get('hiensp/{id}','ProductController@getHien');

	});

	Route::group(['prefix'=>'khachhang'],function(){
		Route::get('danhsach','CustomerController@getDanhSach');
		Route::get('sua/{id}','CustomerController@getSua');
		Route::post('sua/{id}','CustomerController@postSua');
		Route::get('them','CustomerController@getThem');
		Route::post('them','CustomerController@postThem');
		Route::get('xoa/{id}','CustomerController@getXoa');
	});

	Route::group(['prefix'=>'donhang'],function(){
		Route::get('danhsach','BillController@getDanhSach');
		Route::get('sua/{id}','BillController@getSua');
		Route::post('sua/{id}','BillController@postSua');
		Route::get('xoa/{id}','BillController@getXoa');
		Route::get('pdf/{id}','BillDetailController@pdf');
	});


	Route::group(['prefix'=>'transport'],function(){
		Route::get('danhsach','TransportController@getDS');

		Route::get('them','TransportController@getThem');
		Route::post('them','TransportController@postThem');

		Route::get('sua/{id}','TransportController@getSua');
		Route::post('sua/{id}','TransportController@postSua');
	});

	Route::group(['prefix'=>'payment'],function(){
		Route::get('danhsach','PaymentController@getDS');

		Route::get('them','PaymentController@getThem');
		Route::post('them','PaymentController@postThem');

		Route::get('sua/{id}','PaymentController@getSua');
		Route::post('sua/{id}','PaymentController@postSua');
	});

	Route::group(['prefix'=>'accadmin'],function(){
		Route::get('danhsach','AdminController@getDS');

		Route::get('them','AdminController@getThem');
		Route::post('them','AdminController@postThem');

		Route::get('sua/{id}','AdminController@getSua');
		Route::post('sua/{id}','AdminController@postSua');
	});



});
Route::get('admin/dangnhap','AdminController@getLoginAdmin');
Route::post('admin/dangnhap','AdminController@postLoginAdmin');
Route::get('admin/dangxuat','AdminController@getLogoutAdmin');