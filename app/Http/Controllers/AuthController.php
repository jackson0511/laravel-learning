<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NhanVienModel;
use App\KhachHangModel;
use Hash;
use Session;

class AuthController extends Controller
{
    public function viewRegister() {
        return view('admin.dangnhap.register');
    }

    public function xuLyDangKy(Request $request){
        $hoTen = $request->hoTen;
        $email = $request->email;
        $tenDangNhap = $request->tenDangNhap;
        $matKhau1 = $request->matKhau1;
        $matKhau2 = $request->matKhau2;

        if($matKhau1 != $matKhau2){
            $request->session()->flash('alert-password', 'Mật khẩu không trùng khớp!');
            Session::flash('alert-reg-error', 'Đăng ký thất bại');
            return redirect()->back();
        }
        else{
            $user = new NhanVienModel();
            $user->nv_ten = $hoTen;
            $user->nv_email = $email;
            $user->username = $tenDangNhap;
            $user->password = Hash::make($matKhau1);
            //Save lại
            $user->save();
            Session::flash('alert-registed', 'Đăng ký thành công');
            return redirect()->route('login-admin');
        }
    }
}
