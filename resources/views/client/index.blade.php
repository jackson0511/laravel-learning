@extends('client.template.master')
@section('content')
<div class="col-9 ">
    <!-- slider -->
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @foreach ($banner as $item)
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{asset('hinhanhbanner')}}/{{$item->bn_hinhanh}}" alt="First slide" style="height: 350px;">
            </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- Hiển thị sản phẩm -->
    <div class="row mt-5">
        <div class="col-12">
            <h5 class="text-center">Vàng bán chạy</h5>
        </div>
        @foreach ($sanPham as $item)
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <img class="card-img-top" src="{{asset('hinhanhsanpham')}}/{{$item->sp_hinh}}" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;">
                <div class="card-body">
                <p class="card-text"><a href="{{route('detail', ['id'=>$item->sp_id])}}">{{$item->sp_ten}}</a></p>
                    <p class="card-text">Giá: {{$item->sp_gia}}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                        @if (($item->sp_soluong)<=0)
                            <button type="button" class="btn btn-danger" disabled>Hết hàng</button>
                        @else
                            <button type="button" class="btn btn-sm btn-outline-secondary add-to-cart"><a href="{{route('addtocart', ['idProduct'=>$item->sp_id])}}">Thêm vào giỏ hàng</a></button>
                        @endif
                        
                        <button type="button" class="btn btn-sm btn-outline-secondary"><a href="{{route('detail',['idProduct'=>$item->sp_id])}}">Chi tiết</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection