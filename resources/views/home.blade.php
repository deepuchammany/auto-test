@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <a href="todo/create" class="btn btn-primary">Create new todo</a>
                </div>
                @if(count($todos)>=1)
                <div class="card-body">
                    Todo List:
                    <table class="table table-striped">
                        <tr>
                            <th>No.</th>
                            <th>Description</th>
                            <th>Completed</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th></th>
                        </tr>
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
                            <th><button class="btn btn-danger" onclick="delete_todo('{{ $todo->id }}')">Delete</button></th>
                        </tr>
                        @endforeach
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
            location.href="/todo/delete/"+id;
        }
    }
</script>
@endsection