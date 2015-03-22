
    <ol class="breadcrumb">
        <li><label class="label label-default">Home</label> </li>
        <li><label class="label label-default">Handmade Items</label>  </li>
        <li><label class="label label-primary">{{ $category or '' }}</label>  </li>
    </ol>


<div class="row">
    <div class="panel panel-default">
        <div class="panel-body">

            @include('_left-nav')

            <div class="col-md-9">
                <div class="form-group">
                    @foreach($products as $product)
                        <?php $i = 0; ?>

                        @foreach($images as $image)


                            @if($image->product == $product->id && $i === 0)
                                <div class="col-sm-3 img-row">
                                    <div class="home-image-tab">
                                    <a href="{{ route('single', $product->id) }}">
                                        {!! Html::image($image->url, $image->name,
                                         [
                                         'class'=>'img img-responsive img-thumbnail'
                                         ]) !!}
                                    </a>

                                    <a href="{{ route('single', $product->id) }}" data-toggle="modal"
                                    data-target="#{{ $product->id }}" class="btn btn-warning btn-lg">
                                        View Product
                                    </a>
                                    </div>
                                </div>


                                          <!-- Single product Modal -->
                                                <div class="modal fade" id="{{ $product->id }}">
                                                    <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <div class="modal-title">
                                                             <b id="modal-title">{{ $product->name }} </b>
                                                             </div>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="container-fluid">
                                                                <div class="row">
                                                                    <div class="col-md-5">
                                                                        {!! Html::image($image->url, '$image->name', ['class'=>'img img-responsive img-thumbnail']) !!}
                                                                    </div>
                                                                    <div class="col-md-7">
                                                                        <ul class="nav nav-stacked">
                                                                            <li><b>{{ $product->name }}</b></li>
                                                                            <li>Brand: <b>{{ $product->brand }}</b></li>
                                                                            <li>Size: <b>{{ $product->size }}</b></li>
                                                                            <li>Type: <b>{{ $product->type }}</b></li>
                                                                            <li>Design: <b>{{ $product->design }}</b></li>
                                                                            <li>Price: <b>{{ $product->price }} Rs</b></li>
                                                                            <a href="{{ route('cartAdd',[
                                                                                 $product->id,
                                                                                 $product->name,
                                                                                 $product->brand,
                                                                                 $product->size,
                                                                                 $product->price,
                                                                                 $product->type,
                                                                                 $product->design,
                                                                                 $image->name
                                                                            ]) }}" class="btn btn-lg btn-primary" id="cartAdd">
                                                                             Add to cart
                                                                             </a>

                                                                            <a href="{{ route('buy',[
                                                                                 $product->id,
                                                                                 $product->name,
                                                                                 $product->brand,
                                                                                 $product->size,
                                                                                 $product->price,
                                                                                 $product->type,
                                                                                 $product->design,
                                                                                 $image->name
                                                                            ]) }}" class="btn btn-lg btn-success" id="cartShow">
                                                                             Buy Now
                                                                             </a>
                                                                        </ul>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="jumbotron">
                                                                        <p>{{ $product->description }}</p>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <a href="{{ route('single',[
                                                                    $product->id,
                                                                    $product->name,
                                                                    $product->brand,
                                                                    $product->size,
                                                                    $product->price,
                                                                    $product->type,
                                                                    $product->design,
                                                                    $image->name
                                                                    ]) }}" class="btn btn-lg btn-primary" id="single">
                                                                    More Details...
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </div><!-- modal-content -->
                                                    </div><!-- modal-dialog -->
                                                </div>
                                                <!-- Modal ends here -->

                                                <?php $i++ ; ?>
                            @endif

                        @endforeach


                    @endforeach
                </div>





            </div>
         </div>
    </div>
</div>