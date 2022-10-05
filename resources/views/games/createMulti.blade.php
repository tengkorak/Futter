@extends('layouts.app')

@section('content')
<head>
    <style>
    
    .page-header h1{
        padding-left: 10em; 
    }
    
    .img{
        height:300px;
        width:100%;
    }
    
    </style>
    </head>
    
    <!--Bootstrap date/time picker's files-->
    <link rel="stylesheet" href="bootstrap-datetimepicker.min.css">
    <script src="bootstrap-datetimepicker.min.js"></script>
    
    <div class="container">
        <div class="page-header">
            <h1>New Game</h1>
        </div>
    </div>
       
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
     
    {{--One Match Form  --}}
    <form action="/games" method="POST" class="container" id="oneMatch">
            {{ csrf_field() }}
    <div class="row">
        <div class="col-md-5">
            
            <!--Input Community-->
            <div class="input-group-prepend">
            <span class="input-group-text"><i class="fa fa-sitemap fa-fw"></i></span> <!--fontawesome icon-->
            {{-- <input type="text" class="form-control" placeholder="Community"> --}}
            <select id="communityId" name="community.id" class="form-control" placeholder="Community"></select>
            
            {{-- <option value="null">Select Community</option>
            <option value="89" >11 v 11 Townsville</option>
            <option value="141" >Merlimau 2</option>
            <option value="140" >Merlimau FC</option> --}}
            
            </div>              
            <br>  
                
            <!--Match Title-->
            <div class="input-group-prepend">
            <span class="input-group-text"><i class="fa fa-info fa-fw"></i></span>
            <input type="text" name="match_title" value="{{ old('match_title') }}" class="form-control" placeholder="Match Title"
            style="text-transform: capitalize" required>
            </div>
            <br>
            
            <!--Location-->
            <div class="input-group-prepend">
            <span class="input-group-text"><i class="fa fa-globe fa-fw"></i></span>
            <input type="text" name="location" value="{{ old('location') }}" class="form-control" placeholder="location"
            style="text-transform: capitalize" required>        
            </div>
            <br>            
                
            <!--Time Picker-->
            <div class="bfh-timepicker">
            <div class="input-group-prepend">
            <span class="input-group-text"><i class="fa fa-clock-o fa-fw"></i></span>
            <input type="datetime-local" name="date_time" value="{{ old('date_time') }}" class="form-control" placeholder="Date & Time" required>
            </div>
            </div>
            <br>
            
            <!--Amount-->
            <div class="input-group-prepend">
            <span class="input-group-text"><i class="fa fa-money fa-fw"></i></span>
            <input type="text" name="amount" value="{{ old('amount') }}" class="form-control" placeholder="amount"
            style="text-transform: capitalize" required>
            </div>
        </div>
    
        <!--Rivaldo-->
        <div class="col-md-7">
            <div><p>Click on the map to place a pin where the game will be!</p></div>
            <img src={{asset('img/rivaldo.jpg')}} style="height:300px;width:100%;">
            <div id="map"></div>
        </div>
    </div>
                
    <div class="col-md-12 text-center clearfix" style="padding: 3em;">
        <button type="submit" class="btn btn-success">Create</button>
        <a class="btn btn-danger" onclick="window.history.back()">Back</a>
        {{-- <a class="btn btn-primary" href=""> Back</a> --}}
    </div>
    
    </form>
    
    {{--         
        masuk lepas cost
        <input type="hidden" name="latitude" value="" id="latitude" />
            <input type="hidden" name="longitude" value="" id="longitude" />
            <input type="hidden" name="homeLocationLatitude" id="homeLocationLatitude" value="-33.867387" />
            <input type="hidden" name="homeLocationLongitude" id="homeLocationLongitude" value="-151.207629" />
        </div>
        <div class="col-md-7">
            <div><p>Click on the map to place a pin where the game will be!</p></div>
            <div id="map" style="height:300px;width:100%;"></div>
        </div>
    </div> --}}
    
    {{-- cancel button after creating --}}
@endsection

{{--             <div class="bfh-timepicker">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Start Date:</strong>
                    <input type="datetime-local" name="date_time" value="{{ old('date_time') }}" placeholder="Detail">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>End Date:</strong>
                    <input type="datetime-local" name="end_date" value="{{ old('end_date') }}" placeholder="Detail">
                </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Amount</strong>
                    <input type="text" name="amount" class="form-control" value="{{ old('amount') }}" placeholder="amount">
                </div>
            </div> --}}