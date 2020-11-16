@extends('admin.template.master')
@section('title')
<div class="container-fluid text-center">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="">Chi tiết sản phẩm</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-6 order-1">
            <div class="image_selected">
                <img src="{{ asset('hinhanhbanner') }}/{{ $sanPham->sp_hinh }}" style="width:450px;height:450px">
            </div>
        </div>
        <!-- Description -->
        <div class="col-6 order-2">
                <div >
                    <div class="btn btn-success mt-5" >
                        <a href="{{route('danh-sach-san-pham')}}" style="color:honeydew">
                            <i class="fa fa-undo" aria-hidden="true"></i>Trở về
                        </a>
                    </div>
                </div>
            </br>
        </div>
    </div>
    <div class="col-12 mt-5 order-3">
        <h4><b>Mô tả sản phẩm:</b></h4>
        <p>{!! $sanPham->sp_mota !!}</p>
    </div>
</div>
</div>
@endsection



