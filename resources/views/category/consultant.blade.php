<?php
    $title = "Fiable Consultants";
    $panelHeading = "Our experts will provide solutions";
    $breadcrumbs = [
        ['link'=>"Home"],
        ['link'=>"PC Service"],
        ['link'=>"Consultant", 'class'=>"label-primary"]
    ];
?>
@extends('master')

@section('content')

@include('_panel-heading')

@include('category._breadcrumb')

<div class="row">
@include("_left-nav")

<div class="col-md-9">
    <div class="consultant">
            {!! Html::image("img/category/consultant-info.jpg", "Consultant", ["class"=>"background-image-consultant"]) !!}>
            <a href="#" class="btn btn-primary btn-lg"
            style="margin-left: 10%; margin-top: -15%;"
             data-toggle="modal" data-target="#query_form">Fill the form here</a>

            <a href="#" class="btn btn-danger btn-lg"
                        style="margin-left: 25%; margin-top: -15%;"
                        data-toggle="modal" data-target="#info">
                        More Info</a>
    </div>

<!-- Modal for More Info -->
    <div class="modal fade"  id="info">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="modal-title h2">
                        Computer Consultants
                    </div>

                </div>

                <div class="modal-body">
                    <div class="jumbotron">
                        <p>If you have any query related to the computer's hardware or software, we are here to help you out.
                                                All you have to do is to fill a form with your query and our engineers will visit your house personally
                                                 to solve your problem.
                                                 In return we will just charge you a small amount for all of your queries. We also provide services
                                                 to help you out with your problem.
                                            </p>

                        <button class="btn btn-primary btn-lg" data-dismiss="modal">Cool
                            <span class="glyphicon glyphicon-thumbs-up"></span>
                         </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
<!-- Modal ends here -->


<!-- Modal for visit form -->
    <div class="modal fade"  id="query_form">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="modal-title h2">
                        Query Form
                    </div>

                </div>

                <div class="modal-body">
                <div class="alert-danger">
                     <b style="color: red;">*</b>By filling this form you are agreeing to the conditions, and a
                     small amount of 500{!! Html::image("img/home/rupee-symbol.png") !!} will be charged to you at the time of visit.
                </div>
                    <div class="jumbotron">
                        {!! Form::open(['route'=>["queryForm"], "class"=>"form-horizontal", "method"=>"put", "id"=>"query_form"]) !!}

                            <div class="form-group">
                                    <label class="col-sm-4">Full Name: </label>
                                    <div class="col-sm-4">
                                        {!! Form::text('firstName', null, ['class'=>'form-control', "placeholder"=>"First Name"]) !!}

                                   </div>
                                    <div class="col-sm-4">
                                        {!! Form::text('lastName', null, ['class'=>'form-control', "placeholder"=>"Last Name"]) !!}
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label class="col-sm-4">Email: </label>
                                    <div class="col-sm-8">
                                        {!! Form::text('email', null, ['class'=>'form-control', "placeholder"=>"email id"]) !!}
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label class="col-sm-4">Mobile: </label>
                                    <div class="col-sm-8">
                                        {!! Form::text('mobile', null, ['class'=>'form-control', "placeholder"=>"mobile"]) !!}
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label class="col-sm-4">Address: </label>
                                    <div class="col-sm-8">
                                        {!! Form::textarea('address_one', null, ['class'=>'form-control', 'rows'=>'5']) !!}
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label class="col-sm-4">Landmark: </label>
                                    <div class="col-sm-8">
                                        {!! Form::text('landmark', null, ['class'=>'form-control', 'placeholder'=>'Closest Landmark']) !!}
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label class="col-sm-4"> </label>
                                    <div class="col-sm-8">
                                        {!! Form::submit("Submit", ["class"=>"btn btn-primary"]) !!}
                                    </div>
                            </div>

                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
<!-- Modal ends here -->
</div>
</div>
</div>



@endsection