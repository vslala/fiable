<?php
$setUserHomeActive = "active";
$title = "Photography Home";
?>
@extends('master')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-3">
			<div class="displayImage">
			 <!-- Image will come here -->
			</div>
		</div>
		<div class="col-md-6">
			<!-- Display information will come here -->
		</div>
		<div class="col-md-3"></div>
	</div>

	<div class="row">
		<div class="col-md-3">
		<a href="@if($flag){{ route("userProfile") }} @else # @endif">
		@if(count($dp) > 0)
		    {!! Html::image($dp['url'], $dp['name'], ['class'=>'img img-thumbnail img-responsive']) !!}

		    @else
		    {!! Html::image("http://vkmtrade.com/images/Default_User.png","Profile Picture",['class'=>'img img-thumbnail img-responsive']) !!}
		@endif
		</a>

				<!-- Left nav panel will come here -->
            @if($flag)
                @include("user._left-nav")
            @else
                <a href="{{ route("photography") }}">
                <span class="glyphicon glyphicon-hand-left"></span>
                Go Back</a>
            @endif
        </div>

		<div class="col-md-9">
			<div class="container-fluid">
			    <div class="row">
			    @if($flag)
			        <div class="form-group">
			            <a href="#addImage" class="btn btn-danger" id="addImageLink" data-toggle="modal">Add Image</a>

			            <!-- Modal for image upload -->

                                     		<div class="modal" id="addImage">
                                     		    <div class="modal-dialog">
                                     		        <div class="modal-content">
                                     		            <div class="modal-header">
                                     		            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                     		                <div class="modal-title">
                                     		                    <div class="h3">
                                     		                        Upload Picture for your Portfolio
                                     		                    </div>

                                     		                </div>
                                     		            </div>

                                     		            <div class="modal-body">
                                     		                {!! Form::open(["route"=>["userImages"], "method"=>"put",
                                     		                    "files"=>true
                                     		                ]) !!}
                                     		                    <div class="form-group">
                                     		                        {!! Form::file("file", ['class'=>'form-control']) !!}
                                     		                    </div>


                                     		                    <div class="form-group">
                                     		                        {!! Form::textarea("description", null, ['class'=>'form-control', 'placeholder'=>'Write a good description about this picture.']) !!}

                                     		                    </div>
                                     		                    <div class="form-group">

                                     		                        {!! Form::submit("Upload", ['class'=>'btn btn-success btn-lg']) !!}
                                     		                    </div>


                                     		                 {!! Form::close() !!}

                                     		            </div>
                                     		        </div>
                                     		    </div>
                                     		</div>

                                     		<!-- Modal Ends -->
			        </div>
                @endif
                    @foreach($images as $image)
			        <div class="form-group" style="border: 1px solid blue; padding: 10px;">


                            <p>{{ $image->description }}</p>
                            <br>
                            {!! Html::image($image->url, $image->name, ['class'=>'img img-responsive img-rectangle']) !!}
                            <br>
                            <div class="review-section" id="reviews">
                                <a href="#" class="btn btn-default" id="reviewBtn">Reviews
                                    <span class="glyphicon glyphicon-list"></span>
                                </a>
                                <div class="view-review jumbotron" id="view-review" style="display: none;">
                                    <h2>Reviews</h2>
                                    @foreach($reviews as $review)

                                        @if($review->imageID == $image->id)
                                            <li >{{ $review->review }}</li>
                                        @endif

                                    @endforeach

                                </div>

                                <div class="review-form">
                                    {!! Form::open(["route"=>["addReview"], 'method'=>'put', 'id'=>'reviewForm']) !!}
                                                            <input type="hidden" value="{{ $image->id }}" name="imageID" id="imageID" />
                                                            <textarea name="review" class="form-control" id="review" placeholder="Write Your review here..."></textarea>
                                                            {!! Form::submit("Submit", ['class'=>'btn btn-primary']) !!}
                                                        {!! Form::close() !!}
                                </div>

                            </div>

			        </div>
			        <hr>
			        @endforeach
			    </div>
			</div>
		</div>
	</div>
</div>

@endsection