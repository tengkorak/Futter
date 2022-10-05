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
          <td>Total players</td>
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
            <td>{{$game->total_players}}</td>

           <!--condition check siapa dlm join-->
           @foreach($game->users as $user) 
           @if(auth()->user()->id == $user->id)
           <td><a href="{{ route('games.show', $game->id)}}" class="btn btn-warning">View</a></td>
           @endif
           @endforeach
           
           <!--condition-->
           <td>
           @if(auth()->user()->id == $game->user_id)
           <form action="{{ route('games.destroy', $game->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            @endif
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection

