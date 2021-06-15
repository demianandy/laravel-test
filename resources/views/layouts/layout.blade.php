<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/admin.css')}}"> -->
<title>Блог о фильме</title>
<link rel="stylesheet" href="{{ asset('assets/admin/css/admin.css') }}">

<!-- <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/animate.css">
<link rel="stylesheet" type="text/css" href="assets/css/font.css">
<link rel="stylesheet" type="text/css" href="assets/css/li-scroller.css">
<link rel="stylesheet" type="text/css" href="assets/css/slick.css">
<link rel="stylesheet" type="text/css" href="assets/css/jquery.fancybox.css">
<link rel="stylesheet" type="text/css" href="assets/css/theme.css">
<link rel="stylesheet" type="text/css" href="assets/css/style.css"> -->
<!--[if lt IE 9]>
<script src="assets/js/html5shiv.min.js"></script>
<script src="assets/js/respond.min.js"></script>
<![endif]-->
</head>

<body>

<?
    $day = date('d');
    $month = date('M');
    $year = date('Y');
    $week = date('l');

    switch ($month) {
        case 'Jan' : $month = 'января'; break;
        case 'Feb' : $month = 'февраля'; break;
        case 'Mar' : $month = 'марта'; break;
        case 'Apr' : $month = 'апреля'; break;
        case 'May' : $month = 'мая'; break;
        case 'Jun' : $month = 'июня'; break;
        case 'Jul' : $month = 'июля'; break;
        case 'Aug' : $month = 'августа'; break;
        case 'Sep' : $month = 'сентября'; break;
        case 'Oct' : $month = 'октября'; break;
        case 'Nov' : $month = 'ноября'; break;
        case 'Dec' : $month = 'декабря'; break;
    }

    switch ($week) {
        case 'Monday' : $week = 'Понедельник'; break;
        case 'Tuesday' : $week = 'Вторник'; break;
        case 'Wednesday' : $week = 'Среда'; break;
        case 'Thursday' : $week = 'Четверг'; break;
        case 'Friday' : $week = 'Пятница'; break;
        case 'Saturday' : $week = 'Суббота'; break;
        case 'Sunday' : $week = 'Воскресенье'; break;
    }

    $date = "$day $month, $year год. $week."
?>

<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<div class="container">
  <header id="header">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="header_top">
          <div class="header_top_left">
            <ul class="top_nav">
              <li><a href="/episodes">Эпизоды</a></li>
              <li><a href="/characters">Актёры</a></li>
              <li><a href="/quotes">Фразы</a></li>
              <li><a href="/characters/random">Случайный персонаж</a></li>
              <li><a href="/admin">Админка</a></li>
            </ul>
          </div>
          <div class="header_top_right">
            <p><?=$date;?></p>
          </div>
        </div>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12">

      </div>
    </div>
  </header>
  <section id="navArea">

  </section>
  <section id="newsSection">
    <div class="row">
      <div class="col-lg-12 col-md-12">
       
      </div>
    </div>
  </section>
  <section id="sliderSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        
        @yield('slider')
        @yield('menu')

      </div>

      <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="single_sidebar wow fadeInDown">
        @if (session()->has('success'))
                  <div class="alert alert-success">
                      {{ session('success') }}
                  </div>
          @endif
            <h2><span>Гостевая книга</span></h2>
            <ul>
              @if (Auth::check())

              <li><a href="/logout">Выйти</a></li>
              @else
              <li><a href="/login">Вход</a></li>
              <li><a href="/register">Регистрация</a></li>
              @endif
            </ul>
        </div>
        <hr>
      </div>
    </div>
  </section>

  <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
         
         
        @yield('index')

          

        </div>
      </div>

    </div>

  </section>
</div>
<!-- <script src="assets/js/jquery.min.js"></script> 
<script src="assets/js/wow.min.js"></script> 
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/jquery.li-scroller.1.0.js"></script> 
<script src="assets/js/jquery.newsTicker.min.js"></script> 
<script src="assets/js/jquery.fancybox.pack.js"></script> 
<script src="assets/js/custom.js"></script> -->
<script src="{{ asset('assets/admin/js/admin.js') }}"></script>

</body>
</html>