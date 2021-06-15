<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Регистрация</title>
  <link rel="stylesheet" href="{{ asset('assets/admin/css/user.css') }}">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">

    <div href="№">Регистрация</div>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
    @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
              @foreach ($errors->all() as $error)
                  <li>Ошибка регистрации</li>
                @endforeach
              </ul>
            </div>

        @endif

      <form action="{{ route('register.store') }}" method="post" style="margin:0; padding:0" class="col-12">
        @csrf
        <div class="input-group mb-3 col-12" style="border-right: 1px solid #d083cf; padding:0; margin:0">
          <input type="text" name="name" class="form-control @error('title') is-invalid @enderror" placeholder="Имя" value="{{ old('name') }}">
        </div>
        <div class="input-group mb-3" style="border-right: 1px solid #d083cf">
          <input type="email" name="email" class="form-control @error('title') is-invalid @enderror" placeholder="Электронна почта" value="{{ old('email') }}">
        </div>
        <div class="input-group mb-3" style="border-right: 1px solid #d083cf">
          <input type="password" name="password" class="form-control @error('title') is-invalid @enderror" placeholder="Пароль">
        </div>
        <div class="input-group mb-3" style="border-right: 1px solid #d083cf">
          <input type="password" name="password_confirmation" class="form-control @error('title') is-invalid @enderror" placeholder="Подтверждение пароля">
        </div>
        <div class="row" style="padding:0; margin:0">
          <div class="col-8">
          </div>
          <!-- /.col -->
          <div class="col-4" style="padding:0; margin:0">
            <button type="submit" class="btn btn-primary btn-block">Зарегаться</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <a href="/login" class="text-center">Я уже регистрировался на этом сайте</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>

<script src="{{ asset('assets/admin/js/admin.js') }}"></script>
</body>
</html>