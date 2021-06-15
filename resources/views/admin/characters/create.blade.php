@extends('admin.layouts.layout')

@section('table')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h3 class="page-header">Новый персонаж</h3>

        @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                  <li>Все поля должны быть заполнены</li>
              </ul>
            </div>

        @endif

    </section>

    <!-- Main content -->
    <form role="form" method="post" action="{{ route('characters.store') }}" enctype="multipart/form-data">
        @csrf
                <div class="card-body">
                  <div class="form-group">
                    <input type="text" class="form-control" id="name" placeholder="Имя персонажа" name="name">
                  </div>
                </div>

                <div class="form-group">
                    <input type="date" class="form-control" id="birthday" placeholder="День рождения" name="birthday">
                </div>

                  <div class="form-group" style="padding-left: 0px">
                    <label for="img">Портрет</label>

                    <div class="custom-file form-control">
                      <input type="file" class="custom-file-input" id="img" name="img">
                    </div>
                  </div>

                  <div class="form-group">
                    <input type="text" class="form-control" id="occupations" placeholder="Главная роль" name="occupations">
                    <input type="text" class="form-control" id="occupations2" placeholder="Каскадерская роль" name="occupations2">
                  </div>

                  <div class="form-group">
                    <input type="text" class="form-control" id="nickname" placeholder="Кличка" name="nickname">
                  </div>

                  <div class="form-group">
                    <input type="text" class="form-control" id="portrayed" placeholder="Имя актёра" name="portrayed">
                  </div>


                  <div class="form-group" style="padding-right: 0px">
                    <label for="episode_id">Эпизоды</label>
                    <select class="form-control select2" multiple="multiple" data-placeholder="Выбор эпизодов" style="width: 100%;" name="episodes[]" id="episodes">
                    @foreach($episodes as $k => $episode)
                      <option value="{{ $k }}">{{ $episode }}</option>
                    @endforeach
                    </select>
                  </div>

                <!-- /.card-body -->




   
<hr>


                <div class="card-footer ">
                  <button type="submit" class="btn btn-primary button_table">Создать</button>
                </div>

            </form>
    <!-- /.content -->

@endsection