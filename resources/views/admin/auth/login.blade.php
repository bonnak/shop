@extends('layouts.app')

@section('content')

<div class="container">
  @if (count($errors) > 0)
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
	<form method="post" action="{{ URL::to('/admin/login')}}">
		  {!! csrf_field() !!}
  		<div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password">
      </div>
  		<button type="submit" class="btn btn-default">Login</button>
	</form>
</div>
@stop