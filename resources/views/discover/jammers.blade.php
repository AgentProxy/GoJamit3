@extends('layouts.app')


@section('content')
@forelse($follow_users as $user)
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default" >
            <div class="panel-heading">
              
            </div>
            <div class="panel-body">
                <div>
                      {{ $user->username }}
                </div>
              <div class="text-center col-md-5">    
                <h2> Genres Listened To </h2>
                <ul>
                @forelse($user->genres as $genre)
                    <li> {{$genre->genre}} </li>
                @empty
                    none
                @endforelse
                </ul>

                <h2> Instruments Played </h2>
                <ul>
                    @forelse($user->instruments as $instrument)
                    <li> {{$instrument->instrument}} </li>
                    @empty
                    None
                    @endforelse
                </ul>
            </div>
            </div>
            <div class="panel-footer clearfix" style="background-color: #fff;">
                <a href="#"> Follow </a>
            </div>
        </div>
    </div>


@empty
    Nothing to see here, bitch.
@endforelse

@endsection