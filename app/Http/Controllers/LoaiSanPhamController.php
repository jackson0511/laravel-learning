<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class LoaiSanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // = select *
        $danhSachLoai = DB::table('loaisanpham')->get();
        return view('admin.loaisanpham.indexlsp', compact('danhSachLoai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $addLoai = DB::table('loaisanpham')->insert(
                [
                    'l_ten' => $request->tenLoai
                ]
            );
            // dd('Them thanh cong');
            Session::flash('alert', 'Thêm thành công');
            return redirect()->route('danh-sach-loai');
        } catch (\Throwable $th) {
            //throw $th;
            Session::flash('alert-error', 'Có lỗi xảy ra trong quá trình thêm');
            return redirect()->route('danh-sach-loai');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $loaiSanPham = DB::table('loaisanpham')->where('l_id', $id)->first();
        return view('admin.loaisanpham.editlsp', compact('loaiSanPham'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Recheck -- did not pop the notification
        try {
            $updateLSP = DB::table('loaisanpham')->where('l_id', $id)->update(['l_ten'=>$request->tenloai]);
            Session::flash('alert-update', 'Cập nhật thành công');
            return redirect()->route('danh-sach-loai');
        } catch (\Throwable $th) {
            //throw $th;
            if ($request->tenloai == '') {
                # code...
                Session::flash('alert-update-error', 'Có lỗi xảy ra trong quá trình cập nhật');
                return redirect()->route('xu-ly-sua-loai');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $xoaLoaiSanPham = DB::table('loaisanpham') ->where('l_id', $id)->delete();
            Session::flash('alert-del', 'Xóa thành công');
            return redirect()->route('danh-sach-loai');
        } catch (\Throwable $th) {
            //throw $th;
            Session::flash('alert-del-error', 'Có lỗi xảy ra trong quá trình xóa');
            return redirect()->route('danh-sach-loai');
        }
        
    }

    public function timkiem(Request $request){
        $tuKhoa = $request->get('tuKhoa');
        $timKiem = DB::table('loaisanpham')->where('l_ten','like', '%'.$tuKhoa.'%')->get();
        // dd($timKiem);
        return view('admin.loaisanpham.searchlsp',compact('tuKhoa', 'timKiem'));
    }
}
