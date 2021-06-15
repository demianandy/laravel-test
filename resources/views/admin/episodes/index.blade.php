@extends('admin.layouts.layout')


@section('table')
<section class="content">
<div class="card">
      <div class="card-header">
          <h3 class="page-header">Текущие эпизоды</h3>
      </div>



          @if (session()->has('success'))
                  <div class="alert alert-success">
                      {{ session('success') }}
                  </div>
          @endif


      <div class="card-body">
        <div class="card-body">

            @if(count($episodes))
                <table class="table table-bordered table-hover ">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Название</th>
                      <th>Дата экранизации</th>
                      <th>Артисты</th>
                      <th>Фразы</th>
                      <th style="width: 100px">Действия</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($episodes as $episode)
                    <tr>
                      <td>{{ $episode->id }}</td>
                      <td>{{ $episode->title }}</td>
                      <td>{{ $episode->air_date }}</td>
                      <td>{{ $episode->characters->pluck('name')->join(', ')}}</td>
                      <td>{{ $episode->quotes->pluck('id')->join(', ')}}</td>
                      <td class="">
                      <div class="td">
                          <a href="{{ route('episodes.edit', ['episode'=>$episode->id]) }}" class ="btn btn-info btn-sm float-left mr-1">
                          <i class="fas fa-pencil-alt rounded"></i></a>
                          <form action="{{ route('episodes.destroy', ['episode' => $episode->id]) }}" method="POST" class="float-left">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class = "btn btn-danger btn-sm" onclick="return confirm('Подтвердить удаление')"> <i class="fas fa-trash-alt"></i></button>
                          </form>
                          </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            @else 
                <p>Эпизодов пока нет :(</p>
            @endif

        </div>

            {{ $episodes->onEachSide(1)->links() }}

                <a href="{{ route('episodes.create') }}" class = 'btn button_table btn-primary mb-3'>Добавить эпизод</a>
</div>
</section>
@endsection