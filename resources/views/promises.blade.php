<x-layout>
    <div class="col-md-12">
        @foreach ($promises as $promise)
            <div class="row justify-content-center">
                <div class="col-md-6 mb-5">
                    <div class="card" id="">
                        <div class="card-header">
                            {{ $promise->user->firstname }}
                        </div>
                        <div class="card-body">
                            @if ($promise->getImageAttribute() != null)
                                <img src="{{ asset($promise->getImageAttribute()) }}" class="card-img-top mb-3" alt="...">
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
</x-layout>
