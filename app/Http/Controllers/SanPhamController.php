<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class SanPhamController extends Controller
{
   /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function index()
   {
      $danhSachSanPham = DB::table('sanpham')->join('loaisanpham','loaisanpham.l_id', 'sanpham.l_id')->get();
      $danhSachLoai = DB::table('loaisanpham')->get();
      return view('admin.sanpham.indexsp', compact('danhSachSanPham', 'danhSachLoai'));
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
      $tenSanPham = $request->tenSanPham;
      $tenLoai = $request->tenLoai;
      $motaSanPham = $request->moTaSP;
      $hinhSanPham = $request->hinhSanPham;
      $soLuong = $request->soLuong;
      $giaSanPham = $request->giaSanPham;
      
      
      // dd($hinhSanPham);
      // try{
         
         // }
         // catch{
            
            // }
            if($hinhSanPham != null){
               $tenHinh = $hinhSanPham->getClientOriginalName();
               $hinhSanPham->move('hinhanhsanpham', $tenHinh);
               $addSanPham = DB::table('sanpham')->insert(
                  [
                     'sp_ten' => $tenSanPham,
                     'l_id' => $tenLoai,
                     'sp_mota' => $motaSanPham,
                     'sp_hinh' => $tenHinh,
                     'sp_soluong' => $soLuong,
                     'sp_gia' => $giaSanPham,
                     ]
                  );
                  return redirect()->route('danh-sach-san-pham');
               }else{
                  $addSanPham = DB::table('sanpham')->insert(
                     [
                        'sp_ten' => $tenSanPham,
                        'l_id' => $tenLoai,
                        'sp_mota' => $motaSanPham,
                        'sp_soluong' => $soLuong,
                        'sp_gia' => $giaSanPham,
                        ]
                     ); 
                     return redirect()->route('danh-sach-san-pham');
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
                  $sanPham = DB::table('sanpham')
                  ->where('sp_id',$id)
                  ->join ('loaisanpham','loaisanpham.l_id','sanpham.l_id')->first();
                  return view('admin.sanpham.detail',compact('sanPham'));
               }
               
               /**
               * Show the form for editing the specified resource.
               *
               * @param  int  $id
               * @return \Illuminate\Http\Response
               */
               public function edit($id)
               {
                  $sanPham = DB::table('sanpham')->where('sp_id', $id)->join('loaisanpham','loaisanpham.l_id', 'sanpham.l_id')->first();
                  $loaiSanPham = DB::table('loaisanpham')->get();
                  return view('admin.sanpham.editsp', compact('sanPham', 'loaiSanPham'));
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
                  $updateSP = DB::table('sanpham')->where('sp_id', $id)->update(
                     [
                        'sp_ten'=>$request->tenSanPham,
                        'sp_hinh'=>$request->hinhSanPham,
                        'sp_soluong'=>$request->soLuong,
                        'sp_gia'=>$request->giaSanPham,
                        ]
                     );
                     return redirect()->route('danh-sach-san-pham', compact('updateSP'));
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
                        $delSanPham = DB::table('sanpham')->where('sp_id', $id)->delete();
                        Session::flash('alert-del-pr', 'Xóa thành công');
                        return redirect()->route('danh-sach-san-pham');
                     } catch (\Throwable $th) {
                        //throw $th;
                        Session::flash('alert-del-pr-error', 'Có lỗi xảy ra trong quá trình xóa');
                        return redirect()->route('danh-sach-san-pham');
                     } 
                  }
               }
