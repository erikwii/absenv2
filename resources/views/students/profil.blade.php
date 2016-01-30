@extends('layouts.mastermhs')
@section('content')
        <!-- Load waktu onload  -->
<h1 class="page-header" style="background-color:#222222; color:#DEDEDE; text-align:center">
    {!! HTML::image('./img/logo.jpg', 'alt', array( 'width' => 150, 'height' => 150 )) !!} ONLINE PRESENCE
    SYSTEM
</h1>
<h2 style="text-align:center">
    <small>:: Department of Mathematics, Faculty of Mathematics and Natural Science State University of Jakarta
        ::
    </small>
</h2>
<h2 style="color:red; text-align:center">Welcome!</h2>
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
        <div class="well well-sm">
            <h4>
                <p class="text-center">Identitas Mahasiswa</p>
            </h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <table class="table table-responsive table-hover">
            <tbody>
            <tr>
                <td>Nomor Registrasi</td>
                <td>{!! $noreg !!}</td>
            </tr>
            <tr>
                <td>Nama Mahasiswa</td>
                <td>{!! $name !!}</td>
            </tr>
            <tr>
                <td>Program Studi</td>
                <td>{!! $prodi !!}</td>
            </tr>
            <tr>
                <td>Semester</td>
                <td>{!! $semester !!}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>{!! $alamat !!}</td>
            </tr>
            <tr>
                <td>Telepon</td>
                <td>{!! $telepon !!}</td>
            </tr>
            <tr>
                <td>MAC</td>
                <td>{!! $mac !!}</td>
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
                {!! Form::open(array('url' => '/profil', 'class' => 'form-horizontal','role'=>'form')) !!}
                <div class="form-group">
                    {!! Form::label('Noreg', 'Nomor Registrasi', array('class' => 'control-label')) !!}
                    {!! Form::text('Noreg',$noreg,['class' => 'form-control'])!!}
                </div>
                <div class="form-group">
                    {!! Form::label('Nama_Mhs', 'Nama Mahasiswa', array('class' => 'control-label')) !!}
                    {!! Form::text('Nama_Mhs',$name,['class' => 'form-control'])!!}
                </div>
                <div class="form-group">
                    {!! Form::label('Prodi_id', 'Program Studi', array('class' => 'control-label')) !!}
                    {!! Form::select('Prodi_id',$prodi_opts,$prodi,['class' => 'form-control'])!!}
                </div>
                <div class="form-group">
                    {!! Form::label('Alamat', 'Alamat', array('class' => 'control-label')) !!}
                    {!! Form::text('Alamat',$alamat,['class' => 'form-control'])!!}
                </div>
                <div class="form-group">
                    {!! Form::label('Telepon', 'Telepon', array('class' => 'control-label')) !!}
                    {!! Form::text('Telepon',$telepon,['class' => 'form-control'])!!}
                </div>
                <div class="form-group">
                    {!! Form::label('Semester', 'Semester Masuk', array('class' => 'control-label')) !!}
                    {!! Form::text('Semester',$semester,['class' => 'form-control'])!!}
                </div>
                <div class="form-group">
                    {!! Form::label('Mac', 'Mac Address', array('class' => 'control-label')) !!}
                    {!! Form::text('Mac',$mac,['class' => 'form-control'])!!}
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
@stop