@extends('admin.template.master')
@section('title')
<div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Loại sản phẩm</h1>
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
            <h4>Danh sách loại sản phẩm</h4>
              @if (Session::has('alert-del'))
                <p style="color:green" class="text-center">
                  {{Session::get('alert-del')}}
                </p>
              @endif 
              @if (Session::has('alert-del-error'))
                <p style="color:red" class="text-center">
                  {{Session::get('alert-del-error')}}
                </p>
              @endif
              @if (Session::has('alert-update'))
                <p style="color:green" class="text-center">
                  {{Session::get('alert-update')}}
                </p>
              @endif 
              @if (Session::has('alert-update-error'))
                <p style="color:red" class="text-center">
                  {{Session::get('alert-update-error')}}
                </p>
              @endif
        </div>
        <div class="col-4 text-center">
            <h4>Thêm loại sản phẩm</h4>
              @if (Session::has('alert'))
                <p style="color:green" class="text-center">
                  {{Session::get('alert')}}
                </p>
              @endif 
              @if (Session::has('alert-error'))
                <p style="color:red" class="text-center">
                  {{Session::get('alert-error')}}
                </p>
              @endif  
        </div>
    </div>

    <div class="row">
        <div class="col-8">
          <form action="{{route('tim-kiem-san-pham')}}" method="GET">
            <label for="tuKhoa">Tìm kiếm</label>
            <input type="text" placeholder="Tìm kiếm..." class="col-12" name="tuKhoa">
          </form>
            <table class="table">
              <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">ID</th>
                    <th scope="col">Tên loại sản phẩm</th>
                    <th scope="col">Thao tác</th>
                </tr>
              </thead>
              <tbody>
                @php $i=1 @endphp
                @foreach ($danhSachLoai as $item)
                  <tr>
                    <th>{{$i++}}</th>
                    <th scope="row">{{$item->l_id}}</th>
                    <td>{{$item->l_ten}}</td>
                    <td>
                    <a href="{{route('sua-loai-san-pham', ['id'=>$item->l_id])}}"class="btn btn-success">Sửa</a>
                    <a href="{{route('xoa-loai-san-pham', ['id'=>$item->l_id])}}"class="btn btn-danger" onClick='return xoa()'>Xóa</a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
        </div>

        <div class="col-4">
        <form action="{{route('xu-ly-them-loai')}}" method="POST">
                @csrf
                <div class="form-group">
                <label for="Tenloai">Tên loại</label>
                <input required type="text" name="tenLoai"class="form-control" id="Tenloai" placeholder="Nhập tên loại sản phẩm...">
                </div>
                <button type="submit" class="btn btn-primary">Thêm</button>
            </form>
        </div>
    </div>   
    <script>
      function xoa(){
        const a = confirm("Bạn có muốn xóa loại này không?");
        if(a==true){
          return true;
        }
        return false;
      }
    </script>
@endsection