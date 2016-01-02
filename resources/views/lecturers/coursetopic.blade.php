@extends('layouts.masterdosen')
@section('content')
    <div class="row">
        <div class="col-lg-120">

            <h1 class="page-header" style= "background-color:#222222; color:#DEDEDE; text-align:center">
                {!! HTML::image('./img/logo.jpg', 'alt', array( 'width' => 150, 'height' => 150 )) !!} ONLINE PRESENCE SYSTEM
            </h1>
            <h2 style= "text-align:center"><small>:: Department of Mathematics, Faculty of Mathematics and Natural Science State University of Jakarta :: </small></h2></tr>
            <br>
            <h2 style="color:black; text-align:center">Topik Perkuliahan</h2>
            <br>
            <head>
                <link href="{!! asset('assets/css/jquery-ui.css') !!}" media="all" rel="stylesheet" type="text/css"/>
                <script type="text/javascript" src="{!! asset('js/jquery-1.10.2.js') !!}"></script>
                <script type="text/javascript" src="{!! asset('js/jquery-ui.js') !!}"></script>
                <script type="text/javascript" src="{!! asset('js/datepicker.js') !!}"></script>
            </head>

            <body>

            {!! Form::open((['url'=> 'coursetopic'])) !!}
            <center>
                <div class="form-group">
                    {!! Form::label('pertemuan_ke','Pertemuan Ke ') !!}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                    {!! Form::select('pertemuan_ke', array('1'=>'1', '2'=>'2', '3'=>'3', '4'=>'4', '5'=>'5',
                    '6'=>'6', '7'=>'7', '8'=>'8', '9'=>'9' , '10'=>'10' , '11'=>'11', '12'=>'12',
                    '13'=>'13', '14'=>'14', '15'=>'15', '16'=>'16' ), '1') !!}
                </div>

                <div class="form-group">
                    {!! Form::label('Kode_Matkul','Kode Mata Kuliah ') !!}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                    {!! Form::select('Kode_Matkul',array('3901'=>'3901', '3902'=>'3902', '3903'=>'3903', '3904'=>'3904', '3905'=>'3905',
                    '3906'=>'3906', '3907'=>'3907'), '3901') !!}

                </div>
                </center>


                <div class="form-group">
                    {!! Form::label('tanggal','Tanggal :') !!}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
                    {!! Form::text('tanggal', '', array('id' => 'datepicker')) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('nama_topik','Topik Pembahasan    :') !!}
                    {!! Form::text('nama_topik',null,['class' => 'form-control' ])!!}
                </div>

                <div class="form-group">
                    {!! Form::label('jumlah_mhs','Jumlah Mahasiswa :') !!}
                    {!! Form::text('jumlah_mhs',null,['class' => 'form-control'])!!}
                </div>
<br>
            <br>
            <br>
                <div class="form-group">
                    {!! Form::submit('Tambah',['class' => 'btn btn-primary form-control']) !!}
                </div>
                {!! Form::close() !!}

            {!! Form::open(array('url' => 'coursetopic', 'class' => 'form-horizontal','method'=>'get')) !!}
            <button type="submit" class="btn btn-default btn-block"><b>Lihat Topik Perkuliahan</b></button>
            {!! Form::close() !!}
            <br>
        <br>
        </body>
    @stop