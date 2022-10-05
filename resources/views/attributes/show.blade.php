@extends('layouts.app')
        
@section('content')

<!--Attributes-->
<table class="table table-hover table-dark">
    <thead>
      <tr>
        <th scope="col">Pass</th>
        <th scope="col">Defend</th>
        <th scope="col">Physical</th>
        <th scope="col">Dribbling</th>
        <th scope="col">Pace</th>
        <th scope="col">Shooting</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">{{$attribute->pass}}</th>
        <td>{{$attribute->defend}}</td>
        <td>{{$attribute->physical}}</td>
        <td>{{$attribute->dribbling}}</td>
        <td>{{$attribute->pace}}</td>
        <td>{{$attribute->shooting}}</td>
      </tr>

    </tbody>
  </table>

<!--Rating-->
<table class="table table-hover table-dark">
    <thead>
      <tr>
        <th scope="col">Defender Rating</th>
        <th scope="col">Right Wing Rating</th>
        <th scope="col">Left Wing Rating</th>
        <th scope="col">Striker Rating</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">{{$rating->defender}}</th>
        <td>{{$rating->right_wing}}</td>
        <td>{{$rating->left_wing}}</td>
        <td>{{$rating->striker}}</td>
      </tr>
    </tbody>
  </table>

  @endsection