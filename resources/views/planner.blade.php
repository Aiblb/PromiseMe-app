<x-layout>

    <div class="col-12 mt-5">
        <div class="mb-5">
            <h2 class="text-center">Check your planner<br>
                <small class="text-muted">and stay tunned!</small>
            </h2>
        </div>
        <div id="planner">

        </div>


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
                    <th scope="col">Promise</th>
                    <th scope="col">Description</th>
                    <th scope="col">Progress</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($promises as $promise)
                    <tr>
                        <td scope="row">{{ $promise->title }}</td>
                        <td>{{ $promise->description }}</td>
                        <td>
                            @if ($promise->completedPercentage == 100)
                                <div class="tasksCompleated">

                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-clipboard2-check" viewBox="0 0 16 16">
                                    <path
                                    d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5h3Z" />
                                    <path
                                    d="M3 2.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 0 0-1h-.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1H12a.5.5 0 0 0 0 1h.5a.5.5 0 0 1 .5.5v12a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-12Z" />
                                    <path
                                    d="M10.854 7.854a.5.5 0 0 0-.708-.708L7.5 9.793 6.354 8.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3Z" />
                                </svg>
                                Tasks completed
                            </div>
                            @elseif ($promise->completedPercentage != -1)
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" aria-label="Success example"
                                        style="width: {{ $promise->completedPercentage }}%"
                                        aria-valuenow="{{ $promise->completedPercentage }}" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            @else
                            <div class="tasksNotAdded">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                                </svg>
                                No tasks added
                            </div>
                            @endif

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <br><br>
    <hr><br><br>

    <div class="text-center mb-5">
        <h2>To do list</h2><br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Task</th>
                    <th scope="col">Description</th>
                    <th scope="col">Deadline</th>
                    <th scope="col">Completed</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($tasks->sortBy('status') as $task)
                    <tr>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td>{{ $task->deadline }}</td>
                        <td>
                            <div class="form-check form-checkBox">
                                <input class="form-check-input"
                                    onclick="location.href='{{ url("/taskStatus/$task->id") }}'" type="checkbox"
                                    value="" id="CBTask{{ $task->id }}"
                                    @if ($task->status) checked @endif>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
