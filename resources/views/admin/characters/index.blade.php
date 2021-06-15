@extends('admin.layouts.layout')


@section('table')
<section class="content">
<div class="card">
      <div class="card-header">
          <h3 class="page-header">Текущие статьи</h3>
      </div>



          @if (session()->has('success'))
                  <div class="alert alert-success">
                      {{ session('success') }}
                  </div>
          @endif


      <div class="card-body style="max-width: 100%">
        <div class="card-body style="max-width: 100%">

            @if(count($characters))
                <table class="table table-bordered table-hover " style="max-width:100%;  table-layout: fixed">
                  <thead>
                    <tr>
                      <th style="width: 25px">#</th>
                      <th class="word-wrap: break-word">Имя</th>
                      <th>Дата рождения</th>
                      <th>Специальность</th>
                      <th>Кличка</th>
                      <th>Имя актёра</th>
                      <th style="width: 100px">Действия</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($characters as $character)
                    <tr>
                      <td style="width: 10px">{{ $character->id }}</td>
                      <td class="word-wrap: break-word">{{ $character->name }}</td>
                      <td>{{ $character->birthday}}</td>
                      <td>{{ $character->occupations['Главная роль']. ', '. $character->occupations['Каскадерская роль'] }}</td>
                      <td>{{ $character->nickname }}</td>
                      <td>{{ $character->portrayed }}</td>
                      <td class="">
                        <div class="td">
                            <a href="{{ route('characters.edit', ['character' => $character->id]) }}" class ="btn btn-info btn-sm float-left mr-1">
                            <i class="fas fa-pencil-alt rounded"></i></a>
                            <form action="{{ route('characters.destroy', ['character' => $character->id]) }}" method="POST" class="float-left">
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
                <p>Актёров пока нет :(</p>
            @endif

        </div>

            {{ $characters->onEachSide(1)->links() }}

                <a href="{{ route('characters.create') }}" class = 'btn button_table btn-primary mb-3'>Добавить актёра</a>
</div>
</section>
@endsection