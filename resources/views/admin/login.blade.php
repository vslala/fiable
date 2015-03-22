<?php $title = "Admin Login"; ?>
@extends('admin_master')

@section('content')
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">

        <div class="jumbotron">
            <div class="alert-danger">
                {{ $message or '' }}
            </div>
            <div class="h2">
                Admin Login
            </div>


            {!! Form::model($admin,[route('adminLogin'), 'method'=>'put', 'files'=>true, 'class'=>'form-horizontal']) !!}

                <div class="form-group">
                    <label class="col-sm-2">
                        Username:
                    </label>
                    <div class="col-sm-10">
                        {!! Form::password('username', ['class'=>'form-control']) !!}
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2">
                        Password:
                    </label>
                    <div class="col-sm-10">
                        {!! Form::password('password', ['class'=>'form-control']) !!}
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2">

                    </label>
                    <div class="col-sm-10">
                        {!! Form::submit('Login', ['class'=>'btn btn-danger btn-lg']) !!}
                    </div>
                </div>

            {!! Form::close() !!}
        </div>

    </div>

    <div class="col-md-3"></div>
</div>
@endsection