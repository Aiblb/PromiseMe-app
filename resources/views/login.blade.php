<x-layout>

    <div class="col-12">

        <div class="mb-5">
            <h2 class="text-center">Log in<br>
                <small class="text-muted">and stay connected!</small>
            </h2>
        </div>

        <form actions="{{ url('/login') }}" method="POST" class="row g-3 needs-validation" novalidate>
            @csrf

            <x-input type="text" label="Username" name="username" :required="true" />
            <x-input type="password" label="Password" name="password" :required="true" />

            <div class="col-12 text-end">
                <button class="btn btn-outline-primary mt-4" id="btnColor" type="submit" class="col-12 col-md-6">Log In</button>
            </div>
        </form>
    </div>

</x-layout>
