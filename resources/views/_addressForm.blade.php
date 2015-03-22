<div class="jumbotron">
        <p>Please fill in your details and click proceed</p>
            {!! Form::open(['route'=>['summary'], 'method'=>'put', 'class'=>'form-horizontal', 'id'=>'address_form']) !!}

            <div class="form-group">
                <label class="col-md-2 form-label">Name: </label>
                <div class="col-md-5">
                    {!! Form::text('firstName',null,['class'=>'form-control', 'placeholder'=>'First Name']) !!}
                </div>
                <div class="col-md-5">
                    {!! Form::text('lastName',null,['class'=>'form-control', 'placeholder'=>'Last Name']) !!}
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2">Email: </label>
                <div class="col-md-10">
                    {!! Form::text('email',null,['class'=>'form-control', 'placeholder'=>'Email Address']) !!}
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2">Address 1: </label>
                <div class="col-md-10">
                    {!! Form::textarea('address_one',null,['class'=>'form-control', 'placeholder'=>'Address', 'rows'=>2]) !!}

                </div>
            </div>


            <div class="form-group">
                <label class="col-md-2">Address 2: </label>
                <div class="col-md-10">
                    {!! Form::textarea('address_two',null,['class'=>'form-control', 'placeholder'=>'Address', 'rows'=>2]) !!}

                </div>
            </div>


            <div class="form-group">
                <label class="col-md-2">Landmark: </label>
                <div class="col-md-10">
                    {!! Form::text('landmark',null,['class'=>'form-control', 'placeholder'=>'Landmark']) !!}

                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2">City: </label>
                <div class="col-md-10">
                    <select name="city" class="form-control">
                        @foreach($cities as $c)
                        <option value="{{ $c->id }}"> {{ $c->name }}</option>
                        @endforeach
                    </select>

                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2">State: </label>
                <div class="col-md-10">
                    <select name="state" class="form-control">
                        @foreach($states as $s)
                        <option value="{{ $s->id }}"> {{ $s->name }}</option>
                        @endforeach
                    </select>

                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2">Mobile: +91 </label>
                <div class="col-md-10">
                    {!! Form::text('mobile',null, ['class'=>'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2"></label>
                <div class="col-md-10">
                    {!! Form::submit('Proceed', ['class'=>'btn btn-lg btn-success']) !!}

                </div>
            </div>

            <input type="hidden" value="{{ $totalAmount }}" name="totalAmount">

            {!! Form::close() !!}


        </div>