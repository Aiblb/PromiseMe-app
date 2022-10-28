<x-layout>
    <div class="text-center">
        <h1>Welcome to Promise Me!</h1>
        <p><br>
        <p class="mb-5"><br> We believe that in the recent years there has been a certain difficulty in achieving the
            objectives, or
            in this case, promises.
            In these times we don’t give the importance that the promises deserve.
            With our Project we want to give back the importance again to the promises we make to others and to
            ourselves.
            <br><br>
            This project it's just for students from Supérate.<br>
            Enjoy the experience!
        </p>
    </div>

    <div class="row justify-content-center">
        <div class="col-8">


            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ url('img/photoGroup.jpg') }}" class="d-block w-100 " alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ url('img/PromiseMeIcon.png') }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ url('img/LogoExpo.png') }}" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>

</x-layout>
