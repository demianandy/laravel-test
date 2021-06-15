@extends('admin.layouts.layout')

@section('table')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h3 class="page-header">Редактирование эпизода</h3>

        @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                    <li>Поле не должно быть пустым</li>
                  @endforeach
              </ul>
            </div>

        @endif

    </section>

    <!-- Main content -->
    <form role="form" method="post" action="{{ route('episodes.update', ['episode' => $episode->id]) }}">
        @csrf
        @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ $episode->title }}" name="title">
                  </div>

                  <div class="form-group">
                    <input type="date" class="form-control @error('title') is-invalid @enderror" id="air_date" value="{{ $episode->air_date}}" name="air_date">
                  </div>


                  <div class="form-group" style="padding-right: 0px">
                    <label for="characters_id">Персонажи</label>
                    <select class="form-control select2" multiple="multiple" data-placeholder="Выбор актёров" style="width: 100%;" name="characters[]" id="characters">
                    @foreach($characters as $k => $character)
                      <option value="{{ $k }}" @if(in_array($k, $episode->characters->pluck('id')->all())) selected @endif >{{ $character }}</option>
                    @endforeach
                    </select>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer ">
                  <button type="submit" class="btn btn-primary button_table">Сохранить</button>
                </div>
              </form>
    <!-- /.content -->

@endsection