@extends('layouts.masteradmin')
@section('content')

    <div class="row">
        <h1 class="page-header" style="background-color:#222222; color:#DEDEDE; text-align:center">
            {!! Html::image('./img/logo.jpg', 'alt', array( 'width' => 150, 'height' => 150 )) !!} ONLINE PRESENCE
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

    {!! Form::open(array('url' => '/addroom', 'class' => 'form-horizontal','role'=>'form')) !!}
    <div class="form-group">
        {!! Form::label('nama_ruang', 'Nama Ruang', array('class' => 'control-label col-md-6 col-sm-6')) !!}
        <div class="col-md-2 col-sm-2">
            {!! Form::text('nama_ruang',null,['class' => 'form-control'])!!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('lokasi', 'Lokasi', array('class' => 'control-label col-md-6 col-sm-6')) !!}
        <div class="col-md-2 col-sm-2">
            {!! Form::text('lokasi',null ,['class' => 'form-control'])!!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('daya_tampung', 'Daya Tampung', array('class' => 'control-label col-md-6 col-sm-6')) !!}
        <div class="col-md-2 col-sm-2">
            {!! Form::text('daya_tampung',null ,['class' => 'form-control'])!!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::submit('Save',['class' => 'btn btn-primary form-control']) !!}
    </div>

    {!! form::close() !!}
@stop
