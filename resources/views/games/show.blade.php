@extends('layouts.app')
        
@section('content')



<!-- Begin page content -->
<div class="container">

<!--Match Title-->
<div class="page-header">
    <h1 style="text-transform: uppercase;"> {{$game->match_title}}</h1> 
</div>

<!--Match Cost-->
<div class="alert alert-info">
    Cost (per person) : {{$game->amount}}
</div>

<head>
<style>

.fa-search {
  color: #e54d26;  
}

</style>
</head>
   
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


<input type="hidden" name="id" value="{{$game->id}}" id="gameId" />
<section id="show-game" class="first">

<!--Start Table-->
<div class="row">
    
    <!--First column for details-->
    <div class="col-md-12" style="padding-left: 70px;">
        <div class="card text-white bg-dark mb-3" >
            <div class="card-header">
                <i class="fas fa-futbol" style="color:white"></i> &nbsp; Your Game
            </div>
            <table class="table text-white">
                <tbody>
                    <ul class="list-group list-group-flush">
                    <tr>
                        <td class="text-center">
                            <i class="fa fa-sitemap fa-fw fa-2x" title="Community"></i>
                        </td>
                        <td class="text" style="vertical-align:middle;">
                            {{$game->communities[0]->community_name}} VS {{$game->communities[1]->community_name}} <!--Display what community he's in-->
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <i class="fa fa-calendar fa-fw fa-2x" title="Start Date"></i>
                        </td>
                        <td class="text-left" style="vertical-align:middle;">
                            <span class="lead">{{$game->date_time}}</span> <!--Display Date-->
                        </td>
                    </tr>
                    {{-- <tr>
                        <td class="text-center">
                            <i class="fa fa-clock-o fa-fw fa-2x" title="Start Time"></i>
                        </td>
                        <td class="text-left" style="vertical-align:middle;">
                            <span class="lead">15:55</span> <span>CST</span> <!--Display Time-->
                        </td>
                    </tr> --}}
                    <tr>
                        <td class="text-center">
                            <i class="fa fa-globe fa-fw fa-2x" title="Location"></i>
                        </td>
                        <td class="text-left" style="vertical-align:middle;">
                            {{$game->court->name}} <!--Display Location-->
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <i class="fa fa-user fa-fw fa-2x" title="Organiser"></i>
                        </td>
                        <td class="text-left" style="vertical-align:middle;">
                            {{$game->total_players}} <!--Display Total Player-->
                        </td>
                    </tr>
                    </ul>
                </tbody>
            </table>
        </div>
    </div>
</div>

<br>

<!--View status of players queue-->


<!--Display-->
<div class="row row-cols-1 row-cols-md-3">
    @foreach($users as $user)
        <div class="col-2 mb-4" >
          <div class="card">
            {{-- <img src="..." class="card-img-top" alt="..."> --}}
            <div class="card-body">
              <h5 class="card-title">{{$user->name}}</h5>
            </div>
          </div>
        </div>
    @endforeach
</div>


<!--View status function-->

<!--notify invitation--> 

<!--Comment section-->


<!--Buttons-->
<div class="col-md-12 text-center clearfix" style="padding: 3em;">
    <a class="btn btn-outline-primary" href="/games/{{$game->id}}/arrange/{{$game->communities[0]->id}}/vs/{{$game->communities[1]->id}}">Next</a> <!--Button next page disabled klau tak cukup 12-->
    <a class="btn btn-outline-danger" onclick="window.history.back()">Back</a>
    
</div>

</section>
</body>
</html>

@endsection