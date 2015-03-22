@extends('master')

@section('content')

<div class="row">
<div class="col-md-4">

</div>
<div class="col-md-4">

    <div class="panel panel-default" id="signUpPanel">
        <div class="panel-heading">
            <strong>Sign Up here</strong>
        </div>

        <div class="panel-body">
            <div class="register">
                    {!! Form::open(["route"=>["signUpPut"], 'method'=>'put', 'class'=>'form-horizontal']) !!}

                        <div class="form-group">
                            <label class="form-label">Username:</label>
                            <input type="password" class="form-control" name="username" />
                        </div>

                        <div class="form-group">
                             <label class="form-label">Email:</label>
                             <input type="email" class="form-control" name="email" />
                        </div>

                        <div class="form-group">
                             <label class="form-label">Password:</label>
                             <input type="password" class="form-control" name="password" />
                        </div>

                         <div class="form-group">
                              <label class="form-label">Confirm Password:</label>
                              <input type="password" class="form-control" name="cpassword" />
                         </div>

                         <div class="form-group">
                            <label></label>
                            <button class="btn btn-primary" type="submit">Sign Up</button>
                         </div>

                         <div class="form-group">
                            <a href="{{ route("signIn") }}" >Already have an account! SignIn here</a>
                         </div>
                    {!! Form::close() !!}
                </div>
        </div>
    </div>


    </div>
</div>
<div class="col-md-4"></div>

</div>

@endsection