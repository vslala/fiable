@extends('admin_master')

@section('content')

<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <table class="table table-bordered">
            <thead>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Product Brand</th>
            </thead>

            <tbody>
                @foreach($products as $product)

                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->brand }}</td>
                </tr>


                @endforeach
            </tbody>
        </table>

        <div class="jumbotron">
        @if(isset($message))

        <div class="alert-block">
            <div class="alert-success">
                {{ $message or '' }}
            </div>
        </div>

        @endif

        {!! Form::open(['route'=>['adminAddImage'], 'method'=>'put', 'files'=>true, 'class'=>'form-vertical']) !!}
        <div class="form-group">
            {!! Form::label('Product ID', null, ['class'=>'form-label']) !!}
            {!! Form::text('pid',null,['class'=>'form-control', 'placeholder'=>'Product ID here']) !!}
        </div>
        <div class="form-group">
            {!! Form::file('files[]', ['multiple'=>true,'class'=>'form-control']) !!}
        </div>

            {!! Form::submit('Upload',['class'=>'btn btn-success']) !!}
        {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection