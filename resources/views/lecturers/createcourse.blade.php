@extends('layouts.masterdosen')
@section('content')
    <div class="row">
        <div class="col-lg-120">

            <h1 class="page-header" style= "background-color:#222222; color:#DEDEDE; text-align:center">
                {!! HTML::image('./img/logo.jpg', 'alt', array( 'width' => 150, 'height' => 150 )) !!} ONLINE PRESENCE SYSTEM
            </h1>
            <h2 style= "text-align:center"><small>:: Department of Mathematics, Faculty of Mathematics and Natural Science State University of Jakarta :: </small></h2></tr>
            <br>
            </br>
            <head>
                <link href="{!! asset('assets/css/jquery-ui.css') !!}" media="all" rel="stylesheet" type="text/css"/>
                <script type="text/javascript" src="{!! asset('js/jquery-1.10.2.js') !!}"></script>
                <script type="text/javascript" src="{!! asset('js/jquery-ui.js') !!}"></script>
                <script type="text/javascript" src="{!! asset('js/datepicker.js') !!}"></script>
            </head>

             </hr>
            <body>
            <center>
                <h1>Create Course</h1>
                {!! Form::open()!!}
                <div class="form-group">
                    {!! Form::label('kode_matkul','Kode Matakuliah :') !!}
                    {!! Form::text('kode_matkul',null,['class' => 'from-control'])!!}
                </div>

                <div class="form-group">
                    {!! Form::label('nama_matkul','Nama Matakuliah :') !!}
                    {!! Form::text('nama_matkul',null,['class' => 'from-control'])!!}
                </div>

                <div class="form-group">
                    {!! Form::label('sks','SKS :') !!}
                    {!! Form::text('sks',null,['class' => 'from-control'])!!}
                </div>

                <div class="form-group">
                    {!! Form::label('prodi','Program Studi :') !!}
                    {!! Form::select('prodi', array('PM' => 'Pendidikan Matematika', 'M' => 'Matematika', 'S' => 'Sistem Komputer'), 'S') !!}
                </div>

                <div class="form-group">
                    {!! Form::label('day','Hari :') !!}
                    {!! Form::select('day', array('1' => 'Senin', '2' => 'Selasa', '3' => 'Rabu', '4' => 'Kamis', '5' => 'Jumat'), '1') !!}
                </div>

                <div class="form-group">
                    {!! Form::label('time','Jam :') !!}
                    {!! Form::select('time', array('0-1' => '0-1', '1' => '1', '2+' => '2+', '3' => '3', '3-4' => '3-4', '5' =>'5'), '1') !!}
                </div>

                <div class="form-group">
                    {!! Form::label('date','Course start day') !!}
                    {!! Form::text('date', '', array('id' => 'datepicker')) !!}
                </div>
                <center>
                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-info">Create</button>
                </center>
        </div>
        {!! Form::close() !!}
        </center>
        <br>
        <br>
        </body>
@stop