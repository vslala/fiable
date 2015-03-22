<?php
$panelHeading = "Photographer's Profile";
?>
@extends('master')

@section('content')
<div class="pull-right">
    @if($flag)
            <a href="{{ route("signIn") }}" class="btn btn-danger">Login
            <span class="glyphicon glyphicon-log-in"></span>
            </a>
            <br>
            <a href="{{ route("signUp") }}" class="btn btn-primary">Sign Up</a>
     @else
            <a href="{{ route("signOut") }}" class="btn btn-danger">Logout
            <span class="glyphicon glyphicon-log-out"></span>
            </a>
            <br>
            <a href="{{ route("userHome") }}">Go to Home</a>
    @endif
        </div>
@include('_panel-heading')

<div class="row">
    <div class="col-md-12">

    @if($users !== null)
    @foreach($users as $user)

            <div class="form-group  col-sm-3">
                <div class="image">
                    {!! Html::image($user->url, $user->name, ['class'=>'img img-thumbnail']) !!}
                </div>
            </div>

            <div class="form-group col-sm-9">
                            <div class="user-info">
                                <label>{{ $user->firstName }} {{ $user->lastName }}</label>
                                <p><i>{{ $user->about }}</i></p>
                                <br>
                                <label>Experience</label>
                                <p>{{ $user->experience }}</p>
                                <br>
                                <label>Mobile Number</label>
                                <p>{{ $user->mobile }}</p>
                                <br>
                                <label>Email Address</label>
                                <p>{{ $user->email }}</p>
                                <br>
                                <a href="{{ route("getUserProfile", [
                                    'userID'=>$user->id
                                ]) }}" class="btn btn-success btn-lg">View Profile</a>
                            </div>
            </div>

        <hr>
    @endforeach
    @endif
    </div>
</div>


@endsection