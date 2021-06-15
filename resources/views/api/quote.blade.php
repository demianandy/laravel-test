@extends('layouts.layout')

@section('slider')
<h1 class="text-center">id фразы: <span class="header"></span></h1>
<hr>
<h2 style="width: 100%; display: flex; justify-content: space-between">Автор фразы: <span class="characters" style="justify-self: right; color: violet; font-size: 22px; margin-left: 50px"></span></h2>
<hr>
<h2 style="width: 100%; display: flex; justify-content: space-between">Фраза: <span class="air_date" style="justify-self: right; color: violet; font-size: 22px; margin-left: 50px""></span></h2>
@endsection


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
  var url="<?php  echo basename($_SERVER['REQUEST_URI']); ?>";
      $.ajax({            
          url: "/api/quote/"+url,
          type: "GET",
          dataType: "json",
          success(data) {

            // let episodes = data.episodes;
            // let arr_episodes = [];
            // for (let index in episodes){
            //   arr_episodes.push(' ' + episodes[index].title);
            // }

            // let quotes = data.quotes;
            // let arr_quotes = [];
            // for (let index in quotes){
            //   arr_quotes.push(" " + quotes[index].quote);
            // }

            // arr_quotes = arr_quotes.join('\n');

              $('.header').text(data.id);
              $('.air_date').text(data.quote);
              $('.characters').text(data.character.name);
          }
      })
</script>

