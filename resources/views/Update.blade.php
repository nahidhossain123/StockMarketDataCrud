<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
      <style type="text/css">
        input{
          margin-bottom: 010px;
        }
      </style>
    </head>
    <body>
        <div class="container p-5 my-4" style="border:1px solid gray;">
            <a href="/" class="btn btn-success px-3 py-1 mb-3"><- Back</a>
           <form method="POST" action="{{route('update',[$data->id])}}" enctype="multipart/form-data">
            @csrf
            <input class="form-control" type="text" name="date" value="{{$data->date}}" placeholder="{{$data->date}}" aria-label="default input example">
            
            <input class="form-control" type="text" name="trade_code" value="{{$data->trade_code}}" placeholder="{{$data->trade_code}}" aria-label="default input example">
            
            <input class="form-control" type="text" name="high" value="{{$data->high}}" placeholder="{{$data->high}}" aria-label="default input example">
            
            <input class="form-control" type="text" name="low" value="{{$data->low}}" placeholder="{{$data->low}}" aria-label="default input example">
           
            <input class="form-control" type="text" name="open" value="{{$data->open}}" placeholder="{{$data->open}}" aria-label="default input example">
            
            <input class="form-control" type="text" name="close" value="{{$data->close}}" placeholder="{{$data->close}}" aria-label="default input example">
            
            <input class="form-control" type="text" name="volume" value="{{$data->volume}}" placeholder="{{$data->volume}}" aria-label="default input example">
            
            <input type="submit" class="btn btn-success w-100" name="update" value="Update">
            </form>
        </div>
       <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    </body>
</html>
