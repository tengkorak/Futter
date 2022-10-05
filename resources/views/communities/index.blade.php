@extends('layouts.app')
 
@section('content')
<style>
  .uper {
    margin-top: 40px;
  }

  #createButton{
    line-height: 12px;
     width: 18px;
     font-size: 8pt;
     font-family: tahoma;
     margin-top: 1px;
     margin-right: 2px;
     position:absolute;
     top:0;
     right:0;
  }
  
</style>


<!--Card your community-->
<div class="px-4">
  <div class="card text-white bg-info mb-3" style="">
    <div class="card-header">
      Your Community 
      <div class="float-right">
      <a href="/communities/create" class="btn btn-outline-light ml-20" role="button" aria-pressed="true" id="createButton">Create Community</a>
      </div>
      
    </div>
    <div class="card-body">
      <h5 class="card-title">Create Your Own Community</h5>
      <p class="card-text">create a community to form a futsal team to play together.</p>
    </div>
    </div></div>

<br>

<!--Table for all community-->
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif

  <table class="table table-striped">
    <thead>
        <tr>
          <td>Community ID</td>
          <td>Community Name</td>
          <td>Description</td>
          <td>Total user</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($communities as $community)
        <tr>
            <td>{{$community->id}}</td>
            <td>{{$community->community_name}}</td>
            <td>{{$community->description}}</td>
            <td>{{$community->total_users}}</td>
            <!--condition check klau dah join takleh join-->
            @if(auth()->user()->id != $community->user_id)
            <td><a href="/communities/join/{{$community->id}}" class="btn btn-success">Join</a></td>
            @endif
            <!--condition check siapa dlm join-->
            @foreach($community->users as $user) 
            @if(auth()->user()->id == $user->id)
            <td><a href="{{ route('communities.show', $community->id)}}" class="btn btn-warning">View</a></td>
            @endif
            @endforeach
            <td>
                <!--condition ambik sama dgn join, creator jer boleh delete-->
                @if(auth()->user()->id == $community->user_id)
                <form action="{{ route('communities.destroy', $community->id)}}" method="post">
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

