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
	<form method="post" action="{{ URL::to('/admin/register')}}">
		{{ csrf_field() }}
  		<div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}">
      </div>
  		<div class="form-group">
    		<label for="email">Email</label>
    		<input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
  		</div>

      <div class="form-group">
        <label for="fullname">Full name</label>
        <input type="text" class="form-control" id="fullname" name="fullname" value="{{ old('fullname') }}">
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password">
      </div>
      <div class="form-group">
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
      </div>
  		<button type="submit" class="btn btn-default">Register</button>
	</form>
</div>
@stop