<?php $panelHeading = "Order Summary";
    $title = "Order Summary";
 ?>
@extends('master')

@section('content')

@include('_panel-heading')

<div class="row">
    <div class="col-md-10">
                <div class="order-summary">
                    <div class="jumbotron">
                        <div class="h3 tahoma">Order Summary</div>

                        <p>Total Amount Payable: <strong>{{ $totalAmount }}</strong> {!! Html::image('img/home/rupee-symbol.png') !!}</p>

                        <div class="address">
                            <p>Address</p>
                            {{ $address[0]['address_one'] }}
                            <br>
                            {{ $address[0]['address_two'] }}
                            <br>
                            {{ $address[0]['landmark'] }}
                            <br>
                            {{ $state[0]['name'] }}
                            <br>
                            {{ $city[0]['name'] }}
                            <br>
                            {{ $address[0]['mobile'] }}
                            <br><br>

                            {{--{!! Form::open(['route'=>['confirm'], 'method'=>'put']) !!}--}}
                                {{--<input type="hidden" value="{{ $address[0]['userID'] }}" name="userID">--}}

                            <a href="{{ route('confirm',[
                                $address[0]['id'],
                                $address[0]['firstName'],
                                $address[0]['lastName'],
                                $address[0]['email'],
                                $totalAmount
                            ]) }}" class="btn btn-primary btn-lg" id="confirm">Confirm Order</a>

                            {{--{!! Form::close() !!}--}}

                        </div>


                    </div>
                </div>
                <br>


    </div>
</div>

@endsection