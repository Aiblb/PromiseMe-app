<x-layout>
    <div>
        @foreach ($promises as $promise)
        <p>{{$promise}}</p>
    @endforeach
    </div>
</x-layout>
