@extends('admin_master')

@section('content')

<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-9">
    	<div class="panel panel-default">
    		<div class="panel-heading">
    			<div class="h3">Add Product</div>
    		</div>
    	</div>
    <div class="jumbotron"> 
        {!! Form::open(['route'=>['adminNew'], 'method'=>'put', 'class'=>'form-horizontal', 'files'=>true]) !!}

<div class="form-group">
        <label class="col-sm-3">Product Name: </label>
        <div class="col-sm-9">
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3">Brand: </label>
        <div class="col-sm-9">
            {!! Form::text('brand', null, ['class'=>'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3">Description: </label>
        <div class="col-sm-9">
            {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3">Size: </label>
        <div class="col-sm-9">
            {!! Form::text('size', null, ['class'=>'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3">Price: </label>
        <div class="col-sm-9">
            {!! Form::text('price', null, ['class'=>'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3">Type: </label>
        <div class="col-sm-9">
            {!! Form::text('type', null, ['class'=>'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3">Design: </label>
        <div class="col-sm-9">
            {!! Form::text('design', null, ['class'=>'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3">Stock: </label>
        <div class="col-sm-9">
 			<select name="stock" class="form-control">
 				<option value="true">In-Stock</option>
 				<option value="false">Out-Of-Stock</option>
 			</select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3">Category: </label>
        <div class="col-sm-9">
 			<select name="category" class="form-control">
 				@foreach($categories as $category)
 					<option value="{{ $category->id }}">{{ $category->name }}</option>
 				@endforeach
 			</select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3">Product Image: </label>
        <div class="col-sm-9">
 			{!! Form::file('files[]', ['multiple'=>true]) !!}
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
    </div>
    <div class="col-md-2"></div>
</div>


@endsection