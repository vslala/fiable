<?php $title = "Fiable Product";

 ?>
@extends('master')

@section('content')

<div class="panel panel-primary">
    <div class="panel-heading">
        <h3>Product Details</h3>
    </div>
    <div class="panel-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">

                    <div class="slider">
                        @foreach($images as $image)

                                                    <a href="http://localhost:8000/{{ $image->url }}">
                                                        {!! Html::image($image->url, $image->name, ['class'=>'img img-thumbnail']) !!}
                                                    </a>

                                                @endforeach
                    </div>

                </div>


                <div class="col-md-6">
                    <ul class="nav nav-stacked">
                        <li>Name: <strong>{{ $name }}</strong>  </li>
                        <li>Brand: <strong>{{ $brand }}</strong></li>
                        <li>Size: <strong>{{ $size }}</strong></li>
                        <li>Type: <strong>{{ $type }}</strong> </li>
                        <li>Design: <strong>{{ $design }}</strong> </li>
                        <li>Price: <strong>{{ $price }}</strong>{!! Html::image("img/home/rupee-symbol.png") !!} </li>
                    </ul>

                    <br>
                    <!-- ADD TO CART -->


                        <a href="{{ route('cartAdd',[
                                        $pid,
                                        $name,
                                        $brand,
                                        $size,
                                        $price,
                                        $type,
                                        $design,
                                        $imageName
                        ]) }}" class="btn btn-lg btn-primary" id="cartAdd">
                                       Add to cart
                        </a>

                    <!-- BUY  -->

                        <a href="{{ route('buy',[
                                        $pid,
                                        $name,
                                        $brand,
                                        $size,
                                        $price,
                                        $type,
                                        $design,
                                        $imageName
                        ]) }}" class="btn btn-lg btn-success" id="cartShow">
                                       Buy Now
                        </a>



                    <br>
                    <div class="jumbotron">
                    <div class="h3">Description</div>
                        <p>{{ $description[0]['description'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection


@section('js')


<script>
$(document).ready(function($){
    $(".slider").slick();
});

    $("img").magnify();



</script>

@endsection