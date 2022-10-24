<x-layout>

    <div class="col-12">
        <div class="mb-5">
            <h2 class="text-center">Check your planner<br>
                <small class="text-muted">and stay tunned!</small>
            </h2>
        </div>
        <div id="planner"></div>


        <!-- Button trigger modal -->
        <div class="text-end">

            <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#event"
                id="btnPromise">
                Add task
            </button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="event" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add a task to your planner</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form action="{{ url('/planner') }}" method="POST" novalidate>
                            @csrf

                            <x-input type="text" label="Task name" name="title" :required="true" />
                            <x-input type="text" label="Description" name="description" :required="true" />
                            <x-input type="date" label="Deadline" name="deadline" :required="true" />

                            <div class="form-group mt-3">
                                <label for="">Select your promise</label>
                                <select class="form-select" name="promise_id" aria-label="Default select example">
                                    @foreach ($promises as $promise)
                                        <option value="{{$promise->id}}">{{ $promise->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" >Add now</button>
                            </div>
                        </form>


                    </div>



                </div>
            </div>
        </div>
    </div>

    <x-flashmessage/>
    <br>
    <hr><br>
    <p class="text-center">Promise list</p>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Promise</th>
                <th scope="col">Check</th>
                <th scope="col">Deadline</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td colspan="2">Larry the Bird</td>
                <td>@twitter</td>
            </tr>
        </tbody>
    </table>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
        id="btnPromise">
        Add task
    </button>


    <br>
    <hr><br>
    <p class="text-center col-md-6 aling-content-left">To do list</p>
    <p>{{$tasks}}</p>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Promise</th>
                <th scope="col">Check</th>
                <th scope="col">Deadline</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td colspan="2">Make Larry real</td>
                <td>tomorrow</td>
            </tr>
        </tbody>
    </table>

</x-layout>
