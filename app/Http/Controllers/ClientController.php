<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ClientController extends Controller
{
    public function danhSachKhachHang()
    {
        $khachhang = DB::table('khachhang')->get();
        return view ('admin.khachhang.client', compact('khachhang'));
    }
}
