@extends('layouts.layout')

@section('menu')
<h1 class="text-center">Админка</h1>
<nav class="navbar" role="navigation">
<ul class="nav nav-tabs">
          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Эпизоды</a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="{{ route('episodes.index') }}">Список эпизодов</a></li>
              <li><a href="{{ route('episodes.create') }}">Новый эпизод</a></li>
            </ul>
          </li>
  

          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Персонажи</a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="{{ route('characters.index') }}">Список артистов</a></li>
              <li><a href="{{ route('characters.create') }}">Новый актёр</a></li>
            </ul>
          </li>


          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Фразы</a>
          <ul class="dropdown-menu" role="menu">
              <li><a href="{{ route('quotes.index') }}">Список фраз</a></li>
              <li><a href="{{ route('quotes.create') }}">Новая фраза</a></li>
            </ul>
          </li>


          <!-- <li><a href="pages/404.php">404 ошибка</a></li> -->
        </ul>

      </nav>
      
      @yield('table')

@endsection

