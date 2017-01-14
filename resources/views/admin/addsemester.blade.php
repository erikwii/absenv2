@extends('layouts.masteradmin')
@section('content')
    {!! Html::script('js/datepicker.js') !!}
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

    {!! Form::open(array('url' => '/admin/add_semester', 'class' => 'form-horizontal','role'=>'form')) !!}
    <div class="form-group">
        {!! Form::label('semester', 'Semester', array('class' => 'control-label col-md-6 col-sm-6')) !!}
        <div class="col-md-2 col-sm-2">
            {!! Form::text('semester',null,['class' => 'form-control'])!!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('start_period', 'Awal Semester', array('class' => 'control-label col-md-6 col-sm-6')) !!}
        <div class="col-md-2 col-sm-2">
            {!! Form::text('start_period',null ,array('id' => 'datepicker','class' => 'form-control'  )) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('end_period', 'Akhir Semester', array('class' => 'control-label col-md-6 col-sm-6')) !!}
        <div class="col-md-2 col-sm-2">
            {!! Form::text('end_period',null ,array('id' => 'datepicker2','class' => 'form-control'  )) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::submit('Save',['class' => 'btn btn-primary form-control']) !!}
    </div>

    {!! form::close() !!}
@stop
