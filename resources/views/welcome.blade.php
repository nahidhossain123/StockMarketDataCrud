<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
          google.charts.load('current', {'packages':['corechart']});
          google.charts.setOnLoadCallback(drawChart);

          function drawChart() {
            var data = google.visualization.arrayToDataTable([
              ['Date', 'High', 'Low','Open','Close'],
             
            ]);

            var options = {
              title: 'Company Performance',
              curveType: 'function',
              legend: { position: 'bottom' }
            };

            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

            chart.draw(data, options);
          }
        </script>
        <style type="text/css">
          .w-5{
            display: none;
          }
        </style>
        
    </head>
    <body>
        <div class="container my-5">
                @if(Session::has('message'))
                  <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('message') }}</p>
                @endif
            <form method="get" action="/">
                <div class="input-group">
                  <select class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon" name="trade_code">
                    <option selected>Choose...</option>
                    
                  </select>
                  <input class="btn btn-outline-secondary px-5" type="submit" value="Filter">
                </div>
            </form>
            <div id="curve_chart" class="my-3" style="border: 1px solid gray;padding: 0;width: 100%; height: 500px"></div>
            <div>
                <table class="table table-hover table-dark table-sm text-center">
              <thead>
                <tr style="text-align: left;">
                    <th colspan="9" class="table-primary p-2 text-left" style="color:gray;font-size:18px;">

                      @if($dataArry->total()==0)
                        <a href="adddata" style="text-decoration: none;">
                            <span style="font-size: 25px;">+</span>Add Data
                        </a>
                      @else
                        All Data
                      @endif
                    </th>
                <tr>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Date</th>
                  <th scope="col">Trade_Code</th>
                  <th scope="col">High</th>
                  <th scope="col">Low</th>
                  <th scope="col">Open</th>
                  <th scope="col">Close</th>
                  <th scope="col">Volume</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($dataArry as $indx=>$val)
                <tr>
                  <th scope="row">{{$indx}}</th>
                  <td>{{$val->date}}</td>
                  <td>{{$val->trade_code}}</td>
                  <td>{{$val->high}}</td>
                  <td>{{$val->low}}</td>
                  <td>{{$val->open}}</td>
                  <td>{{$val->close}}</td>
                  <td>{{$val->volume}}</td>
                  <td>
                    <a href="edit/{{$val->id}}" class="btn btn-success px-2 py-0">Update</a>
                    <a href="delete/{{$val->id}}" class="btn btn-danger px-2 py-0">Delete</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            </div>
            <span>
              {{$dataArry->links()}}
            </span>
        </div>
       <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    </body>
</html>
