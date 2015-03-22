
@extends('admin_master')

@section('content')

<div class="row">
    <div class='panel panel-default'>
        <div class="panel-heading">
            <div class="h3">Customer's Pending Queries</div>
        </div>
        <div class="panel-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            @foreach($q as $query)
                            <table class="table table-responsive table-bordered bg-info">
                                <thead>
                                <label class="label label-primary"><span class="glyphicon glyphicon-user"></span></label>
                                <th>{{ $query->firstName }} {{ $query->lastName }}</th>
                                <th><div class="help-block">created at: {{ $query->created_at }}</div></th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>Subject: </th>
                                        <td>{{ $query->subject }}</td>
                                    </tr>
                                    <tr>
                                        <th>Message: </th>
                                        <td>{{ $query->message }}</td>
                                    </tr>
                                    <tr>
                                        <th> </th>
                                        <td><a href="{{ route('adminReply', $query->id) }}" class="btn btn-success">Reply</a></td>
                                    </tr>
                                </tbody>
                            </table>
                            
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

