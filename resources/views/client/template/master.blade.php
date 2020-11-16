<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ - bán vàng</title>
    @include('client.template.css')
</head>
<body>
    <div class="container ">
        @include('client.template.sidebar')
        <div class="row mt-2">
            <div class="col-3 ">
                <ul class="list-group normal-border">
                    <li class="list-group-item list-group-item-dark normal-border bg-red"><b>Danh mục sản phẩm</b></li>
                    @foreach ($loaisanpham as $item)
                    <li class="list-group-item normal-border"><a href="{{route('getcategory', ['idLoai'=>$item->l_id])}}">{{$item->l_ten}}</a></li>
                    @endforeach
                </ul>
                @if (Auth::guard('khachhang')->check())
                <ul class="list-group normal-border">
                    <li class="list-group-item list-group-item-dark normal-border bg-red"><b>Xin Chào, {{Auth::guard('khachhang')->user()->username}}</b></li>
                    <li class="list-group-item normal-border"><a href="{{route('khach-don-hang',['idCus'=>Auth::guard('khachhang')->id()])}}">Đơn hàng</a></li>
                    <li class="list-group-item normal-border"><a href="{{route('khach-dang-xuat')}}">Đăng xuất</a></li>
                </ul>
                @else
                <form action="{{route('khach-dang-nhap')}}" method="POST">
                    @csrf
                    <ul class="list-group normal-border mt-4">
                        <li class="list-group-item list-group-item-dark normal-border bg-red"><b>Đăng nhập</b></li>
                        <li class="list-group-item normal-border">
                            <label for="username"><b>Tên đăng nhập</b></label>
                            <input type="text" name="username" id="username">
                        </li>
                        <li class="list-group-item normal-border">
                            <label for="password"><b>Mật khẩu</b></label>
                            <input type="password" name="password" id="password">
                        </li>
                    </ul>
                    <button type="submit" class="btn btn-primary ml-4">Đăng ký</button>
                    <button type="submit" class="btn btn-success ">Đăng nhập</button>
                </form>
                @endif
            </div>
            @yield('content')
        </div>
    </div>
    @include('client.template.js')
</body>
</html>