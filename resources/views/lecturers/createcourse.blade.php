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
                {!! Form::open((['url'=> 'createcourse'])) !!}
                <div class="form-group">
                    {!! Form::label('Kode_Matkul','Kode Matakuliah :') !!}
                    {!! Form::text('Kode_Matkul',null,['class' => 'from-control'])!!}
                </div>

                <div class="form-group">
                    {!! Form::label('Nama_Matkul','Nama Matakuliah :') !!}
                    {!! Form::text('Nama_Matkul',null,['class' => 'from-control'])!!}
                </div>

                <div class="form-group">
                    {!! Form::label('SKS','SKS :') !!}
                    {!! Form::text('SKS',null,['class' => 'from-control'])!!}
                </div>

                <div class="form-group">
                    {!! Form::label('prodi','Program Studi :') !!}
                    {!! Form::select('prodi', array('Pendidikan Matematika' => 'Pendidikan Matematika', 'Matematika' => 'Matematika', 'Sistem Komputer' => 'Sistem Komputer'), 'S') !!}
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
<br>
            <br>
            <br>
                <div class="form-group">
                    {!! Form::submit('Tambah',['class' => 'btn btn-primary form-control']) !!}
                </div>
                {!! Form::close() !!}

            {!! Form::open(array('url' => 'createcourse', 'class' => 'form-horizontal','method'=>'get')) !!}
            <button type="submit" class="btn btn-default btn-block"><b>Lihat Mata Kuliah</b></button>
            {!! Form::close() !!}
            <br>
        <br>
        </body>
    @stop