<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class StatiticsController extends Controller
{
    public function index(){
        $donHangMoi = DB::table('donhang')->where('dh_trangthai',1)->count();
        $donDaGiao = DB::table('donhang')->where('dh_trangthai',4)->count();
        $doanhThuTheoThang = DB::table('donhang')->where('dh_trangthai', 4)->whereMonth('created_at', Carbon::now()->month)->sum('dh_tongtien');
        $tongKhachThang = DB::table('khachhang')->whereMonth('created_at',Carbon::now()->month)->count();
        return view('admin.thongke.statitic',compact('donHangMoi', 'donDaGiao', 'doanhThuTheoThang', 'tongKhachThang'));
    }
}
