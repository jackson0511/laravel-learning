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
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Giỏ hàng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        @php $i=1 @endphp
                        <tr>
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                            <th>Giá</th>
                        </tr>
                        @foreach ($cart as $item)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$item->name}}</td>
                            <td>
                                <p id="soluong">{{$item->quantity}}</p>
                            </td>
                            <td>
                                <p id="donGia">{{number_format($item->price)}}</p>
                            </td>
                            <td>
                                <p id="gia">{{number_format($item->getPriceSum())}}</p>
                            </td>
                            <td><a href="{{route('delitem',['idProduct'=>$item->id])}}"class="btn btn-danger">X</a></td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="3"><b>Tổng tiền:  </b>{{number_format(Cart::getSubTotal())}}</td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <a class="btn btn-success" href="{{route('thanh-toan')}}">Thanh toán</a>
                </div>
            </div>
        </div>
    </div>
    @include('client.template.js')
</body>
</html>