<?php $setBlogActive = "active" ?>
@extends('master')

@section('css')

<style>
    .img-medium{
    height: 10em;
    }
</style>

@endsection
@section('content')

<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="h2">Blogs</div>
        </div>
        <div class="panel-body">

        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}"><label class="label label-default">Home</label> </a> </li>
            <li class="active"><a href="{{ route('blog') }}"><label class="label label-primary">Blog</label></a> </li>

        </ol>
        </div>
        <hr>

            @foreach($blogs as $blog)

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        {!! Html::image($blog->image, 'dp', ['class'=>'img img-responsive img-thumbnail']) !!}
                    </div>
                    <div class="col-md-6">
                        <div class="h3"><span class="glyphicon glyphicon-user"></span><b>{{ $blog->username }}</b></div>
                        <div class="help-block">
                            <div class="h6">created at: {{ $blog->created_at }}</div>
                            <br />
                        </div>
                        <div class="h4">{{ $blog->heading }}</div>
                        <br />
                        <p>{{ $blog->content }}</p>
                        
                    </div>
                </div>
            </div>
            <hr>


            @endforeach
        </div>
    <div class="col-md-1">

    </div>
</div>


@endsection