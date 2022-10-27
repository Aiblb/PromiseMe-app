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
                id="btnColor">
                Add task</button>
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
                                        <option value="{{ $promise->id }}">{{ $promise->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" id="btnColor">Add now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-flashmessage />
    <br>
    <hr><br>

    <div class="text-center">
        <h2>Promise list</h2><br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Promise</th>
                    <th scope="col">Task</th>
                    <th scope="col">Progress</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <th scope="row">{{ $task->id }}</th>
                        <td>{{ $task->promise->description }}</td>
                        <td>{{ $task->title }}</td>

                        <td>
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" aria-label="Success example"
                                    style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <br>
    <hr><br>

    <div class="text-center">
        <h2>To do list</h2><br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Task</th>
                    <th scope="col">Description</th>
                    <th scope="col">Deadline</th>
                    <th scope="col">Completed</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($tasks as $task)
                    <tr>
                        <th scope="row">{{ $task->id }}</th>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td>{{ $task->deadline }}</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
