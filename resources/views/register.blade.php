<x-layout>

    <div class="col-12">
        <form actions="{{ url('/register') }}" method="POST" class="row g-3 needs-validation" novalidate>
            @csrf
            <x-input type="name" label="First name" name="firstname" :required="true" />

            <div class="col-12 text-end">
                <button class="btn btn-primary" type="submit">Create account</button>
            </div>
        </form>
    </div>


</x-layout>
