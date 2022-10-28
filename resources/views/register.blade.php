<x-layout>

    <div class="col-12">
        <div class="mb-5 mt-5">
            <h2 class="text-center">Register<br>
                <small class="text-muted">and join our family!</small>
            </h2>
        </div>

        <form actions="{{ url('/register') }}" method="POST" class="row g-3 needs-validation" novalidate>
            @csrf

            <x-input type="name" label="First name" name="firstname" :required="true" />
            <x-input type="name" label="Last name" name="lastname" :required="true" />
            <x-input type="name" label="Username" name="username" :required="true" />
            <x-input type="email" label="Email" name="email" :required="true" />
            <x-input type="password" label="Password" name="password" :required="true" />

            <h5 class="mt-5">Select your avatar!</h5>
            <div class="row justify-content-center mt-2">
                @for ($i = 1; $i <= 6; $i++)
                    <div class="col-md-4 mt-3">
                        <div class="form-check">
                            <div class="input-group-text justify-content-center">
                                <input class="form-check-input me-4" type="radio" name="avatar" id="avatar{{ $i }}" value="{{$i}}" checked>
                                <img src="{{ url("img/avatar/$i.png") }}" class="rounded-circle" alt="Avatar" onclick="selectRadio('avatar{{ $i }}')">
                            </div>
                        </div>
                    </div>
                @endfor
            </div>

            <script>
                function selectRadio(id){
                    document.getElementById(id).checked = true;
                }
            </script>

            <div class="col-12 text-end">
                <button class="btn btn-outline-primary mt-4" id="btnColor" type="submit">Create account</button>
            </div>
        </form>
    </div>

    <x-flashmessage />

</x-layout>
