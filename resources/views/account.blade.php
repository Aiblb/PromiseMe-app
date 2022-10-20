<x-layout>
    <div class="row justify-content-center">
        <div class="col-md-4 col-sm-5 text-center">
            <img src="{{url('img/ProfilePic.jpg')}}" alt="Cinque Terre" height="242px" width="240px" class="rounded-circle">
        </div>
        <div class="col-md-6 aling-content-center">
            <h1 class="">{{auth()->user()->username}}</h1>
            <p class="">{{auth()->user()->firstname." ".auth()->user()->lastname}}</p>
            <p>Join date: {{auth()->user()->created_at->diffForHumans()}}</p>
            <p>Promises count: {{$count}}</p>
        </div>
    </div>
    <div class="row justify-content-center">
        <div>
            <p>{{$account}}</p>
        </div>
    </div>
</x-layout>
