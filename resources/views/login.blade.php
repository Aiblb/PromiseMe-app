<x-layout>

    <form actions="{{url('/login')}}" method="POST" class="row needs-validation" novalidate>
        @csrf
        <div class="col-12">
            <label for="validationCustom01" class="form-label">First name</label>
            <input type="text" class="form-control" id="validationCustom01" value="{{ old('name') }}" required>

            @error('name')
                <div class="invalid-feedback mb-3">
                    {{ $message }}
                </div>
            @enderror


        <div class="col-12">
            <button class="btn btn-primary" type="submit">Submit form</button>
        </div>
    </form>


</x-layout>
