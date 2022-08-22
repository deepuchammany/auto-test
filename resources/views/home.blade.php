@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert" id="status_msg">
                        {{ session('status') }}
                    </div>
                    @endif

                    <a href="todo/create" class="btn btn-primary">Create new todo</a>
                </div>
                @if(count($todos)>=1)
                <div class="card-body">
                    Todo List:
                    <table class="table table-striped table-class" id="todo_list">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Description</th>
                                <th>Completed</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=0;
                            @endphp
                            @foreach($todos as $todo)
                            <tr>
                                <td>{{ ++$i }}</th>
                                <th>{{ $todo->description }}</th>
                                @if($todo->completed==0)
                                <th>No</th>
                                @endif
                                @if($todo->completed==1)
                                <th>Yes</th>
                                @endif
                                <th>{{ $todo->created_at }}</th>
                                <th>{{ $todo->updated_at }}</th>
                                <th>
                                    @if($todo->completed==0)
                                    <button class="btn btn-success" onclick="complete_todo('{{ $todo->id }}')">Complete</button>
                                    @endif
                                </th>
                                <th><a class="btn btn-info" href="/todo/{{ $todo->id }}">View JSON</a></th>
                                <th><button class="btn btn-danger" onclick="delete_todo('{{ $todo->id }}')">Delete</button></th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<script>
    function delete_todo(id) {
        if (confirm('Do you really want to delete this todo?') == true) {
            location.href = "/todo/delete/" + id;
        }
    }

    function complete_todo(id) {
        if (confirm('Do you really want to complete this todo?') == true) {
            location.href = "/todo/complete/" + id;
        }
    }
</script>
<script>
    $("#todo_list").fancyTable({
        pagination: true,
        paginationClass: "btn btn-light",
        paginationClassActive: "active",
        pagClosest: 3,
        perPage: 5,
        searchable: false,
        globalSearch: false,
    });

    setTimeout(hideMsg, 10000);

    function hideMsg() {
        $('#status_msg').hide();
    }
</script>
@endsection