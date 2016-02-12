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
                <?php $linkedit = "/edituser/" . $user->id?>
                <td>{!! $user->id !!}</td>
                <td>{!! $user->name !!}</td>
                <td>{!! $user->email !!}</td>
                <td>{!! $user->role !!}</td>
                <?php $user_data = array("id"=>$user->id,"name"=>$user->name,"email"=>$user->email,"role"=>$user->role)?>
                <td><button type="button" class="btn btn-link edit-btn" data-toggle="modal" data-target="#myModal" data-id={!! json_encode($user_data) !!}>Edit</button></td>
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
