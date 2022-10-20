<x-layout>
    <div class="col-md-12">
        @foreach ($promises as $promise)

        <div class="row justify-content-center">
            <div class="col-md-6 mb-5">
                <div class="card" id="">
                    <div class="card-header">
                        {{$promise->user->firstname}}
                    </div>
                    <div class="card-body">
                        <img src="{{url('img/BookExample.jpg')}}" class="card-img-top mb-3" alt="...">
                      <h5 class="card-title">{{$promise->title}}</h5>
                      <small class="text-muted">{{$promise->created_at->diffForHumans()}}</small>
                    <p class="card-text">{{$promise->description}}</p>
                    </div>
                  </div>
            </div>
        </div>

    @endforeach
    <!--solo prpomise blade y colors y cards-->
    </div>
</x-layout>

