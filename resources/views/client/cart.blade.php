@extends('client.template.master')
@section('content')
<div class="col-9 ">
    <h1 class="text-center">Giỏ hàng</h1>
    <table class="table">
        @php $i=1 @endphp
        <tr>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Đơn giá</th>
            <th>Giá</th>
        </tr>
        @foreach ($cartCollection as $item)
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
            <td colspan="1"><a class="btn btn-primary" href="#">Cập nhật</a></td>
            <td rowspan="5"><a class="btn btn-success" href="{{route('thanh-toan')}}">Thanh toán</a></td>
        </tr>
    </table>
</div>
@endsection