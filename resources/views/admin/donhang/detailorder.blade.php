@extends('admin.template.master')
@section('title')
<div class="container-fluid">
	<div class="row mb-2">
		<div class="col-sm-6">
			<h1 class="m-0 text-dark">Chi tiết đơn hàng</h1>
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
	<div class="col-7">
		<form action="{{Route('doi-trang-thai',['idDonHang'=>$donHang->dh_id])}}" method="GET">
			<h4>Trạng thái: {{$donHang->dh_trangthai}}</h4>
			<h5>Thay đổi trạng thái đơn hàng</h5>
			<select class="col-8 p-1" name="trangThai">
				<option value="1" {{$donHang->dh_trangthai == '1' ? 'selected':''}} id="trangThai" name="trangThai">Đang chờ duyệt</option>
				<option value="2" {{$donHang->dh_trangthai == '2' ? 'selected':''}} id="trangThai" name="trangThai">Đã duyệt</option>
				<option value="3" {{$donHang->dh_trangthai == '3' ? 'selected':''}} id="trangThai" name="trangThai">Đang vận chuyển</option>
				<option value="4" {{$donHang->dh_trangthai == '4' ? 'selected':''}} id="trangThai" name="trangThai">Đã vận chuyển</option>
			</select>
			<button>Xác nhận</button>
		</form>
	</div>
	<div class="col-4">
		<table class="table">
			<tr>
				<th>Người nhận:</th>
				<td>{{$donHang->dh_nguoinhan}}</td>
			</tr>
			<tr>
				<th>Số điện thoại:</th>
				<td>{{$donHang->dh_sdt}}</td>
			</tr>
			<tr>
				<th>Nơi nhận:</th>
				<td>{{$donHang->dh_diachi}}</td>
			</tr>
			<tr>
				<th>Thời gian đặt hàng:</th>
				{{-- format d:day m:month by number Y:year(20xx) --}}
				<td>{{Carbon\Carbon::parse($donHang->created_at)->format('d/m/Y')}}</td>
			</tr>
		</table>
	</div>
</div>

<div class="row">
	<div class="col-12 ">
		<h4 style="font-weight:bold">Danh sách sản phẩm</h4>
	</div>
</div>

<div class="row">
	<div class="col-12">
		<table class="table">
			<thead>
				<tr>
					<th scope="col">STT</th> 
					<th scope="col">Tên sản phẩm</th> 
					<th scope="col">Ảnh Sản phẩm</th> 
					<th scope="col">Đơn giá</th> 
					<th scope="col">Số lượng</th>
					<th scope="col">Thành tiền</th>
				</tr>
			</thead>
			<tbody>
				@php
					$stt=1	
				@endphp
				@foreach ($chiTiet as $item)
				<tr>
					<td>{{$stt++}}</td>
					<td>{{$item->sp_ten}}</td>
					<td>
						@if($item->sp_hinh == null)
						{{'Không có ảnh'}}
						@else 
						<img src="{{asset('hinhanhsanpham')}}/{{$item->sp_hinh}}" style="width:100px; height:100px" > 
						@endif
					</td>
					<td>{{number_format($item->sp_gia)}}</td>
					<td>{{$item->ctdh_soluong}}</td>
					<td>{{number_format($item->sp_gia*$item->ctdh_soluong)}}</td>
				</tr>
				@endforeach
					<tr>
						<th colspan="5">Tổng tiền:</th>
						<th>{{number_format($donHang->dh_tongtien)}}</th>
					</tr>
			</tbody>
		</table>

	</div>
</div>   
@endsection