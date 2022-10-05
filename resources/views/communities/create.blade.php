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

<div class="container">
    <div class="page-header">
        <h1>Create Community</h1>
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

<form action="/communities" class="container" method="POST">
    {{csrf_field() }}

<!--Start table , row-->
<div class="row">
    <div class="col-md-7">
            <!--Community Name-->
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-info fa-fw"></i></span>
                <input type="text" name="community_name" value="{{ old('community_name') }}" class="form-control" placeholder="Community Name"
                style="text-transform: capitalize">
            </div>
            <br>

            <!--Description-->
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-asterisk"></i></span>
                    <textarea class="form-control" style="height:100px" name="description" placeholder="Detail such as state , districe, address"></textarea>
            </div>
            <br>

            <!--Submit and back button-->
            <div class="col-md-12 text-center clearfix" style="padding: 3em;">
                <button type="submit" class="btn btn-success">Submit</button>
                <a class="btn btn-danger" href="{{ route('communities.index') }}">Back</a>
                {{-- <a class="btn btn-primary" href=""> Back</a> --}}
            </div>

    </div>
</div>   
</form>

@endsection