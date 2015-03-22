<?php $panelHeading = "Checkout"; ?>
@extends('master')

@section('content')

@include('_panel-heading')

<div class="row">
    <div class="col-md-8">

        <button class="btn btn-danger btn-lg" id="addressFormToggle">New Address</button>

        <div class="collapse" id="addressForm">
            @include("_addressForm")
        </div>
        <br>

        @if(isset($addresses))
            @foreach($addresses as $user)

                <div class="address col-md-4">
                    {{ $user->address_one }} <br>
                    {{ $user->address_two or '' }} <br>
                    {{ $user->landmark }} <br>
                    {{ $user->mobile }}
                    <a href="{{ route("summaryAddress", ["addressID"=>$user->id, "totalAmount"=>$totalAmount]) }}" class="btn btn-primary" >
                    Use this Address
                    </a>
                </div>

            @endforeach
        @else
            @include("_addressForm")
        @endif
    </div>

    <div class="col-md-4">


<div class="order-summary">
            <div class="jumbotron">
                <div class="h2">
                    Only Cash On Delivery Available For Now :)
                </div>

            </div>
        </div>
    </div>
</div>

@endsection