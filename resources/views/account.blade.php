<x-layout>
    <div class="row justify-content-center mt-md-5 mt-4">
        <div class="col-md-4  text-center">
            <img src="{{ url('img/avatar/' . auth()->user()->avatar . '.png') }}" alt="Avatar" height="242px"
                width="240px" class="rounded-circle">
        </div>
        <div class="col-md-4 text-center mt-4">
            <h1 class="">{{ auth()->user()->username }}</h1> <br>
            <p class="">{{ auth()->user()->firstname . ' ' . auth()->user()->lastname }} <br>
                Join date: {{ auth()->user()->created_at->diffForHumans() }} <br>
                Promises count: {{ $count }}</p>
        </div>
    </div>
    <br><hr><br>

    <div class="row">

        @foreach ($account as $promise)
            <div class="col-md-4 mb-5">
                <div class="card">
                    <div class="card-header">
                        {{ auth()->user()->firstname . ' ' . auth()->user()->lastname }}
                    </div>

                    <div class="card-body">
                        @if ($promise->getImageAttribute() != null)
                            <img src="{{ asset($promise->getImageAttribute()) }}" class="card-img-top mb-3"
                                alt="Promise image">
                            <hr>
                        @endif
                        <h5 class="card-title">{{ $promise->title }}</h5>
                        <small class="text-muted">{{ $promise->created_at->diffForHumans() }}</small>
                        <p class="card-text">{{ $promise->description }}</p>
                    </div>
                    <div class="card-footer">
                    @if ($promise->completedPercentage != -1)
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" aria-label="Success example"
                                style="width: {{ $promise->completedPercentage }}%"
                                aria-valuenow="{{ $promise->completedPercentage }}" aria-valuemin="0"
                                aria-valuemax="100"></div>
                        </div>
                    @else
                    <div class="tasksNotAdded">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                        </svg>
                        No tasks added
                    </div>
                    @endif
                        </div>

                </div>
            </div>
        @endforeach
    </div>
    </div>
    </div>
</x-layout>
