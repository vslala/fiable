<?php $setHomeActive = "active" ?>
<?php $setHandmadeActive = "active" ?>
<?php $setElectricalActive = "active" ?>
<?php $setPhotographyActive = "active" ?>
<?php $setPcActive = "active" ?>
@extends('master')

@section('css')
<style>


</style>
@endsection

@section('content')

        <?php $panelHeading = "Categories" ?>
        @include('_panel-heading')

        <div class="row">
        <div class="panel panel-default">

            <div class="panel-body">

            @include('_left-nav')

            <div class="col-md-9">
                <div class="form-group">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="home-image-tab">
                                <a href="{{ route('handmadeItems') }}">
                                     {!! Html::image('img/home/handmade.png', 'handmade items',[
                                          'class'=>'img img-responsive img-rectangle img-thumbnail'
                                     ]) !!}
                                </a>
                                <p></p>
                                     {!! Html::link(route('handmadeItems'), 'Handmade Items', ['class'=>'btn btn-success',
                                     'id'=>'btn-lg'
                                     ]) !!}
                            </div>
                        </div>


                    <div class="row">
                        <div class="home-image-tab">
                            <a href="{{ route('photography') }}">
                             {!! Html::image('img/home/photography-logo.png', 'photography',[
                             'class'=>'img img-responsive img-rectangle img-thumbnail'
                             ]) !!}
                             </a>
                             <p></p>
                            {!! Html::link(route('photography'), 'Photography', ['class'=>'btn btn-success', 'id'=>'btn-lg']) !!}


                        </div>

                    </div>

                    <div class="row">
                        <div class="home-image-tab">
                            <a href="{{ route('electrical') }}">
                             {!! Html::image('img/home/electrical-logo.png', 'electrical',[
                             'class'=>'img img-responsive img-rectangle img-thumbnail'
                             ]) !!}
                             </a>
                             <p></p>
                            {!! Html::link(route('electrical'), 'Electrical', ['class'=>'btn btn-success', 'id'=>'btn-lg']) !!}
                        </div>

                    </div>

                    <div class="row">
                        <div class="home-image-tab">

                            <a href="{{ route('pcservice') }}">
                             {!! Html::image('img/home/PC_home.jpg', 'pc services',[
                             'class'=>'img img-responsive img-rectangle img-thumbnail'
                             ]) !!}
                             </a>
                             <p></p>
                            {!! Html::link(route('pcservice'), 'Computer Services', ['class'=>'btn btn-success', 'id'=>'btn-lg']) !!}
                        </div>

                    </div>
                    </div>

                </div>
            </div>
            </div>
        </div>
        </div>

@endsection
