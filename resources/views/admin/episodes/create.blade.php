@extends('admin.layouts.layout')

@section('table')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h3 class="page-header">Новый эпизод</h3>

        @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                    <li>Заполните все поля</li>
                  @endforeach
              </ul>
            </div>

        @endif

    </section>

    <!-- Main content -->
    <form role="form" method="post" action="{{ route('episodes.store') }}">
        @csrf




                <div class="card-body">
                  <div class="form-group">
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Название эпизода" name="title">
                  </div>
                  <div class="form-group">
                    <input type="date" class="form-control @error('title') is-invalid @enderror" id="air_date" placeholder="Дата выпуска" name="air_date">
                  </div>

                  <div class="form-group" style="padding-right: 0px">
                    <label for="characters_id">Персонажи</label>
                    <select class="form-control select2" multiple="multiple" data-placeholder="Выбор актёров" style="width: 100%;" name="characters[]" id="characters">
                    @foreach($characters as $k => $character)
                      <option value="{{ $k }}">{{ $character }}</option>
                    @endforeach
                    </select>
                  </div>
                
                <hr>

                <div class="card-footer ">
                  <button type="submit" class="btn btn-primary button_table">Создать</button>
                </div>
                </div>
                <!-- /.card-body -->


              </form>
    <!-- /.content -->

@endsection