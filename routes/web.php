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

Route::get('/loai-san-pham','LoaiSanPhamController@index')->name('danh-sach-loai');
Route::post('/xu-ly-them-loai','LoaiSanPhamController@store')->name('xu-ly-them-loai');
Route::get('/sua-loai-san-pham/{id}', 'LoaiSanPhamController@edit')->name('sua-loai-san-pham');
Route::post('/xu-ly-sua-loai/{id}', 'LoaiSanPhamController@update')->name('xu-ly-sua-loai');
Route::get('/xoa-loai-san-pham/{id}', 'LoaiSanPhamController@destroy')->name('xoa-loai-san-pham');
Route::get('/timkiem', 'LoaiSanPhamController@timkiem')->name('tim-kiem-san-pham');


// Route::get('/san-pham', 'SanPhamController@index')->name('danh-sach-san-pham');
// Route::post('/xu-ly-them-sp', 'SanPhamController@store')->name('xu-ly-them-sp');
// Route::get('/xoa-san-pham/{id}', 'SanPhamController@destroy')->name('xoa-san-pham');
// Route::get('/sua-san-pham/{id}', 'SanPhamController@edit')->name('sua-san-pham');
// Route::post('/xoa-san-pham/{id}', 'SanPhamController@update')->name('xu-ly-sua-san-pham');
// Route::get('/detail/{id}', 'SanPhamController@show')->name('hien-thi');

Route::get('/register', 'AuthController@viewRegister')->name('register-admin');
Route::post('/xu-ly-dang-ky', 'AuthController@xuLyDangKy')->name('xu-ly-dang-ky');
Route::get('/login', 'LoginController@viewLogin')->name('login-admin');
Route::post('/logged', 'LoginController@xuLyDangNhap')->name('xu-ly-dang-nhap');

// Route::group(['middleware' => ['checkNhanVien']], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/san-pham', 'SanPhamController@index')->name('danh-sach-san-pham');
        Route::post('/xu-ly-them-sp', 'SanPhamController@store')->name('xu-ly-them-sp');
        Route::get('/xoa-san-pham/{id}', 'SanPhamController@destroy')->name('xoa-san-pham');
        Route::get('/sua-san-pham/{id}', 'SanPhamController@edit')->name('sua-san-pham');
        Route::post('/xoa-san-pham/{id}', 'SanPhamController@update')->name('xu-ly-sua-san-pham');
        Route::get('/detail/{id}', 'SanPhamController@show')->name('hien-thi');
    });
// });
// Trang chu
Route::get('/','TrangChuController@index')->name('home');
Route::get('/detail/{id}', 'TrangChuController@product_detail')->name('detail');
Route::get('/cart', 'TrangChuController@cart')->name('cart');
Route::get('/addcart/{idProduct}', 'TrangChuController@addToCart')->name('addtocart');
Route::get('/cartclear', 'TrangChuController@cartClear')->name('cartclear');
Route::get('/delitem/{idProduct}', 'TrangChuController@clearSingleProduct')->name('delitem');
Route::get('/getcategory/{idLoai}', 'TrangChuController@getProductFromCategory')->name('getcategory');
Route::get('/addmore/{idProduct}', 'TrangChuController@addMoreProductToCart')->name('addmore');

// Route::get('/abc', function (){
//     return view('admin.dangnhap.register');
// });
// Route::get('/detail', function (){
//     return view('admin.sanpham.detailsp');
// });
// Route::get('/123', function () {
//     return view('admin.sanpham.detail');
// });
Route::post('/customer-logged', 'LoginController@khachDangNhap')->name('khach-dang-nhap');
Route::get('/customer-logout', 'LoginController@khachDangXuat')->name('khach-dang-xuat');
Route::get('/checkout', 'LoginController@thanhToan')->name('thanh-toan');
Route::post('/payment', 'LoginController@datHang')->name('dat-hang');

Route::get('/order', 'OrderController@danhSachDonHang')->name('don-hang');
Route::get('/order-detail/{donHang}', 'OrderController@chiTietDonHang')->name('chi-tiet-don-hang');
Route::get('/status/{idDonHang}', 'OrderController@doiTrangThai')->name('doi-trang-thai');
Route::get('/khach-don-hang/{idCus}', 'OrderController@khXemDonHang')->name('khach-don-hang');
Route::get('/tim-kiem-don-hang','OrderController@timKiem')->name('tim-kiem-don-hang');
// Route::get('/123', function () {
    //     return view('client.order');
    // });

Route::get('/khach-hang', 'ClientController@danhSachKhachHang')->name('khach-hang');

Route::get('/thong-ke', 'StatiticsController@index')->name('thong-ke');

Route::get('/banner', 'BannerController@index')->name('danh-sach-banner');
Route::post('/xu-ly-them-bnp', 'BannerController@store')->name('xu-ly-them-bn');
Route::get('/xoa-banner/{id}', 'BannerController@destroy')->name('xoa-banner');
