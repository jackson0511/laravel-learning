<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Cart;
use Carbon\Carbon;

class LoginController extends Controller
{
    public function viewLogin() {
        return view('admin.dangnhap.login');
    }
    
    public function xuLyDangNhap(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        $arr = [
            'username' => $username,
            'password' => $password
        ];
        // kiem tra mang
        // dd(Auth::guard('khachhang')->attempt($arr));
        if (Auth::guard('nhanvien')->attempt($arr)){
            // dd($arr);
            // dd('Dang nhap thanh cong');
            return redirect()->route('danh-sach-san-pham');
        }else{
            // Tra ve du lieu dang json de ajax lay chuoi
            return response()->json(
                [
                    'err' => 'Tài khoản hoặc mật khẩu không chính xác!',
                    'req' => 'Yêu cầu đăng nhập lại'
                ]
                ,200);
        }
    }

    public function dangXuat(Request $request)
    {
        if(Auth::guard('nhanvien')->check()){
            $logout = Auth::guard('nhanvien')->logout();
            return redirect()->route('login-admin');
        }
    }

    public function khachDangNhap(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        $arr = [
            'username' => $username,
            'password' => $password
        ];
        // kiem tra mang
        // dd(Auth::guard('khachhang')->attempt($arr));
        if (Auth::guard('khachhang')->attempt($arr)){
            // dd($arr);
            // dd('Dang nhap thanh cong');
            return redirect()->route('home');
        }else{
            dd('Tai khoan va mat khau chua chinh xac');
        }
    }

    public function khachDangXuat(Request $request)
    {
        if(Auth::guard('khachhang')->check()){
            $logout = Auth::guard('khachhang')->logout();
            return redirect()->back();
        }
    }

    public function thanhToan(Request $request)
    {
        if(Auth::guard('khachhang')->check()){
            $cartCollection = Cart::getContent();
        // dd($cartCollection);
            return view('client.payment', compact('cartCollection'));
        }else{
            dd('dang nhap truoc khi thanh toan');
        }
    }

    public function datHang(Request $request)
    {
        $idKhachHang = Auth::guard('khachhang')->id();
        $donHang = DB::table('donhang')->insertGetid(
            [
                'dh_tongtien' => Cart::getSubTotal(),
                'dh_nguoinhan' => $request->nguoiNhan,
                'dh_sdt' => $request->sdt,
                'dh_diachi' => $request->diaChi,
                'dh_trangthai' => 1,
                'created_at' => Carbon::now(), //Lay gia tri hien tai
                'kh_id' => $idKhachHang,
            ]
        );

        $cartCollection = Cart::getContent();
        foreach ($cartCollection as $value) {
            # code...
            $soLuongHienTai = DB::table('sanpham')->where('sp_id', $value->id)->first();
            $soLuongGiam = DB::table('sanpham')->where('sp_id',$value->id)->update(
            [
                'sp_soluong' => $soLuongHienTai->sp_soluong - $value->quantity
            ]
            );

            $chiTietDonHang = DB::table('chitietdonhang')->insert(
                [
                    'dh_id' => $donHang,
                    'sp_id' => $value->id,
                    'ctdh_giatien' => $value->price,
                    'ctdh_soluong' => $value->quantity
                ]
            );
        }
        Cart::clear();
        return redirect()->route('home');
    }
}
