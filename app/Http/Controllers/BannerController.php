<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BannerController extends Controller
{
    public function index(){
        $banner = DB::table('banner')->get();
        // dd($banner);
        return view('admin.banner.index',compact('banner'));
    }
    public function store(Request $request)
    {
        $hinhBanner = $request->hinhBanner;
        $noidungBanner = $request->noidungBanner;
        
        if($hinhBanner != null){
            $tenHinh = $hinhBanner->getClientOriginalName();
            $hinhBanner->move('hinhanhbanner', $tenHinh);
            $addBanner = DB::table('banner')->insert(
                [
                    'bn_hinhanh' => $tenHinh,
                    'bn_noidung' => $noidungBanner
                    ]
                );
                return redirect()->route('danh-sach-banner');
            }else{
                $addBanner = DB::table('banner')->insert(
                    [
                        'bn_noidung' => $noidungBanner
                        ]
                    ); 
                    return redirect()->route('danh-sach-banner');
                }
                
            }
            public function destroy($id)
            {
                try {
                    $delBanner = DB::table('banner')->where('id', $id)->delete();
                    Session::flash('alert-del-pr', 'Xóa thành công');
                    return redirect()->route('danh-sach-banner');
                } catch (\Throwable $th) {
                    //throw $th;
                    Session::flash('alert-del-pr-error', 'Có lỗi xảy ra trong quá trình xóa');
                    return redirect()->route('danh-sach-banner');
                } 
            }
        }
