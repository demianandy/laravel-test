@extends('layouts.layout')

@section('slider')
<h1 class="text-center"></h1>
<hr>
<h2 style="width: 100%; display: flex; justify-content: space-between">Дата рождения: <span class="air_date" style="justify-self: right; color: violet"></span></h2>
<hr>
<h2 style="width: 100%; display: flex; justify-content: space-between">Эпизоды: <span class="characters" style="justify-self: right; color: violet; font-size: 22px; margin-left: 50px"></span></h2>
<hr>
<h2 style="width: 100%; display: flex; justify-content: space-between">Фразы: <pre class="quotes" style="justify-self: right; color: violet; font-size: 22px; margin-left: 50px"></pre></h2>
@endsection


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  var url="<?php  echo basename($_SERVER['REQUEST_URI']); ?>";
  if (url == "random") {
    url = "/api/characters/random";
  } else {
    url = "/api/character/"+url;
  }
      $.ajax({   
          url: url,
          type: "GET",
          dataType: "json",
          success(data) {
            console.log("njnu");
            let episodes = data.episodes;
            let arr_episodes = [];
            for (let index in episodes){
              arr_episodes.push(' ' + episodes[index].title);
            }

            let quotes = data.quotes;
            let arr_quotes = [];
            for (let index in quotes){
              arr_quotes.push(" " + quotes[index].quote);
            }

            arr_quotes = arr_quotes.join('\n');

              $('.text-center').text(data.name);
              $('.air_date').text(data.birthday);
              $('.characters').text(arr_episodes);
              $('.quotes').text(arr_quotes);
          }
      })
</script>

