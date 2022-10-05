{{dd($pemain)}}

@extends('games.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Games</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('games.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $game->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Details:</strong>
                {{-- ni aq tak sure letak ke tidak sebab aq takde detail --}}
                {{ $game->detail }}
            </div>
        </div>
    </div>
@endsection