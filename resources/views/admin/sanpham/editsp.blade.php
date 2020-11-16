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
		<h4>Sửa sản phẩm {{$sanPham->sp_ten}}</h4>
	</div>
</div>
<div class="col-/12">
	<form action="{{route('xu-ly-sua-san-pham', ['id'=>$sanPham->sp_id])}}" method="POST">
		@csrf
		<div class="form-group">
			<label for="sanPham">Tên sản phẩm</label>
			<input type="text" autocomplete="off" value="{{$sanPham->sp_ten}}" name="tenSanPham"class="form-control" id="sanPham" placeholder="Nhập tên sản phẩm...">
		</div>
		<div class="form-group">
			<label for="tenLoai">Loại Sản Phẩm</label>
			<select name="tenLoai" id="tenLoai" class="form-control">
				@foreach ($loaiSanPham as $item)
				<option value="{{$item->l_id}}{{$sanPham->l_id == $item->l_id ? 'selected':''}}">{{$item->l_ten}}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label for="hinhAnh">Hình ảnh</label><br>
			<img src="{{asset('hinhanhsanpham')}}/{{$sanPham->sp_hinh}}" id="hinhAnh" style="width:100px; height:100px">
			{{-- <img src="{{asset('hinhanhsanpham')}}/sp_hinh" id="hinhAnh" style="width:100px; height:100px"> --}}
		</div>
		<div class="form-group">
			<label for="img">Chọn hình ảnh đăng lên</label><br>
			@if ($sanPham != null)
			<input type="file" name="hinhSanPham" class="form-control" id="hinhSanPham">
			@endif
		</div>
		<div class="form-group">
			<label for="soLuong">Số lượng</label><br>
			<input type="text" class="form-control" name="soLuong" value="{{$sanPham->sp_soluong}}">
		</div>
		<div class="form-group">
			<label for="giaSanPham">Giá</label><br>
			<input type="text" class="form-control" name="giaSanPham" value="{{$sanPham->sp_gia}}">
		</div>
		<button type="submit" class="btn btn-primary">Sửa</button>
	</form>
</div>
</div>   
@endsection