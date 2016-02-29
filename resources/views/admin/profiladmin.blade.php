@extends('layouts.masteradmin')
@section('content')
    <h1 class="page-header" style="background-color:#222222; color:#DEDEDE; text-align:center">
        {!! HTML::image('./img/logo.jpg', 'alt', array( 'width' => 150, 'height' => 150 )) !!} ONLINE PRESENCE
        SYSTEM
    </h1>

    @include('errors.error_validator')

    <h2 style="text-align:center">
        <small>:: Department of Mathematics, Faculty of Mathematics and Natural Science State University of Jakarta
            ::
        </small>
    </h2>
    <h2 style="color:red; text-align:center">Welcome!</h2>

    <!-- time content -->

    <!-- time content -->
    <h6><p class='text-center'>
            Hari, Tanggal :
            @inject('helpers', 'App\Helpers')
            {!! $helpers::indonesian_date() !!}
            <span id='output'></span> WIB
        </p>
    </h6>
    <!-- time content -->

    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <h4><p class="text-center well">Identitas Admin</p></h4>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <table class="table table-responsive table-hover">
                <tbody>
                <tr>
                    <td>ID Admin</td>
                    <td>{!! $admin->id !!}</td>
                </tr>
                <tr>
                    <td>Nama Admin</td>
                    <td>{!! $admin->Nama_Admin !!}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>{!! $admin->Alamat !!}</td>
                </tr>
                <tr>
                    <td>Telepon</td>
                    <td>{!! $admin->Telepon !!}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-sm-3"></div>
        <div class="col-md-1 col-sm-1">
            <button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#myModal">Edit</button>
        </div>
    </div>
    <br>

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
                    {!! Form::open(array('url' => '/profiladmin', 'class' => 'form-horizontal','role'=>'form')) !!}
                    <div class="form-group">
                        {!! Form::label('Nama_Admin', 'Nama Admin', array('class' => 'control-label')) !!}
                        {!! Form::text('Nama_Admin',$admin->Nama_Admin,['class' => 'form-control'])!!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Alamat', 'Alamat', array('class' => 'control-label')) !!}
                        {!! Form::text('Alamat',$admin->Alamat  ,['class' => 'form-control'])!!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Telepon', 'Telepon', array('class' => 'control-label')) !!}
                        {!! Form::text('Telepon',$admin->Telepon,['class' => 'form-control'])!!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Save',['class' => 'btn btn-primary form-control']) !!}
                    </div>
                    {!! Form::hidden('id',$admin->id) !!}
                    {!! form::close() !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Cancel</button>
                </div>
            </div>
        </div>
    </div>
@stop