@extends('layouts.app')
 
@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>Court ID</td>
          <td>Court Name</td>
          <td>Address</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($courts as $court)
        <tr>
            <td>{{$court->id}}</td>
            <td>{{$court->name}}</td>
            <td>{{$court->address_address}}</td>
        <td> <a href="{{route('courts.show',$court)}}" ><div class="btn btn-primary">View</div></a>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection

