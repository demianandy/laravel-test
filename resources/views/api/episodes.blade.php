@extends('layouts.layout')

@section('slider')
<h1 class="text-center">Эпизоды</h1>
<table class="table table-bordered table-hover ">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Название</th>
                      <th>Дата экранизации</th>
                      <th>Артисты</th>
                      <th>Фразы артистов (id)</th>
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
        url: "/api/episodes",
        type: "GET",
        dataType: "json",
        success(data) {
            console.log(data);
            for (let index in data) {

              let characters = data[index].characters;
              let arr_characters = [];
              for (let index in characters){
                arr_characters.push(' ' + characters[index].name);
              }

              let quotes = data[index].quotes;
              let arr_quotes = [];
              for (let index in quotes){
                arr_quotes.push(' ' + quotes[index].id);
              }

                $('.episodes').append(`
                <tr>
                      <td>${data[index].id}</td>
                      <td>${data[index].title}</td>
                      <td>${data[index].air_date}</td>
                      <td>${arr_characters}</td>
                      <td>${arr_quotes}</td>
                      <td>
                        <div class="td">
                            <a href="/episode/${data[index].id}" class ="btn btn-info btn-sm">
                            <i class="fa fa-sign-out rounded"></i></a>
                        </div>
                      </td>
                </tr>
                `)
            }
        }
    })
</script>

