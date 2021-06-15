@extends('layouts.layout')

@section('slider')
<h1 class="text-center">Фразы</h1>
<table class="table table-bordered table-hover ">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Фраза</th>
                      <th>Артист</th>
                      <th style="width: 100px">Перейти</th>
                    </tr>
                  </thead>
                  <tbody class="quotes">

                  </tbody>
</table>
@endsection


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
    $.ajax({
        url: "/api/quotes",
        type: "GET",
        dataType: "json",
        success(data) {
            console.log(data);
            for (let index in data) {
              
              let character = data[index].character.name;

                $('.quotes').append(`
                <tr>
                      <td>${data[index].id}</td>
                      <td>${data[index].quote}</td>
                      <td>${character}</td>
                      <td>
                        <div class="td">
                            <a href="/quote/${data[index].id}" class ="btn btn-info btn-sm">
                            <i class="fa fa-sign-out rounded"></i></a>
                        </div>
                      </td>
                </tr>
                `)
            }
        }
    })
</script>

