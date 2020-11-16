@extends('client.template.master')
@section('content')
<div class="col-9 ">
<h3 class="text-center">{{$sanPham->sp_ten}}</h3>
    <div class="row">
        <div class="col-5">
            <img src="{{ asset('hinhanhsanpham') }}/{{ $sanPham->sp_hinh }}" alt="gold" style="width: 100%;">
        </div>
        <div class="col-7">
            <form action="{{route('addmore', ['idProduct'=>$sanPham->sp_id])}}" method="GET">
                <ul class="list-group mt-5">
                    <li class="list-group-item border-none"><b>Thông tin sản phẩm</b></li>
                    <li class="list-group-item border-none">Giá: {{$sanPham->sp_gia}}</li>
                    <li class="list-group-item border-none">Loại: {{$sanPham->l_ten}}</li>
                    
                    <li class="list-group-item border-none">
                        <input type="number" name="quantity" id="quantity" value="1">
                    </li>
                    <li class="list-group-item border-none">
                        <button type="submit" class="btn btn-primary">Thêm vào giỏ hàng</button>
                    </li>
                </ul>
            </form>
        </div>
    </div>
    <div>Bình luận facebook</div>
    <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-numposts="5" data-width=""></div>
    {{-- <div class="fb-comments" data-href="request->url()" data-numposts="5" data-width=""></div> --}}
</div>
@endsection