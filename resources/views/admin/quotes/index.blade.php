@extends('admin.layouts.layout')


@section('table')
<section class="content">
<div class="card">
      <div class="card-header">
          <h3 class="page-header">Текущие фразы</h3>
      </div>



          @if (session()->has('success'))
                  <div class="alert alert-success">
                      {{ session('success') }}
                  </div>
          @endif


      <div class="card-body">
        <div class="card-body">

            @if(count($quotes))
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Название</th>
                      <th>Автор</th>
                      <th style="width: 100px">Действия</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($quotes as $quote)
                    <tr>
                      <td>{{ $quote->id }}</td>
                      <td>{{ $quote->quote }}</td>
                      <td>{{ $quote->character['name']}}</td>
                      <td class="">
                          <div class="td">
                          <a href="{{ route('quotes.edit', ['quote'=>$quote->id]) }}" class ="btn btn-info btn-sm float-left mr-1">
                          <i class="fas fa-pencil-alt rounded"></i></a>
                          <form action="{{ route('quotes.destroy', ['quote' => $quote->id]) }}" method="POST" class="float-left">
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
                <p>Фраз пока нет :(</p>
            @endif

        </div>

            {{ $quotes->onEachSide(1)->links() }}

                <a href="{{ route('quotes.create') }}" class = 'btn button_table btn-primary mb-3'>Добавить фразу</a>
</div>
</section>
@endsection