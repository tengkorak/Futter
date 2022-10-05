@extends('layouts.app')
<!--Belum siap method edit dengan update, details tu belum settle, and tak tahu nak edit ape-->
@section('content')

<head>
<style>

</style>
</head>

<div class="container">
    <div class="page-header">
        <h1>Edit Details</h1>
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
  
<form action="{{ route('games.update',$game->id) }}" class="container" method="POST">
    @csrf
    @method('PUT')

<!--Start table , row-->
<div class="row">
    <div class="col-md-7">
            <!--Match Name-->
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-info fa-fw"></i></span>
                <input type="text" name="match_title" value="{{ $game->match_title }}" class="form-control" placeholder="Match Title"
                style="text-transform: capitalize">
            </div>
            <br>

            <!--Amount-->
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-money fa-fw"></i></span>
                <input type="text" name="amount" value="{{ $game->amount }}" class="form-control" placeholder="amount"
                style="text-transform: capitalize">
            </div>
            <br>

            <!--Detail -->
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-asterisk"></i></span>
                    <textarea class="form-control" style="height:50px" name="detail" placeholder="Detail such as price per person , reason to change title, any direction to venue">{{ $game->detail }}</textarea>
            </div>
            <br>

            <!--Submit and back button-->
            <div class="col-md-12 text-center clearfix" style="padding: 3em;">
                <button type="submit" class="btn btn-success">Submit</button>
                <a class="btn btn-danger" href="{{ route('games.index') }}">Back</a>
                {{-- <a class="btn btn-primary" href=""> Back</a> --}}
            </div>

    </div>
</div>   
</form>
@endsection