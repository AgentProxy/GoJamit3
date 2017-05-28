@extends('layouts.app')

@section('head')
<link href="{{ asset('css/settings.css') }}" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
@endsection



@section('content')
<div class="text-center" style="padding:50px 0">
	<div class="logo">Edit Profile Info</div>
	<!-- Main Form -->@extends('layouts.app')

@section('head')
<link href="{{ asset('css/logreg.css') }}" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
@endsection



@section('content')
<div class="container">
    <div class="row">    
        <div class="logo"><img src="/img-uploads/Drums.svg" /></div>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
	            <div class="panel-heading">Settings</div>
                <div class="panel-body">
					<form id="login-form" class="form-horizontal" action="/user/settings/{{ $user->id }}" method="POST">
						{{ csrf_field() }}
			            {{ method_field('PUT') }}
						<input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
		                 @if($errors->any())
		                <div class="row collapse">
		                    <ul class="alert-box warning radius">
		                        @foreach($errors->all() as $error)
		                            <li> {{ $error }} </li>
		                        @endforeach
		                    </ul>
		                </div>
		                @endif

		                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
		                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>
		                    <div class="col-md-6">
		                        <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required>

		                        @if ($errors->has('email'))
		                            <span class="help-block">
		                                <strong>{{ $errors->first('email') }}</strong>
		                            </span>
		                        @endif
		                    </div>
		                </div>


		                 <div class="form-group{{ $errors->has('fname') ? ' has-error' : '' }}">
		                    <label for="fname" class="col-md-4 control-label">First Name</label>
		                    <div class="col-md-6">
		                        <input id="fname" type="text" class="form-control" name="fname" value="{{ $user->fname }}" required>

		                        @if ($errors->has('fname'))
		                            <span class="help-block">
		                                <strong>{{ $errors->first('fname') }}</strong>
		                            </span>
		                        @endif
		                    </div>
		                </div>

		                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
		                    <label for="lname" class="col-md-4 control-label">Last Name</label>
		                    <div class="col-md-6">
		                        <input id="lname" type="text" class="form-control" name="lname" value="{{ $user->lname }}" required>

		                        @if ($errors->has('lname'))
		                            <span class="help-block">
		                                <strong>{{ $errors->first('lname') }}</strong>
		                            </span>
		                        @endif
		                    </div>
		                </div>

		                <div class="form-group{{ $errors->has('sex') ? ' has-error' : '' }}">
		                    <label for="sex" class="col-md-4 control-label">Sex</label>
		                    <div class="col-md-6">
		                        <label for="male" class="radio-inline">
		                        	@if ($user->sex == "M")
		                        	<input id="male" type="radio" name="sex" value="M" checked="" />Male
		                        	@else
		                        	<input id="male" type="radio" name="sex" value="M" />Male
		                        	@endif
		                        </label>
		                        <label for="female" class="radio-inline">
		                        	@if ($user->sex == "F")
		                        	<input id="female" type="radio" name="sex" value="F" checked="" />Female
		                        	@else
		                        	<input id="female" type="radio" name="sex" value="F" />Female
		                        	@endif
		                        </label>
		                        @if ($errors->has('sex'))
		                            <span class="help-block">
		                                <strong>{{ $errors->first('sex') }}</strong>
		                            </span>
		                        @endif
		                    </div>
		                </div>

		                 <div class="form-group{{ $errors->has('birthdate') ? ' has-error' : '' }}">
		                    <label for="birthdate" class="col-md-4 control-label">Birthdate</label>

		                    <div class="col-md-6">
		                        <input id="birthdate" type="date" class="form-control" name="birthdate" value="{{ $user->birthdate }}" required>

		                        @if ($errors->has('birthdate'))
		                            <span class="help-block">
		                                <strong>{{ $errors->first('birthdate') }}</strong>
		                            </span>
		                        @endif
		                    </div>
		                </div>

		                 <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
		                    <label for="username" class="col-md-4 control-label">User Name</label>

		                    <div class="col-md-6">
		                        <input id="username" type="text" class="form-control" name="username" value="{{ $user->username }}" required>

		                        @if ($errors->has('username'))
		                            <span class="help-block">
		                                <strong>{{ $errors->first('username') }}</strong>
		                            </span>
		                        @endif
		                    </div>
		                </div>


		                <!-- FIRST END -->
		                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
		                    <label for="password" class="col-md-4 control-label">Password</label>

		                    <div class="col-md-6">
		                        <input id="password" type="password" class="form-control" name="password" required>

		                        @if ($errors->has('password'))
		                            <span class="help-block">
		                                <strong>{{ $errors->first('password') }}</strong>
		                            </span>
		                        @endif
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

		                    <div class="col-md-6">
		                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label class="col-md-4 control-label">Genres Listened </label>

		                    <div class="col-md-2 checkbox">
		                       <label for="jazz"><input name="genres[]" id="jazz" type="checkbox" value="1">Jazz</label>

		                        <label for="rock"><input name="genres[]" id="rock" type="checkbox" value="2">Rock</label>

		                        <label for="blues"><input name="genres[]" id="blues" type="checkbox" value="3">Blues</label>
		                    </div>
		                    <div class="col-md-2 checkbox">

		                        <label for="folk"><input name="genres[]" id="folk" type="checkbox" value="4">Folk</label>

		                        <label for="hiphop"><input name="genres[]" id="hiphop" type="checkbox" value="5">Hip Hop</label>
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label class="col-md-4 control-label">Instruments Played</label>

		                    <div class="col-md-2 checkbox">
		                       <label for="guitar"><input name="instruments[]" id="guitar" type="checkbox" value="1">Guitar</label>

		                        <label for="piano"><input name="instruments[]" id="piano" type="checkbox" value="2">Piano</label>

		                        <label for="Ukulele"><input name="instruments[]" id="ukulele" type="checkbox" value="3">Ukulele</label>
		                    </div>    
		                    <div class="col-md-2 checkbox">

		                        <label for="Violin"><input name="instruments[]" id="violin" type="checkbox" value="4">Violin</label>

		                        <label for="saxophone"><input name="instruments[]" id="saxophone" type="checkbox" value="5">Saxophone</label>
		                    </div>
		                </div>



		                <div class="form-group">
		                    <div class="text-center">
		                        <button type="submit" class="btn btn-primary">
		                            Submit
		                        </button>
		                    </div>
		                </div>
			        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
	<div class="login-form-1">
		<form id="login-form" class="text-left" action="/user/settings/{{ $user->id }}" method="post">
			{{ csrf_field() }}
			{{ method_field('PUT') }}
			<div class="login-form-main-message"></div>
			<div class="main-login-form">
				<div class="login-group">
					<input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
					<div class="form-group">
						<label for="lg_username" class="sr-only">First name</label>
						<input type="text" class="form-control" name="fname" value="{{ $user->fname }}" />
					</div>
					<div class="form-group">
						<label for="lg_username" class="sr-only">Last name</label>
						<input type="text" class="form-control" name="lname" value="{{ $user->lname }}" />
					</div>
					<div class="form-group">
						<label for="lg_username" class="sr-only">Username</label>
						<input type="text" class="form-control" name="username" value="{{ $user->username }}" />
					</div>
					<div class="form-group">
						<label for="lg_username" class="sr-only">Email</label>
						<input type="text" class="form-control" name="email" value="{{ $user->email }}" />
					</div>
					<div class="form-group">
						<label for="lg_username" class="sr-only">Password</label>
						<input type="password" class="form-control" name="password" value="{{ $user->password }}" />
					</div>
					
				</div>
				<button type="submit" class="login-button" value="Save"><i class="fa fa-chevron-right"></i></button>
			</div>
		</form>
	</div>
	<!-- end:Main Form -->
</div>
@endsection