@extends('admin.template.master')
@section('title')
<div class="container-fluid">
	<div class="row mb-2">
		<div class="col-sm-6">
			<h1 class="m-0 text-dark">Sản phẩm</h1>
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

<div class="row">
	<div class="col-8 text-center">
		<h4>Danh sách sản phẩm</h4>
	</div>
	<div class="col-4 text-center">
		<h4>Thêm sản phẩm</h4>
		@if (Session::has('alert-del-pr'))
		<p style="color:green" class="text-center">
			{{Session::get('alert-del-pr')}}
		</p>
		@endif 
		@if (Session::has('alert-del-pr-error'))
		<p style="color:red" class="text-center">
			{{Session::get('alert-del-pr-error')}}
		</p>
		@endif
	</div>
</div>

<div class="row">
	<div class="col-8">
		<table class="table">
			<thead>
				<tr>
					<th scope="col">STT</th>
					<th scope="col">ID</th> 
					<th scope="col">Tên sản phẩm</th>
					<th scope="col">Loại sản phẩm</th>
					<th scope="col">Hình ảnh</th>
					<th scope="col">Số lượng</th>
					<th scope="col">Giá</th>
					{{-- <th scope="col">Mô tả</th> --}}
				</tr>
			</thead>
			<tbody>
				@php $i=1 @endphp
				@foreach ($danhSachSanPham as $item)
				<tr>
					<th>{{$i++}}</th>
					<th>{{$item->sp_id}}</th>
					<td>{{$item->sp_ten}}</td>
					<td>{{$item->l_ten}}</td>
					<td>
						@if($item->sp_hinh == null)
						{{'Không có ảnh'}}
						@else 
						<img src="{{asset('hinhanhsanpham')}}/{{$item->sp_hinh}}" style="width:100px; height:100px" > 
						@endif
					</td>
					<td>{{$item->sp_soluong}}</td>
					<td>{{$item->sp_gia}}</td>
					<td>
						<a href="#"class="btn btn-primary">Chi Tiết</a>
						<a href="{{route('sua-san-pham', ['id'=>$item->sp_id])}}"class="btn btn-success">Sửa</a>
						<a href="{{route('xoa-san-pham', ['id'=>$item->sp_id])}}"class="btn btn-danger"onClick='return xoa()'>Xóa</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	
	<div class="col-4">
		<form action="{{route('xu-ly-them-sp')}}" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="form-group">
				<label for="tenSanPham">Tên Sản Phẩm</label>
				<input type="text" name="tenSanPham"class="form-control" id="tenSanPham"  placeholder="Nhập tên sản phẩm..." required>
			</div>
			<div class="form-group">
				<label for="tenLoai">Loại Sản Phẩm</label>
				<select name="tenLoai" id="tenLoai" class="form-control">
					@foreach ($danhSachLoai as $item)
					<option value="{{$item->l_id}}">{{$item->l_ten}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="moTaSP">Mô Tả Sản Phẩm</label>
				<textarea name="moTaSP" class="form-control" cols="46" rows="10" placeholder="Nhập mô tả sản phẩm"></textarea>
			</div>
			<div class="form-group">
				<label for="hinhSanPham">Hình Sản Phẩm</label>
				<input type="file" name="hinhSanPham"class="form-control" >
			</div>
			<div class="form-group">
				<label for="soLuong">Số lượng</label><br>
				<input type="text" class="form-control" name="soLuong" placeholder="Nhập số lượng">
			</div>
			<div class="form-group">
				<label for="giaSanPham">Giá</label><br>
				<input type="text" class="form-control" name="giaSanPham" placeholder="Nhập giá">
			</div>
			<button type="submit" class="btn btn-primary">Thêm</button>
		</form>
	</div>
</div>   
<script>
	function xoa(){
		const a = confirm("Bạn có muốn xóa sản phẩm này không?");
		if(a==true){
			return true;
		}
		return false;
	}
</script>
@endsection