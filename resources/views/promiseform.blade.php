<x-layout>

    <div class="col-12">
        <div class="mb-5">
            <h2 class="text-center">Add a promise<br>
                <small class="text-muted">and stay committed!</small>
            </h2>
        </div>

        <form actions="{{ url('/promise') }}" method="POST" class="row g-3 needs-validation" novalidate>
            @csrf
            <x-input type="text" label="Title" name="title" :required="true" />
            <x-input type="text" label="Description" name="description" :required="true" />

            <div class="form-check">
                <x-input type="radio" label="Description" name="description" :required="true" />
            </div>

            <div class="col-12 text-end">
                <button class="btn btn-outline-primary mt-4" id="btnColor" type="submit">Create new promise</button>
            </div>
        </form>
    </div>
    
    <x-flashmessage/>

</x-layout>

