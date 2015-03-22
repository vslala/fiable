@extends('admin_master')

@section('content')
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="h3">Create a Blog Below!!!</div>
        </div>
    </div>
        <div class="jumbotron">
        @if(isset($_SESSION['message']))
            <span class="has-error"> {{ $message or '' }} </span>
        @endif
            {!! Form::open(['route'=>['adminStore'], 'method'=>'put', 'files'=>true, 'class'=>'form-horizontal']) !!}
            
            <div class="form-group {{ $errors->has('username') ? "has-error": '' }}">
                {!! Form::label('Username:', null, ['class'=>'form-label col-sm-2']) !!}
                <div class="col-md-9">
                    {!! Form::text('username', null, ['class'=>'form-control']) !!}
                    {!! $errors->first('username', "<span class='help-block'>:message</span>") !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('username') ? "has-error": '' }}">
                {!! Form::label('Heading:', null, ['class'=>'form-label col-sm-2']) !!}
                <div class="col-md-9">
                    {!! Form::text('heading', null, ['class'=>'form-control']) !!}
                    {!! $errors->first('heading', "<span class='help-block'>:message</span>") !!}
                </div>
            </div> 

            <div class="form-group {{ $errors->has('username') ? "has-error": '' }}">
                {!! Form::label('Content: ', null, ['class'=>'form-label col-sm-2']) !!}
                <div class="col-md-9">
                    {!! Form::textarea('content',null, ['class'=>'form-control']) !!}
                    {!! $errors->first('content', "<span class='help-block'>:message</span>") !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('username') ? "has-error": '' }}">
                {!! Form::label('Image: ',null, ['class'=>'form-label col-sm-2']) !!}
                <div class="col-md-9">
                    {!! Form::file('file', ['class'=>'form-control']) !!}
                    {!! $errors->first('file', "<span class='help-block'>:message</span>") !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-2"></div>
                <div class="col-md-9">
                    {!! Form::submit('Create', ['class'=>'btn btn-primary']) !!}
                </div>
            </div>



            {!! Form::close() !!}
        </div>
    </div>
    <div class="col-md-1"></div>
</div>
@endsection