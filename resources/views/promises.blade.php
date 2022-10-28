<x-layout>
    <div class="col-md-12 mt-5">

        <div class="row justify-content-center">

            <div class="col-md-6">
                @foreach ($promises as $promise)
                    <div class="row justify-content-center">
                        <div class="col-md-12 mb-md-5 mb-4">
                            <div class="card" id="">
                                <div class="card-header">
                                    <img src="{{ url('img/avatar/' . auth()->user()->avatar . '.png') }}" height="30px" width="30px" class="rounded-circle">
                                    {{ auth()->user()->firstname." ". auth()->user()->lastname}}
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
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-3 ms-4">

                <h4>Pending tasks</h4>
                @foreach (Auth::user()->tasks as $task)
                    <div class="card-body mt-3">
                        @if (!$task->status)
                            <h5 class="card-title">{{ $task->title }}</h5>
                            <small class="text-muted">{{ $task->description }}</small>
                            <p class="card-text"><strong>Due date: </strong> {{ $task->deadline }}</p>
                            <hr>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
</x-layout>
