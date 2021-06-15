@extends('admin.layouts.layout')

@section('table')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h3 class="page-header">Редактирование фразы</h3>

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
    <form role="form" method="post" action="{{ route('quotes.update', ['quote' => $quote->id]) }}">
        @csrf
        @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                  
                    <textarea style="resize:none" class="form-control @error('title') is-invalid @enderror" name="quote" id="quote" rows="5">{{ $quote->quote }}</textarea>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="form-group">
                
                        <label for="character_id">Персонаж</label>
                        <select class="form-control custom-select" id="character_id" name="character_id">
                        @foreach ($characters as $k => $character)
                          <option value="{{$k}}"  @if($k == $quote->character_id) selected @endif >{{$character}}</option>
                        @endforeach
                        </select>
                        
                </div>
<hr>

                <div class="card-footer ">
                  <button type="submit" class="btn btn-primary button_table">Сохранить</button>
                </div>
              </form>
    <!-- /.content -->

@endsection