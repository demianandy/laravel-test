@extends('admin.layouts.layout')

@section('table')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h3 class="page-header">Редактирование персонажа</h3>

        @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                  <li>Все поля должны быть заполнены</li>
              </ul>
            </div>

        @endif

    </section>



    <!-- Main content -->
    <form role="form" method="post" action="{{ route('characters.update', ['character' => $character->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <input type="text" class="form-control" id="name" value="{{ $character->name}}" name="name">
                  </div>
                </div>

                <div class="form-group">
                    <input type="date" class="form-control" id="birthday" value="{{ $character->birthday}}" name="birthday">
                </div>

                  <div class="form-group" style="padding-left: 0px">
                    <label for="img">Портрет</label>

                    <div class="custom-file form-control">
                      <input type="file" class="custom-file-input" id="img" name="img" value="{{ $character->img }}">
                    </div>
                    <div class="">{{ $character->img }}</div>
                  </div>

                  <div class="form-group">
                    <input type="text" class="form-control" id="occupations" value="{{ $character->occupations['Главная роль'] }}" name="occupations">
                    <input type="text" class="form-control" id="occupations2" value="{{ $character->occupations['Каскадерская роль'] }}" name="occupations2">
                  </div>

                  <div class="form-group">
                    <input type="text" class="form-control" id="nickname" value="{{ $character->nickname }}" name="nickname">
                  </div>

                  <div class="form-group">
                    <input type="text" class="form-control" id="portrayed" value="{{ $character->portrayed }}"name="portrayed">
                  </div>


                  <div class="form-group" style="padding-right: 0px">
                    <label for="episode_id">Эпизоды</label>
                    <select class="form-control select2" multiple="multiple" data-placeholder="Выбор эпизодов" style="width: 100%;" name="episodes[]" id="episodes">
                    @foreach($episodes as $k => $episode)
                      <option value="{{ $k }}" @if(in_array($k, $character->episodes->pluck('id')->all())) selected @endif >{{ $episode }}</option>
                    @endforeach
                    </select>
                  </div>

                <!-- /.card-body -->




   
<hr>


                <div class="card-footer ">
                  <button type="submit" class="btn btn-primary button_table">Сохранить</button>
                </div>

            </form>
    <!-- /.content -->

@endsection