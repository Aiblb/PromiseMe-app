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

            <label for="">Choose the privacy option for your new promise</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="public" id="flexRadio1" value="true">
                <label class="form-check-label" for="flexRadio1">Everyone can see this promise</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="public" id="flexRadio2" checked value="false">
                <label class="form-check-label" for="flexRadio2">Let´s keep it private for now</label>
              </div>

            <div class="col-12 text-end">
                <button class="btn btn-outline-primary mt-4" id="btnColor" type="submit">Create new promise</button>
            </div>
        </form>
    </div>

    <x-flashmessage/>

</x-layout>


