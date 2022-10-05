@extends('layouts.app')
  
@section('content')
<!--stack overflow-->
{{-- @foreach($recomends as $recomend)
{{$recomend}}
@endforeach --}}

<div class="alert alert-info">
    Please insert your attributes if your rating = [0]
</div>

<div class="container">
<div class="row">
    
    <!--Team 1-->
    <div class="col-sm-6">
        <div class="card text-white bg-light mb-3">
            <div class="card-header" style="color:black;">{{$namaTeam1}}</div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                          <td style="color:#505050">Defender</td>
                          <td style="color:#505050">Right Wing</td>
                          <td style="color:#505050">Left Wing</td>
                          <td style="color:#505050">Striker</td>

                        </tr>
                    </thead>
                    <tbody>
                        
                        {{-- {{dd($highestDefender)}} --}}
                        @foreach ($team1Data as $position)
                            <tr>
                                <td style="color:#505050">{{$position[0]}}</td>
                                <td style="color:#505050">{{$position[1]}}</td>
                                <td style="color:#505050">{{$position[2]}}</td>
                                <td style="color:#505050">{{$position[3]}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
          </div>
    </div>
    
    <!--Team 2-->
    <div class="col-sm-6">
        <div class="card text-white bg-dark mb-3">
            <div class="card-header">{{$namaTeam2}}</div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                          <td style="color:#FFFFFF">Defender</td>
                          <td style="color:#FFFFFF">Right Wing</td>
                          <td style="color:#FFFFFF">Left Wing</td>
                          <td style="color:#FFFFFF">Striker</td>

                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($team2Data as $position)
                            <tr>
                                <td style="color:#FFFFFF">{{$position[0]}}</td>
                                <td style="color:#FFFFFF">{{$position[1]}}</td>
                                <td style="color:#FFFFFF">{{$position[2]}}</td>
                                <td style="color:#FFFFFF">{{$position[3]}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
          </div>
      </div>
</div>
</div>


<!--Hahahaha-->
<div class="col-md-12 text-center clearfix" style="padding: 3em;">
    <a class="btn btn-outline-primary" href="/games/finish">Next</a> <!--Button next page disabled klau tak cukup 12-->
    <a class="btn btn-outline-danger" onclick="window.history.back()">Back</a>

</div>
@endsection