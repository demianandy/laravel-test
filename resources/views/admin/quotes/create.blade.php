@extends('admin.layouts.layout')

@section('table')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h3 class="page-header">Новая фраза</h3>

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
    <form role="form" method="post" action="{{ route('quotes.store') }}">
        @csrf
                <div class="card-body">
                  <div class="form-group">
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="quote" placeholder="Текст фразы" name="quote">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="form-group">
                        <label for="character_id">Персонаж</label>
                        <select class="form-control custom-select" id="character_id" name="character_id">
                        @foreach ($characters as $k => $character)
                          <option value="{{$k}}">{{$character}}</option>
                        @endforeach
                        </select>    
                </div>
<hr>
                <div class="card-footer ">
                  <button type="submit" class="btn btn-primary button_table">Создать</button>
                </div>
              </form>
    <!-- /.content -->

@endsection