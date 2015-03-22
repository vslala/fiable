@extends('master')

@section('content')

<div class="row">
    <div class="col-md-8">
        <div class="alert-success">
            {{ $message or "" }}
        </div>
    </div>
</div>

@endsection