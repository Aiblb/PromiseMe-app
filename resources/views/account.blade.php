<x-layout>
    <div class="row justify-content-center">
        <div class="col-md-4 col-sm-5 text-center">
            <img src="{{ url('img/ProfilePic.jpg') }}" alt="Cinque Terre" height="242px" width="240px"
                class="rounded-circle">
        </div>
        <div class="col-md-6 aling-content-center">
            <h1 class="">{{ auth()->user()->username }}</h1>
            <p class="">{{ auth()->user()->firstname . ' ' . auth()->user()->lastname }}</p>
            <p>Join date: {{ auth()->user()->created_at->diffForHumans() }}</p>
            <p>Promises count: {{ $count }}</p>
        </div>
    </div>
    
    <br>
    <hr><br>
    <div class="row">

        @foreach ($account as $promise)
            <div class="col-md-6 mb-5">
                <div class="card" id="">
                    <div class="card-header">
                        {{ auth()->user()->firstname }}
                    </div>
                    <div class="card-body">
                        @if ($promise->getImageAttribute() != null)
                            <img src="{{ asset($promise->getImageAttribute()) }}" class="card-img-top mb-3"
                                alt="...">
                            <hr>
                        @endif
                        <h5 class="card-title">{{ $promise->title }}</h5>
                        <small class="text-muted">{{ $promise->created_at->diffForHumans() }}</small>
                        <p class="card-text">{{ $promise->description }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    </div>
    </div>
</x-layout>
