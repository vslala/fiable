@extends('admin_master')

@section('content')

<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-9">
    	<div class="panel panel-default">
    		<div class="panel-heading">
    			<div class="h3">Add Category</div>
    		</div>
    	</div>
        <div class="alert-success">
                {{ $message or ''}}
        </div> 
    <div class="jumbotron">

        {!! Form::open(['route'=>['adminCategory'], 'method'=>'put', 'class'=>'form-horizontal', 'files'=>true]) !!}

    <div class="form-group">
        <label class="col-sm-3">Category Name: </label>
        <div class="col-sm-9">
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3">Category Image: </label>
        <div class="col-sm-9">
            {!! Form::file('file',['class'=>'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3">Part Of: </label>
        <div class="col-sm-9">
            <select class="form-control" name="mainCategory">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
            </select>
        </div>
    </div>

    
    <div class="form-group">
        <label class="col-sm-3"></label>
        <div class="col-sm-9">
 			{!! Form::submit('Create', ['class'=>'btn btn-success']) !!}
        </div>
    </div>



        {!! Form::close() !!}

        </div>

        @endsection