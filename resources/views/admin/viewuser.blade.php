@extends('layouts.masteradmin')
@section('content')
    {!! HTML::script('js/viewuser.js') !!}
    <div class="row">
        <h1 class="page-header" style="background-color:#222222; color:#DEDEDE; text-align:center">
            {!! HTML::image('./img/logo.jpg', 'alt', array( 'width' => 150, 'height' => 150 )) !!} ONLINE PRESENCE
            SYSTEM
        </h1>
        <h2 style="text-align:center">
            <small>:: Department of Mathematics, Faculty of Mathematics and Natural Science State University of Jakarta
                ::
            </small>
        </h2>

        <br>
    </div>

    <h6><p class='text-center'>
            Hari, Tanggal :
            @inject('helpers', 'App\Helpers')
            {!! $helpers::indonesian_date() !!}
            <span id='output'></span> WIB
        </p>
    </h6>

    @include('errors.error_validator')

    <h3 style="text-align:center"> Daftar User </h3>

    <div class="row">
        <div class="col-md-1 col-sm-1"></div>
        <div class="col-md-10 col-sm-10">
        <table class="table table-responsive table-striped table-hover">
            <thead>
            <tr>
                <th>
                    id
                </th>
                <th>
                    Name
                </th>
                <th>
                    Email
                </th>
                <th>
                    Role
                </th>
                <th>
                    Action
                </th>
            </tr>
            </thead>
            <tbody>

            @foreach($users as $user)
            <tr>
                <td>{!! $user->id !!}</td>
                <td>{!! $user->name !!}</td>
                <td>{!! $user->email !!}</td>
                <td>{!! $user->role !!}</td>
                <?php $user_data = array("id"=>$user->id,"name"=>$user->name,"email"=>$user->email,"role"=>$user->role)?>
                <td><button type="button" class="btn btn-link edit-btn" data-toggle="modal" data-target="#myModal" data-id={!! '\''.json_encode($user_data).'\'' !!}>Edit</button>
                    <button type="button" class="btn btn-link delete-btn" data-toggle="modal" data-target="#deleteModal" data-id={!! '\''.json_encode($user_data).'\'' !!}>Delete</button>
                </td>
            </tr>
            @endforeach
            <tr>
                <td></td><td></td>
                <td align="center">
                    {!! $users !!}
                </td>
            </tr>

            </tbody>
        </table>
        </div>

        <!-- delete Modal -->
        <div id="deleteModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title text-center">Confirm Delete</h4>
                    </div>
                    <div class="modal-body" style="padding:40px 50px;">
                        <div class="row" style="text-align: center">
                            {!! Form::open(array('url' => '/deleteuser', 'class' => 'form-horizontal','role'=>'form')) !!}
                            {!! Form::submit('Yes',['class' => 'btn btn-primary']) !!}
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><span
                                        class="glyphicon glyphicon-remove"></span>Cancel
                            </button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title text-center">Edit Profile</h4>
                    </div>
                    <div class="modal-body" style="padding:40px 50px;">
                        {!! Form::open(array('url' => '/edituser', 'class' => 'form-horizontal','role'=>'form')) !!}
                        <div class="form-group">
                            {!! Form::label('id', 'id', array('class' => 'control-label')) !!}
                            {!! Form::text('id',null,['class' => 'form-control','readonly'])!!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('name', 'Nama', array('class' => 'control-label')) !!}
                            {!! Form::text('name',null,['class' => 'form-control'])!!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('email', 'Email', array('class' => 'control-label')) !!}
                            {!! Form::text('email',null ,['class' => 'form-control'])!!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('password', 'New Password', array('class' => 'control-label')) !!}
                            {!! Form::password('password',['class' => 'form-control'])!!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('confirm_password', 'Password Confirmation', array('class' => 'control-label')) !!}
                            {!! Form::password('password_confirmation',['class' => 'form-control'])!!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Save',['class' => 'btn btn-primary form-control']) !!}
                        </div>
                        {!! form::close() !!}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Cancel</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop
