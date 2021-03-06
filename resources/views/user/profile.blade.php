<?php
$setUserProfileActive = "active";
$title = "Photography Profile";

?>
@extends('master')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-3">
			<div class="displayImage">
			 <a href="#modal" data-toggle="modal">

                @if(count($image) > 0)
                		    {!! Form::open(["route"=>["userDP"], 'files'=>true, 'method'=>'post']) !!}
                                         		    {!! Html::image($image[0]['url'], $image[0]['name'], ['class'=>'img img-thumbnail img-responsive']) !!}
                                         	{!! Form::close() !!}

                		    @else
                		    {!! Form::open(["route"=>["userDP"], 'files'=>true, 'method'=>'post']) !!}
                                         		    {!! Html::image("http://vkmtrade.com/images/Default_User.png", $image[0]['name'], ['class'=>'img img-thumbnail img-responsive']) !!}
                                         	{!! Form::close() !!}
                		@endif

             		</a>

             		<!-- Modal for image upload -->

             		<div class="modal" id="modal">
             		    <div class="modal-dialog">
             		        <div class="modal-content">
             		            <div class="modal-header">
             		            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
             		                <div class="modal-title">
             		                    <div class="h3">
             		                        Upload Display Pic
             		                    </div>

             		                </div>
             		            </div>

             		            <div class="modal-body">
             		                {!! Form::open(["route"=>["userDP"], "method"=>"put",
             		                    "files"=>true
             		                ]) !!}
             		                    {!! Form::file("file", ['class'=>'form-control']) !!}
             		                    {!! Form::submit("Upload", ['class'=>'btn btn-primary btn-lg']) !!}

             		                 {!! Form::close() !!}

             		            </div>
             		        </div>
             		    </div>
             		</div>

             		<!-- Modal Ends -->

             		<!-- Left nav panel will come here -->
             		@include("user._left-nav")
			</div>
		</div>
		<div class="col-md-6">
			<!-- Display information will come here -->
			<div class="form-group">
			    <label>Name: </label>
			    <p>{{ $user[0]['firstName'] ." ". $user[0]['lastName'] }}</p>
			</div>

			<div class="form-group">
			    <label>Email: </label>
			    <p>{{ $user[0]['email'] }}</p>
			</div>

			<div class="form-group">
			    <label>Contact Number: </label>
			    <p> {{ $user[0]['mobile'] }} </p>
			</div>

			<div class="form-group">
			    <label>About: </label>
			    <p> {{ $user[0]['about'] }} </p>
			</div>

			<div class="form-group">
			    <label>Experience: </label>
			    <p> {{ $user[0]['experience'] }} </p>
			</div>
		</div>
		<div class="col-md-3"></div>
	</div>

	<div class="row">
		<div class="col-md-3">



        </div>

		<div class="col-md-9">

		    <div class="personal-info">
		        <div class="form-group-lg">
		            <!-- User Information will be represented here -->

		        </div>
		    </div>

        <a class="btn btn-default btn-lg" id="editProfileBtn" data-toggle="collapse" aria-expanded="false"
         aria-controls="jumbotron"
         data-target="#jumbotron">Edit</a>

		<div class="jumbotron collapse" id="jumbotron">
		    <p>Update Your Profile</p>
			{!! Form::open(["route"=>["userUpdate"], 'class'=>'form-horizontal', 'method'=>'put', 'id'=>'updateForm']) !!}

			    <div class="form-group">
			        <label class="form-label col-md-2">Full Name:</label>
			        <div class="col-md-5">
			            {!! Form::text("firstName", $user[0]['firstName'],['class'=>"form-control", 'placeholder'=>'First Name']) !!}
			        </div>
			        <div class="col-md-5">
			            {!! Form::text("lastName", $user[0]['lastName'],['class'=>"form-control", 'placeholder'=>'Last Name']) !!}
			        </div>
			    </div>

			    <div class="form-group">
			        <label class="form-label col-md-2">Email:</label>
			        <div class="col-md-5">
			            {!! Form::text("email", $user[0]['email'], ['class'=>'form-control', 'placeholder'=>'Email']) !!}
			        </div>
			    </div>

			    <div class="form-group">
			        <label class="form-label col-md-2">Mobile:</label>
			        <div class="col-md-5">
			            {!! Form::text("mobile", $user[0]['mobile'], ['class'=>'form-control', 'placeholder'=>'Contact Number']) !!}
			        </div>
			    </div>

			    <div class="form-group">
			        <label class="form-label col-md-2">About:</label>
			        <div class="col-md-5">
			            {!! Form::textarea("about", $user[0]['about'], ['class'=>'form-control', 'placeholder'=>'Tell the world about yourself']) !!}
			        </div>
			    </div>

			    <div class="form-group">
			        <label class="form-label col-md-2">Experience:</label>
			        <div class="col-md-5">
			            {!! Form::text("xp", $user[0]['experience'], ['class'=>'form-control', 'placeholder'=>'Share Your work Experience here']) !!}
			        </div>
			    </div>

			    <div class="form-group">
			        <label class="form-label col-md-2"></label>
			        <div class="col-md-5">
			            {!! Form::submit("Update", ['class'=>'btn btn-success btn-lg']) !!}
			        </div>
			    </div>
			{!! Form::close() !!}
		</div>

		</div>
	</div>
</div>

@endsection