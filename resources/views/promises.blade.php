<x-layout>
    <div class="row">
        @foreach ($promises as $promise)
       
        <div class="col-md-8">
              <div id="post" class="" style="border-radious: 50px, background-color: black" >

                <h2 class="h2">{{$promise->user->firstname}}</h2>
                <img src="{{url('img/Red-White-Royal-Blue-by-Casey-McQuiston.jpg')}}" id="imgPost">
                
                <div class="ipromise">
                    <h3 class="m-1">{{$promise->title}}</h3>
                    <p>{{$promise->description}}</p>
                </div>
             
              
        </div>
    @endforeach
    </div>
</x-layout>

