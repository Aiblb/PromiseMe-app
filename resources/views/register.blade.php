<x-layout>

    <div class="col-12">
        <div class="mb-5">
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

            <div class="col-12 text-end">
                <button class="btn btn-outline-primary mt-4" type="submit">Create account</button>
            </div>
        </form>
    </div>
    
    <x-flashmessage/>

</x-layout>
