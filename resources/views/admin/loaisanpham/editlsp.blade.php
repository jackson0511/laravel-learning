@extends('admin.template.master')
@section('title')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Loại sản phẩm</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
@section('content')

    <div class="row">
        <div class="col-12 text-center">
            <h4>Sửa loại sản phẩm {{$loaiSanPham->l_ten}}</h4>
        </div>
    </div>
        <div class="col-/12">
            <form action="{{route('xu-ly-sua-loai', ['id'=>$loaiSanPham->l_id])}}" method="POST">
                @csrf
                <div class="form-group">
                <label for="exampleInputTenloai">Tên loại</label>
                <input type="text" autocomplete="off" value="{{$loaiSanPham->l_ten}}" name="tenloai"class="form-control" id="exampleInputTenloai" aria-describedby="tenloaiHelp" placeholder="Nhập tên loại sản phẩm...">
                </div>
                <button type="submit" class="btn btn-primary">Sửa</button>
            </form>
        </div>
    </div>   

@endsection