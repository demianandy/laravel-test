@extends('layouts.layout')

@section('slider')
<h1 class="text-center">Актеры</h1>
<table class="table table-bordered table-hover ">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Имя</th>
                      <th>Дата рождения</th>
                      <th>Эпизоды</th>
                      <th>Фразы (id)</th>
                      <th style="width: 100px">Перейти</th>
                    </tr>
                  </thead>
                  <tbody class="episodes">

                  </tbody>
</table>
@endsection


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
    $.ajax({
        url: "/api/characters",
        type: "GET",
        dataType: "json",
        success(data) {
            console.log(data);
            for (let index in data) {

              let episodes = data[index].episodes;
              let arr_episodes = [];
              for (let index in episodes){
                arr_episodes.push(' ' + episodes[index].title);
              }

              let quotes = data[index].quotes;
              let arr_quotes = [];
              for (let index in quotes){
                arr_quotes.push(' ' + quotes[index].id);
              }

                $('.episodes').append(`
                <tr>
                      <td>${data[index].id}</td>
                      <td>${data[index].name}</td>
                      <td>${data[index].birthday}</td>
                      <td>${arr_episodes}</td>
                      <td>${arr_quotes}</td>
                      <td>
                        <div class="td">
                            <a href="/character/${data[index].id}" class ="btn btn-info btn-sm">
                            <i class="fa fa-sign-out rounded"></i></a>
                        </div>
                      </td>
                </tr>
                `)
            }
        }
    })
</script>

