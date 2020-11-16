@extends('admin.template.master')
@section('title')
<div class="container-fluid">
	<div class="row mb-2">
		<div class="col-sm-6">
			<h1 class="m-0 text-dark">Banner</h1>
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
		<h4>Danh sách Banner</h4>
	</div>
	<div class="col-4 text-center">
		<h4>Thêm Banner</h4>
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
	<div class="col-9">
		<table class="table">
			<thead>
				<tr>
					<th scope="col">STT</th>
					<th scope="col">ID</th> 
					<th scope="col">Hình ảnh</th>
					{{-- <th scope="col">Mô tả</th> --}}
				</tr>
			</thead>
			<tbody>
				@php $i=1 @endphp
				@foreach ($banner as $item)
				<tr>
					<th>{{$i++}}</th>
					<th>{{$item->id}}</th>
					<td>
						@if($item->bn_hinhanh == null)
						{{'Không có ảnh'}}
						@else 
						<img src="{{asset('hinhanhsanpham')}}/{{$item->bn_hinhanh}}" style= height:100px;" > 
						@endif
                    </td>
					<td>
						{{-- <a href="{{route('sua-san-pham', ['id'=>$item->sp_id])}}"class="btn btn-success">Sửa</a> --}}
						<a href="{{route('hien-thi',['id'=>$item->id])}}"class="btn btn-primary">Chi Tiết</a>
						<a href="{{route('xoa-banner', ['id'=>$item->id])}}"class="btn btn-danger"onClick='return xoa()'>Xóa</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	
	<div class="col-3">
		<form action="{{route('xu-ly-them-bn')}}" method="POST" enctype="multipart/form-data">
			@csrf
            <div class="form-group">
                <label for="hinhBanner">Hình Banner</label>
                <input type="file" name="hinhBanner"class="form-control" >
            </div>
			<div class="form-group">
				<label for="noidungBanner">Mô Tả Banner</label>
				<textarea name="noidungBanner" class="form-control" id="summernote" cols="46" rows="10" placeholder="Nhập mô tả Banner"></textarea>
			</div>
			<button type="submit" class="btn btn-primary">Thêm</button>
		</form>
	</div>
</div>   
<script>
	function xoa(){
		const a = confirm("Bạn có muốn xóa Banner này không?");
		if(a==true){
			return true;
		}
		return false;
	}
</script>
@endsection