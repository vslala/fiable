
    {!! Form::model($blog, ['route'=>['adminUpdate', $blog->id], 'method'=>'put', 'class'=>'form-horizontal', 'files'=>true]) !!}
    <div class="form-group">
        <label class="col-sm-2">Username: </label>
        <div class="col-sm-10">
            {!! Form::text('username', $blog->username, ['class'=>'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2">Heading: </label>
        <div class="col-sm-10">
            {!! Form::text('heading', $blog->heading, ['class'=>'form-control']) !!}
        </div>
    </div>


    <div class="form-group">
        <label class="col-sm-2">Content: </label>
        <div class="col-sm-10">
            {!! Form::textarea('content', $blog->content, ['class'=>'form-control']) !!}
        </div>
    </div>


    <div class="form-group">
        <label class="col-sm-2">Image: </label>
        <div class="col-sm-10">
            {!! Form::file('file', ['class'=>'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
            <label class="col-sm-2"> </label>
            <div class="col-sm-10">
                {!! Form::submit('Update', ['class'=>'btn btn-success btn-lg']) !!}
            </div>
        </div>

    {!! Form::close() !!}