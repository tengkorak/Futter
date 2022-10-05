<div class="row row-cols-1 row-cols-md-3">
    @foreach($users as $user)
        <div class="col-2 mb-4" >
          <div class="card">
            {{-- <img src="..." class="card-img-top" alt="..."> --}}
            <div class="card-body">
              <h5 class="card-title">{{$user->name}}</h5>
            </div>
          </div>
        </div>
    @endforeach
</div>