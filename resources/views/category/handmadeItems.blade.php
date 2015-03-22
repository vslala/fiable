<?php
$title = "Handmade Items";
$setHandmadeActive = "active";
$breadcrumbs = [
    ['link'=>"Home"],
    ['link'=>"Handmade Items", "class"=>"label-primary"]
];
?>
@extends('master')

@section('content')
<?php $panelHeading = "Handmade Items"; ?>
@include('_panel-heading')

@include('category._breadcrumb')

<div class="row">
    <div class="panel panel-default">
        <div class="panel-body">

            @include('_left-nav')

            <div class="col-md-9">
                <div class="form-group" style="border-left: 1px solid gray;">
                @foreach($categories as $category)
                    <div class="col-sm-3 image-row">

                        <div class="home-image-tab">

                            <a href="#">

                             {!! Html::image($category->url, $category->name,[
                             'class'=>'img img-thumbnail'
                             ]) !!}

                             </a>
                            {!! Html::link(route($category->name), $category->name, ['class'=>'btn btn-danger btn-lg']) !!}

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