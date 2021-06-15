@extends('layouts.layout')

@section('slider')
<h1 class="text-center"></h1>
<hr>
<h2 style="width: 100%; display: flex; justify-content: space-between">Дата экранизации: <span class="air_date" style="justify-self: right; color: violet"></span></h2>
<hr>
<h2 style="width: 100%; display: flex; justify-content: space-between">Артисты: <span class="characters" style="justify-self: right; color: violet; font-size: 22px; margin-left: 50px"></span></h2>
@endsection


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
  var url="<?php  echo basename($_SERVER['REQUEST_URI']); ?>";
      $.ajax({            
          url: "/api/episode/"+url,
          type: "GET",
          dataType: "json",
          success(data) {

            let characters = data.characters;
            let arr_characters = [];
            for (let index in characters){
              arr_characters.push(' ' + characters[index].name);
            }

              $('.text-center').text(data.title);
              $('.air_date').text(data.air_date);
              $('.characters').text(arr_characters);
          }
      })
</script>

