@extends('layouts.app')

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



		                <div class="col-md-2 col-md-offset-2">
		                	<h1>Genres</h1>
		                	@forelse($genres as $genre)
		                		<?php $c=0 ?>
		                		@forelse($user_genres as $user_genre)
		                			@if($genre->id===$user_genre->genre_id)
		                				<div class="checkbox">
		                				  <label><input type="checkbox" id="genres[{{$genre->id}}]" name="genres[{{$genre->id}}]" value="{{$genre->id}}" checked>{{ $genre->genre }}</label>
		                				</div>
		                				<?php $c=1 ?>
		                			@endif
		                		@empty
		                			No user_genre
		                		@endforelse
		                		@if($c==0)
		                			<div class="checkbox">
		                			  <label><input type="checkbox" id="genres[{{$genre->id}}]" name="genres[{{$genre->id}}]" value="{{$genre->id}}">{{ $genre->genre }}</label>
		                			</div>
		                		@elseif($c==1)
		                			@continue
		                		@endif
		                		

		                	@empty
		                		No genre
		                	@endforelse
		                </div>

		                <div class="col-md-2 col-md-offset-2">
		                	<h1>Instruments</h1>
		                	@forelse($instruments as $instrument)
		                		<?php $c=0 ?>
		                		@forelse($user_instruments as $user_instrument)
		                			@if($instrument->id===$user_instrument->instrument_id)
		                				<div class="checkbox">
		                				  <label><input type="checkbox" id="instruments[{{$instrument->id}}]" name="instruments[{{$instrument->id}}]" value="{{$instrument->id}}" checked>{{ $instrument->instrument }}</label>
		                				</div>
		                				<?php $c=1 ?>
		                			@endif
		                		@empty
		                			No user_instruments
		                		@endforelse
		                		@if($c==0)
		                			<div class="checkbox">
		                			  <label><input type="checkbox" id="instruments[{{$instrument->id}}]" name="instruments[{{$instrument->id}}]" value="{{$instrument->id}}">{{ $instrument->instrument }}</label>
		                			</div>
		                		@elseif($c==1)
		                			@continue
		                		@endif
		                		
		                		

		                	@empty
		                		No intstruments
		                	@endforelse
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