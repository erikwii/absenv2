@extends('layouts.masterdosen')
@section('content')
    <script type="text/javascript" src="{!! asset('js/jquery-1.10.2.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('js/jquery-ui.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('js/datepicker.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('js/waktu.js') !!}"></script>
    <div class="container">
        <h1 class="page-header" style="background-color:#222222; color:#DEDEDE; text-align:center">
            {!! HTML::image('./img/logo.jpg', 'alt', array( 'width' => 150, 'height' => 150 )) !!} ONLINE PRESENCE
            SYSTEM
        </h1>
        <h2 style="text-align:center">
            <small>:: Department of Mathematics, Faculty of Mathematics and Natural Science State University of
                Jakarta ::
            </small>
        </h2>

        <h5><p class='text-center'>
                Hari, Tanggal :
                @inject('helpers', 'App\Helpers')
                {!! $helpers::indonesian_date() !!}
                <span id='output'></span> WIB
            </p>
        </h5>

        @include('errors.error_validator')

        <h2 style="color:black; text-align:center">Topik Perkuliahan</h2>
        <br>

        {!! Form::open(array('url' => array('/coursetopic',$topic->id_topik), 'class' => 'form-horizontal')) !!}
        <div class="form-group center-block">
            {!! Form::label('pertemuan_ke','Pertemuan Ke',['class' => "control-label col-sm-6"]) !!}
            <div class="col-sm-2">
                {!! Form::select('pertemuan_ke', $counter_p, $topic->pertemuan_ke,['class' => 'form-control','disabled']) !!}
            </div>
        </div>

        <div class="form-group form-group-sm">
            {!! Form::label('Kode_Matkul','Mata Kuliah',['class' => "control-label col-sm-6"]) !!}
            <div class="col-sm-2">
                {!! Form::select('Kode_Matkul',$courses, $topic->Kode_Matkul,['class' => 'form-control','disabled']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('tanggal','Tanggal',['class' => "control-label col-sm-6"]) !!}
            <div class="col-sm-2">
                {!! Form::text('tanggal', $topic->tanggal, array('id' => 'datepicker','class' => 'form-control'  )) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('nama_topik','Topik Pembahasan',['class' => "control-label col-sm-6"]) !!}
            <div class="col-sm-2">
                {!! Form::textarea('nama_topik',$topic->nama_topik,['class' => 'form-control','rows'=>4 ])!!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('jumlah_mhs','Jumlah Mahasiswa',['class' => "control-label col-sm-6"]) !!}
            <div class="col-sm-2">
                {!! Form::text('jumlah_mhs', $topic->jumlah_mhs, ['class' => 'form-control'])!!}
            </div>
        </div>

        {!! Form::hidden('id_topik',$topic->id_topik) !!}

        <div class="form-group">
            <div class="col-sm-6"></div>
            <div class="col-sm-2">
                {!! Form::submit('Update',['class' => 'btn btn-primary form-control']) !!}
            </div>
        </div>
        {!! Form::close() !!}

        {!! Form::open(array('url' => 'coursetopic', 'class' => 'form-horizontal','method'=>'get')) !!}
        <button type="submit" class="btn btn-default btn-block"><b>Lihat Topik Perkuliahan</b></button>
        {!! Form::close() !!}
        <br>
        <br>
    </div>
@stop