@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Create') }}</div>
        <div class="card-body">
          <h3>Todo Details:</h3>
          <form id="desc_form" method="POST" action="/todo/store">
            <div class="form-group">
              <label for="description">Description:</label>
              <input type="text" name="description" class="form-control" id="description">
            </div>
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <br>
            {!! csrf_field() !!}
            <div class="row">
            <span id="msg" style="color:red;"></span>
            </div>
          </form>
        </div>
        <div class="card-footer">
          <button type="button" onclick="checkInput()" class="btn btn-success">Submit</button>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  function checkInput(){
    let desc=$('#description').val();
    if(desc==''){
      $('#msg').html('Please enter the description');
    }
    else{
      $('#desc_form').submit();
    }
  }
</script>
@endsection