@extends('layouts.masterdosen')
@section('content')
    <div class="container">
        <h1 class="page-header" style="background-color:#222222; color:#DEDEDE; text-align:center">
            {!! HTML::image('./img/logo.jpg', 'alt', array( 'width' => 150, 'height' => 150 )) !!} ONLINE PRESENCE
            SYSTEM
        </h1>
        <h2 style="text-align:center">
            <small>:: Department of Mathematics, Faculty of Mathematics and Natural Science State University of Jakarta
                ::
            </small>
        </h2>
        </tr>
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
        <h2><p class="text-center">Create Course</p></h2>
        {!! Form::open(array('url' => array('/createcourse/tambahMatkul',$course->Kode_Matkul), 'class' => 'form-horizontal')) !!}
        <div class="form-group center-block">
            {!! Form::label('Kode_Matkul','Kode Matakuliah :',['class' => "control-label col-sm-6"]) !!}
            <!-- Set this field as disabled -->
            {!! Form::text('Kode_Matkul',$course->Kode_Matkul,['class' => 'col-sm-2','readonly'])!!}
        </div>

        <div class="form-group center-block">
            {!! Form::label('Nama_Matkul','Nama Matakuliah :',['class' => "control-label col-sm-6"]) !!}
            {!! Form::text('Nama_Matkul',$course->Nama_Matkul,['class' => 'col-sm-2'])!!}
        </div>

        <div class="form-group center-block">
            {!! Form::label('SKS','SKS :',['class' => "control-label col-sm-6"]) !!}
            {!! Form::text('SKS',$course->SKS,['class' => 'col-sm-2'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('prodi','Program Studi :',['class' => "control-label col-sm-6"]) !!}
            {!! Form::select('prodi_id', $prodi_options,$course->prodi_id,['class' => 'col-sm-2']) !!}
        </div>

        <div class="form-group center-block">
            {!! Form::label('day','Hari :',['class' => "control-label col-sm-6"]) !!}
            {!! Form::select('day', array('Senin' => 'Senin', 'Selasa' => 'Selasa', 'Rabu' => 'Rabu', 'Kamis' => 'Kamis', 'Jumat' => 'Jumat'), $course->day,['class' => 'col-sm-2']) !!}
        </div>

        <div class="form-group center-block">
            {!! Form::label('time','Jam :',['class' => "control-label col-sm-6"]) !!}
            {!! Form::select('time', array('0-1' => '0-1', '2+' => '2+', '3-4' => '3-4', '5' =>'5'), $course->time,['class' => 'col-sm-2']) !!}
        </div>

        <div class="form-group center-block">
            {!! Form::label('date','Course start date :',['class' => "control-label col-sm-6"]) !!}
            {!! Form::text('course_start_day', $course->course_start_day, array('id' => 'datepicker','class' => 'col-sm-2')) !!}
        </div>

        {!! Form::hidden('Kode_Dosen',$Kode_Dosen) !!}

        <br>
        <div class="form-group">
            {!! Form::submit('Tambah',['class' => 'btn btn-primary form-control']) !!}
        </div>
        {!! Form::close() !!}


        {!! Form::open(array('url' => '/showcourse', 'class' => 'form-horizontal','method'=>'get')) !!}
        <div class="form-group">
            <button type="submit" class="btn btn-primary form-control"><b>Lihat Mata Kuliah</b></button>
        </div>
        {!! Form::close() !!}

        </body>
    </div>
@stop