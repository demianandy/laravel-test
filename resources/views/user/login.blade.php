<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Авторизация</title>
  <link rel="stylesheet" href="{{ asset('assets/admin/css/user.css') }}">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">

    <div href="№">Авторизация</div>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
    @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
              @foreach ($errors->all() as $error)
                  <li>Ошибка авторизации</li>
                @endforeach
              </ul>
            </div>

    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

      <form action="{{ route('login') }}" method="post" style="margin:0; padding:0" class="col-12">
        @csrf
        <div class="input-group mb-3" style="border-right: 1px solid #d083cf">
          <input type="email" name="email" class="form-control @error('title') is-invalid @enderror" placeholder="Электронна почта">
        </div>
        <div class="input-group mb-3" style="border-right: 1px solid #d083cf">
          <input type="password" name="password" class="form-control @error('title') is-invalid @enderror" placeholder="Пароль">
        </div>
        <div class="row" style="padding:0; margin:0">
          <div class="col-8">
          </div>
          <!-- /.col -->
          <div class="col-4" style="padding:0; margin:0">
            <button type="submit" class="btn btn-primary btn-block">Войти</button>
          </div>
          <!-- /.col -->
        </div>
        <hr>
        <p>Данные админа (для входа в админку)</p>
        <p>Почта: admin@gmail.com</p>
        <p>Пароль: 123456</p>
      </form>

    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>

<script src="{{ asset('assets/admin/js/admin.js') }}"></script>
</body>
</html>