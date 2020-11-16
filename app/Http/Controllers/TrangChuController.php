<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;

class TrangChuController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {   
        $banner = DB::table('banner')->get();
        $sanPham = DB::table('sanpham')->get();
        // dd($banner);
        return view('client.index', compact('sanPham', 'banner'));
    }
    
    public function product_detail($id)
    {
        $sanPham = DB::table('sanpham')
        ->join ('loaisanpham','loaisanpham.l_id','sanpham.l_id')->first();
        return view('client.product_detail',compact('sanPham'));
    }
    public function cart()
    {   
        #Lấy nội dung của giỏ hàng 
        $cartCollection = Cart::getContent();
        // dd($cartCollection);
        return view('client.cart', compact('cartCollection'));
        // return view('client.cart');
    }
    public function addToCart($idProduct)
    {
        #đầu vào nhận vào id sản phẩm sau đó dựa vào id tìm thông tin sản phẩm
        $product = DB::table('sanpham')->where('sp_id', $idProduct)->first();
        Cart::add($product->sp_id, $product->sp_ten, $product->sp_gia,1);
        return redirect()->back();
    }
    public function cartClear()
    {
        Cart::clear();
        return redirect()->back();
    }
    public function clearSingleProduct($idProduct)
    {
        Cart::remove($idProduct);
        return redirect()->back(); 
    }
    public function getProductFromCategory($idLoai)
    {
        $sanPham = DB::table('sanpham')->where('l_id',$idLoai)->get();
        dd($sanPham);
    }
    public function addMoreProductToCart(Request $request, $idProduct)
    {
        $soLuong = $request->get('quantity');
        $product = DB::table('sanpham')->where('sp_id', $idProduct)->first();
        if ($soLuong <= 0) {
            return redirect()->back();
        } else {
            Cart::add($product->sp_id, $product->sp_ten, $product->sp_gia, $soLuong);
            // dd($sp);
            return redirect()->back();
        }
    }
}
