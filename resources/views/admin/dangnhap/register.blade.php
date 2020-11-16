<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @include('admin.template.css')
  <title>Document</title>
</head>
  
  <body class="hold-transition login-page">
    <center>
      <div class="login-box">
        <div class="card">
          <div class="card-body login-card-body">
            <p class="login-box-msg">Register a new membership</p>
            @if (Session::has('alert-reg-error'))
            <p style="color:red" class="text-center">
              {{Session::get('alert-reg-error')}}
            </p>
            @endif
            <form action="{{route('xu-ly-dang-ky')}}" method="POST">
              @csrf
              <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Họ tên" name="hoTen">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Tên đăng nhập" name="tenDangNhap">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="email" class="form-control" placeholder="Email" name="email">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Mật khẩu" name="matKhau1">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Nhập lại mật khẩu" name="matKhau2">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <!-- /.col -->
                <div class="col-12">
                  <button type="submit" class="btn btn-primary btn-block">Đăng ký</button>
                </div>
                <!-- /.col -->
              </div>
            </form>
            <p class="mb-1 mt-2">
              <a href="{{route('login-admin')}}" class="btn btn-success">Đăng nhập</a>
            </p>
          </div>
          <!-- /.login-card-body -->
        </div>
      </div>
      <!-- /.login-box -->
    </center>  
</body>
</html>

