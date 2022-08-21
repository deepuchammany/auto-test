@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Create') }}</div>
        <div class="card-body">
          <h3>Todo Details:</h3>
          <form action="todo/store">
            <div class="form-group">
              <label for="desc">Description:</label>
              <input type="text" class="form-control" id="desc">
            </div>
          </form>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-success">Submit</button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection