@extends('admin.template.master')
@section('title')
<div class="container-fluid">
	<div class="row mb-2">
		<div class="col-sm-6">
			<h1 class="m-0 text-dark">Đơn hàng</h1>
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
	<div class="col-12 text-center">
		<h4>Danh sách đơn hàng</h4>
	</div>
</div>

<div class="row">
	<div class="col-12">
		<form action="{{ route('tim-kiem-don-hang') }}" method="GET">
            <div class="row">
                <input type="text" name="tuKhoa" class="form-control col-md-10 ml-3" id="exampleInputTenloai" aria-describedby="tenloaiHelp" placeholder="Tìm kiếm theo ...">
                <select name="thuocTinh" id="">
                    <option value="donHang">Đơn hàng</option>
                    <option value="tenKhachHang">Tên khách hàng</option>
                </select>
            </div>
        </form>
		<table class="table">
			<thead>
				<tr>
					<th scope="col">STT</th>
					<th scope="col">Mã đơn</th> 
					<th scope="col">Người nhận</th> 
					<th scope="col">Địa chỉ</th> 
					<th scope="col">Số điện thoại</th> 
					<th scope="col">Trạng thái</th>
				</tr>
			</thead>
			<tbody>
				@php $i=1 @endphp
				@foreach ($donHang as $item)
				<tr>
					<th>{{$i++}}</th>
					<th>{{$item->dh_id}}</th>
					<td>{{$item->dh_nguoinhan}}</td>
					<td>{{$item->dh_diachi}}</td>
					<td>{{$item->dh_sdt}}</td>
					@if ($item->dh_trangthai==1)
					<td class="badge badge-pill badge-secondary mt-3">{{"Đang chờ duyệt"}}</td>
					@endif
					@if ($item->dh_trangthai==2)
					<td class="badge badge-pill badge-primary mt-3">{{"Đã duyệt"}}</td>
					@endif
					@if ($item->dh_trangthai==3)
					<td class="badge badge-pill badge-success mt-3">{{"Đang vận chuyển"}}</td>
					@endif
					@if ($item->dh_trangthai==4)
					<td class="badge badge-pill badge-success mt-3">{{"Đã vận chuyển"}}</td>
					@endif
					<td>
						<a href="{{route('chi-tiet-don-hang',['donHang'=>$item->dh_id])}}"class="btn btn-primary ">Chi Tiết</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div> 
@endsection