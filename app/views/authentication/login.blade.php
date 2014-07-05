@extends('main')

@section('content')

<div class="well">
  <form class="form-horizontal" role="form" method="POST" action="/login">
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <h2>Login</h2>

        @foreach ($errors->all() as $error)
        <div class="alert alert-warning alert-dismissible" role="alert">
          {{ $error }}
          <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        </div>
        @endforeach

      </div>
    </div>
    <div class="form-group">
      <label for="username" class="col-sm-2 control-label">Username</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
      </div>
    </div>
    <div class="form-group">
      <label for="password" class="col-sm-2 control-label">Password</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <label>
            <input type="checkbox" name="remember"> Remember me
          </label>
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Sign in</button>
      </div>
    </div>
  </form>
</div>
@stop