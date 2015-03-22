<?php $setContactActive = "active" ?>

@extends('master')

@section('content')

<div class="row">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="h3">Contact Us</div>
        </div>

            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"><label class="label label-default">Home</label> </a> </li>
                <li class="active"><a href="{{ route('contact') }}"><label class="label label-primary">Contact</label></a> </li>
            </ol>

        <div class="panel-body">
            <div class="jumbotron" id="jumbotron">
                    {!! Form::open(['route'=>['store'], 'method'=>'put', 'class'=>'form-horizontal', 'id'=>'contactForm']) !!}
                        <div class="form-group" >
                            <label class="col-sm-2">Name: </label>
                            <div class="col-sm-5">
                                {!! Form::text('firstName', null, ['class'=>'form-control', 'placeholder'=>'First Name']) !!}
                                <span class="help-block"></span>
                            </div>
                            <div class="col-sm-5">
                                {!! Form::text('lastName', null, ['class'=>'form-control', 'placeholder'=>'Surname']) !!}
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2">Email: </label>
                            <div class="col-sm-10">
                                {!! Form::text('email', null, ['class'=>'form-control', 'placeholder'=>'youremail@xyz.com']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2">Subject: </label>
                            <div class="col-sm-10">
                                {!! Form::text('subject', null, ['class'=>'form-control', 'placeholder'=>'Reason for contact']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2">Message: </label>
                            <div class="col-sm-10">
                                {!! Form::textarea('message', null, ['class'=>'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-10">
                                {!! Form::submit('Send', ['class'=>'btn btn-success btn-lg']) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}

        </div>

        </div>
    </div>
</div>

@endsection