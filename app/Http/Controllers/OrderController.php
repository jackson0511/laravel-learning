<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class OrderController extends Controller
{
    public function danhSachDonHang(){
        $donHang = DB::table('donhang')->get();
        // dd($donHang);
        return view('admin.donhang.order',compact('donHang'));
    }
    public function chiTietDonHang($idDonHang){
        // Lấy thông tin đơn hàng
        $donHang = DB::table('donhang')->where('dh_id',$idDonHang)->first();
        //Lấy thông tin sản phẩm trong đơn hàng
        $chiTiet = DB::table('chitietdonhang')
        ->join('sanpham', 'sanpham.sp_id', 'chitietdonhang.sp_id')
        ->where('chitietdonhang.dh_id', $idDonHang)->get();
        // dd($KhachHang);
        //Trả về view
        return view('admin.donhang.detailorder', compact('donHang', 'chiTiet'));
    }
    public function doiTrangThai(Request $request, $idDonHang){
        $trangThai = DB::table('donhang')->where('dh_id', $idDonHang)->update(
            [
                'dh_trangthai'=>$request->get('trangThai')
            ]
        );
        return redirect()->back();
    }
    public function khXemDonHang($idCus){
        // $idCus = Auth::guard('khachhang')->id();
        $donHang = DB::table('donhang')->where('kh_id', $idCus)->get();
        dd($donHang);
    }
    public function timKiem(Request $request){

        switch ($request->get('thuocTinh')) {
                case 'donHang':
                    # code...
                    $tuKhoa = $request->get('tuKhoa');
                    $search = DB::table('donhang')->where('dh_id',$tuKhoa)->get();
                    //dd($search);
                    return view('admin.donhang.search', compact('tuKhoa','search'));
                break;

                case 'tenKhachHang':
                    $tuKhoa = $request->get('tuKhoa');
                    $search = DB::table('donhang')->where('dh_nguoinhan','like','%'.$tuKhoa.'%')->get();
                    //dd($search);
                    return view('admin.donhang.search', compact('tuKhoa','search'));
                break;

                default:
                # code...
                break;
        }
    }
}
