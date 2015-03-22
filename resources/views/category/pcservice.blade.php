<?php
$title = "Computer Services";
$setPcActive = "active";
$panelHeading = "PC Repair and Support Services";
$breadcrumbs = [
    ['link'=>"Home"],
    ['link'=>"PC Service", "class"=>"label-primary"]
];
?>
@extends('master')

@section('content')

@include('_panel-heading')

@include('category._breadcrumb')

<div class="row">
    <div class="panel panel-default">
        <div class="panel-body">

            @include('_left-nav')

            <div class="col-md-9">
                <div class="form-group" style="border-left: 1px solid gray;">
                @foreach($categories as $category)
                    <div class="col-md-12 image-row">

                        <div class="home-image-tab">

                            <a href="#">

                             {!! Html::image($category->url, $category->name,[
                             'class'=>'img img-thumbnail'
                             ]) !!}

                             </a>
                            {!! Html::link(route($category->name), $category->name, [
                            'class'=>'btn btn-danger btn-lg', 'id'=>"btn-lg-lg"
                            ]) !!}

                        </div>

                    </div>
                @endforeach
                </div>
            </div>

            <div class="col-md-1"></div>
        </div>
    </div>
</div>


@endsection