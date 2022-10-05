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
          <td>Match ID</td>
          <td>Match Title</td>
          <td>Location</td>
          <td>Amount</td>
          <td>Date & Time</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($games as $game)
        <tr>
            <td>{{$game->id}}</td>
            <td>{{$game->match_title}}</td>
            @foreach($courts as $court)
            <td>{{$court->name}}</td>
            @endforeach
            <td>{{$game->amount}}</td>
            <td>{{$game->date_time}}</td>

        <td><a href="/games/join/{{$game->id}}" class="btn btn-success">Join</a></td>

            <td>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  @if (session('different'))
  <div class="alert-danger" role="alert">
    {{ session('different') }}
    @endif
  @if (session('penuh'))
<div class="alert-danger" role="alert">
  {{ session('penuh') }}
</div>
  @endif
<div>
@endsection

