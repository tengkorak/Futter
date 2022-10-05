@extends('layouts.app')

@section('content')

 
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

<div class="container">

<!-- ni display error, pkai alert bootstrap-->
{{-- <div class="container">
@if (session('constraints'))
<div class="alert alert-danger" role="alert"> Constraint: {{session('constraints')}} 
</div> 
</div> --}}

{{-- <div>
<b-alert show variant="danger">Danger Alert</b-alert>
</div>
@endif

<b-alert
:show="dismissCountDown"
dismissible
variant="warning"
@dismissed="dismissCountDown=0"
@dismiss-count-down="countDownChanged"
>
<p>This alert will dismiss after @{{ dismissCountDown }} seconds...</p>
<b-progress
  variant="warning"
  :max="dismissSecs"
  :value="dismissCountDown"
  height="4px"
>
</b-progress>
</b-alert> --}} <!--alert countdown klau rajin aq buat lah hanat -->

</div>


<form action="/attributes" method="POST" class="container" id="attr">
  {{ csrf_field() }}
  <div id="app"> <!-- panggil app.js-->
    <div class="container">

      <!--Error display-->
      @if (session('constraints'))
      <div class="alert-danger" role="alert">
        {{ session('constraints') }}
        @endif

        <h1 class="text-left font-weight-bold">Create attribute</h1>

      {{-- <slider></slider> <!-- panggil nama component --> --}}

    
      <div id="" class="flex justify-center mt-10">
        <form action="/attributes" method="POST" class="attri">
         @csrf
          <h2 class="text-black">Total Atrribute : @{{ totatt }}</h2>
          <div>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Attribute</th>
                  <th scope="col">Value</th>
                  <th scope="col">Increament</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">Pass</th>
                  <td>@{{ pass }}</td>
                  <td>
                    <span @click="increment('pass')" class="btn btn-primary">+</span>
                    <span @click="decrement('pass')" class="btn btn-danger">-</span>
                    <input type="hidden" name="pass" v-model="pass">
                  </td>
                </tr>
                <tr>
                  <th scope="row">Defend</th>
                  <td>@{{ defend }}</td>
                  <td>
                    <span @click="increment('defend')" class="btn btn-primary">+</span>
                    <span @click="decrement('defend')" class="btn btn-danger">-</span>
                    <input type="hidden" name="defend" v-model="defend">
                  </td>
                </tr>
                <tr>
                  <th scope="row">Physical</th>
                  <td>@{{ physical }}</td>
                  <td>
                    <span @click="increment('physical')" class="btn btn-primary">+</span>
                    <span @click="decrement('physical')" class="btn btn-danger">-</span>
                    <input type="hidden" name="physical" v-model="physical">
                  </td>
                </tr>
                <tr>
                  <th scope="row">Dribbling</th>
                  <td>@{{ dribbling }}</td>
                  <td>
                    <span @click="increment('dribbling')" class="btn btn-primary">+</span>
                    <span @click="decrement('dribbling')" class="btn btn-danger">-</span>
                    <input type="hidden" name="dribbling" v-model="dribbling">
                  </td>
                </tr>
                <tr>
                  <th scope="row">Pace</th>
                  <td>@{{ pace }}</td>
                  <td>
                    <span @click="increment('pace')" class="btn btn-primary">+</span>
                    <span @click="decrement('pace')" class="btn btn-danger">-</span>
                    <input type="hidden" name="pace" v-model="pace">
                  </td>
                </tr>
                <tr>
                  <th scope="row">Shooting</th>
                  <td>@{{ shooting }}</td>
                  <td>
                    <span @click="increment('shooting')" class="btn btn-primary">+</span>
                    <span @click="decrement('shooting')" class="btn btn-danger">-</span>
                    <input type="hidden" name="shooting" v-model="shooting">
                  </td>
                </tr>
                <tr>
                  <td colspan="3"><button type="submit" class="btn btn-success">submit</button></td>
                </tr>
              </tbody>
            </table>

            {{-- <!--interface lama-->
            <h2 class="text-black mb-2">Pass : @{{ pass }}</h2>
            <span @click="increment('pass')" class="btn btn-primary">+</span>
            <span @click="decrement('pass')" class="btn btn-danger">-</span>
            <input type="hidden" name="pass" v-model="pass">
            
            <h2 class="text-black my-2">Defend : @{{ defend }}</h2>
            <span @click="increment('defend')" class="btn btn-primary">+</span>
            <span @click="decrement('defend')" class="btn btn-danger">-</span>
            <input type="hidden" name="defend" v-model="defend">

            <h2 class="text-black my-2">Physical : @{{ physical }}</h2>
            <span @click="increment('physical')" class="btn btn-primary">+</span>
            <span @click="decrement('physical')" class="btn btn-danger">-</span>
            <input type="hidden" name="physical" v-model="physical">

            <h2 class="text-black my-2">Dribbling : @{{ dribbling }}</h2>
            <span @click="increment('dribbling')" class="btn btn-primary">+</span>
            <span @click="decrement('dribbling')" class="btn btn-danger">-</span>
            <input type="hidden" name="dribbling" v-model="dribbling">

            <h2 class="text-black my-2">Pace : @{{ pace }}</h2>
            <span @click="increment('pace')" class="btn btn-primary">+</span>
            <span @click="decrement('pace')" class="btn btn-danger">-</span>
            <input type="hidden" name="pace" v-model="pace">

            <h2 class="text-black my-2">Shooting : @{{ shooting }}</h2>
            <span @click="increment('shooting')" class="btn btn-primary">+</span>
            <span @click="decrement('shooting')" class="btn btn-danger">-</span>
            <input type="hidden" name="shooting" v-model="shooting">
          
          </div>
          <button type="submit" class="btn btn-success">submit</button>
        </form> --}}
      </div>

      {{-- <div>
        <label for="range-1">Example range with min and max</label>
        <b-form-input id="range-1" v-on:click="deductAtt(pass)" v-model="pass" type="range" min="0" max="5"></b-form-input>
        <input type="text" name="pass" v-model="total" class="form-control" type="text" readonly> pass
        so klo kau nak hantar yg ni, ikot name dia --}}
     {{--  </div> --}}



      <div>
        {{-- <label for="range-1">Example range with min and max</label>
        <b-form-input id="range-1" v-model="pass" v-on:click="deductAtt(pass)" type="range" min="0" max="5"></b-form-input>
        <input type="text" name="pass" v-model="pass" class="form-control" type="text" readonly> pass --}}
        {{-- so klo kau nak hantar yg ni, ikot name dia --}}
      </div>


</form>

@endsection