@extends('layouts.masteradmin')
@section('content')
    {{--{!! HTML::script('js/viewjadwal.js') !!}--}}
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

    {!! Form::open(array('url' => '/addjadwal', 'class' => 'form-horizontal','role'=>'form')) !!}
    <div class="form-group center-block">
        {!! Form::label('Kode_Matkul','Kode Matakuliah',['class' => "control-label col-sm-6"]) !!}
        <div class="col-sm-2">
            {!! Form::text('Kode_Matkul',null,['class' => 'form-control'])!!}
        </div>
    </div>

    <div class="form-group center-block">
        {!! Form::label('Nama_Matkul','Nama Matakuliah',['class' => "control-label col-sm-6"]) !!}
        <div class="col-sm-2">
            {!! Form::text('Nama_Matkul',null,['class' => 'form-control'])!!}
        </div>
    </div>

    <div class="form-group center-block">
        {!! Form::label('SKS','SKS',['class' => "control-label col-sm-6"]) !!}
        <div class="col-sm-2">
            {!! Form::text('SKS',null,['class' => 'form-control'])!!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('prodi','Program Studi',['class' => "control-label col-sm-6"]) !!}
        <div class="col-sm-2">
            {!! Form::select('prodi_id', $prodi_options, 1,['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('ruang','Nama Ruang',['class' => "control-label col-sm-6"]) !!}
        <div class="col-sm-2">
            {!! Form::select('id_ruang', $room_options, 1,['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group center-block">
        {!! Form::label('day','Hari',['class' => "control-label col-sm-6"]) !!}
        <div class="col-sm-2">
            {!! Form::select('day', array('Senin' => 'Senin', 'Selasa' => 'Selasa', 'Rabu' => 'Rabu', 'Kamis' => 'Kamis', 'Jumat' => 'Jumat'), 'Senin',['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group center-block">
        {!! Form::label('time','Jam',['class' => "control-label col-sm-6"]) !!}
        <div class="col-sm-2">
            {!! Form::select('time', $waktu_options, '1',['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group center-block">
        {!! Form::label('date','Course start date',['class' => "control-label col-sm-6"]) !!}
        <div class="col-sm-2">
            {!! Form::text('course_start_day', '', array('id' => 'datepicker','class' => 'form-control')) !!}
        </div>
    </div>

    {!! Form::hidden('Kode_Dosen',$Kode_Dosen) !!}

    <br>
    <div class="form-group">
        {!! Form::submit('Tambah',['class' => 'btn btn-primary form-control']) !!}
    </div>

    {!! form::close() !!}
@stop
