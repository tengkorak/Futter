@extends('layouts.app')

<!DOCTYPE html>

<head>

        
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="layout" content="main">
        
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <script src="/assets/application-f35f989fa01635b66f393ea0a4445f6d.js" type="text/javascript" ></script>
        <link rel="stylesheet" href="/assets/application-fb0559d023bbc28af5c516f6f971d1fd.css"/>
        
        
        <link rel="stylesheet" href="/assets/odometer-theme-default-6d5c5057e59fd96f62aa2c94ef2e8fec.css"/>
        <link rel="stylesheet" href="/assets/shepherd-theme-default-728e02068bc3cc5def4a75d307322c66.css"/>

        <!--Google Map API-->
        <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyCG3jkVCP9xhqymNV55sI90AK9uB3E7dNM&sensor=true"></script>

        <!--Font Awesome Script-->
        <script src="https://kit.fontawesome.com/a0ee17d7d8.js" crossorigin="anonymous"></script>

</head>


<!-- Begin page content -->
@section('content')


<div class="container">
    <div class="row clearfix">

        <!-- Venue list card-->
        <div class="col">
                <div class="card">
                    <div class="card-header"><i class="fas fa-globe-asia"></i> List of Court Venue</div>   
                        <div class="card-body">
                            <div class="panel-body">
                                <p><a class="btn btn-outline-dark" href={{route('courts.index')}}>List of Registered Courts</a></p>
                            </div>
                        </div>
                </div>
        </div>

        <!-- Browse MY profile card-->
        {{-- <div class="col">
                <div class="card">
                    <div class="card-header"><i class="fa fa-street-view"></i> Profile {{ $pemain->name }}</div>   
                        <div class="card-body">
                            <div class="panel-body">
                                
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/profile">
                                        User Profile
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                                {{-- <p>Your Picture  <img src="{{  asset('storage/avatar/' . Auth::user()->avatar) }}"></p> --}} 
                                        {{-- <a class="btn btn-outline-dark" href={{route('attributes.show', auth()->user()->id)}}>View your ratings & attributes</a> --}}
                            </div>
                        </div>
                </div>
        </div> 


    </div>
    

</div>

<br>

{{-- <div class="container">
        <div class="row clearfix">
    
            <!-- Browse MY GAMES card-->
            <div class="col">
                    <div class="card">
                        <div class="card-header"><i class="fas fa-futbol"></i>&nbsp;My Games</div>   
                            <div class="card-body">
                                <div class="panel-body">
                                    <p>
                                    Scheduler
                                        <ul>
                                            <li>Your Games</li>
                                            <li>Ongoing Games</li>
                                        </ul>
                                    </p>
                                </div>
                            </div>
                    </div>
            </div>
        </div>
</div> --}}


@endsection
</html>