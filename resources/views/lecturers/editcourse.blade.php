@extends('layouts.masterdosen')
@section('content')
    {!! Html::script('js/datepicker.js') !!}
    <h1 class="page-header" style="background-color:#222222; color:#DEDEDE; text-align:center">
        {!! Html::image('./img/logo.jpg', 'alt', array( 'width' => 150, 'height' => 150 )) !!} ONLINE PRESENCE
        SYSTEM
    </h1>
    <h2 style="text-align:center">
        <small>:: Department of Mathematics, Faculty of Mathematics and Natural Science State University of Jakarta
            ::
        </small>
    </h2>

    <h5><p class='text-center'>
            Hari, Tanggal :
            @inject('helpers', 'App\Helpers')
            {!! $helpers::indonesian_date() !!}
            <span id='output'></span> WIB
        </p>
    </h5>

    <h2><p class="text-center">Create Course</p></h2>
    {!! Form::open(array('url' => array('/createcourse/tambahMatkul',$course->Kode_Matkul), 'class' => 'form-horizontal')) !!}
    <div class="form-group center-block">
        {!! Form::label('Kode_Matkul','Kode Matakuliah',['class' => "control-label col-sm-6"]) !!}
                <!-- Set this field as disabled -->
        <div class="col-sm-2">
            {!! Form::text('Kode_Matkul',$course->Kode_Matkul,['class' => 'form-control','readonly'])!!}
        </div>
    </div>

    <div class="form-group center-block">
        {!! Form::label('Nama_Matkul','Nama Matakuliah',['class' => "control-label col-sm-6"]) !!}
        <div class="col-sm-2">
            {!! Form::text('Nama_Matkul',$course->Nama_Matkul,['class' => 'form-control'])!!}
        </div>
    </div>

    <div class="form-group center-block">
        {!! Form::label('SKS','SKS',['class' => "control-label col-sm-6"]) !!}
        <div class="col-sm-2">
            {!! Form::text('SKS',$course->SKS,['class' => 'form-control'])!!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('prodi','Program Studi',['class' => "control-label col-sm-6"]) !!}
        <div class="col-sm-2">
            {!! Form::select('prodi_id', $prodi_options,$course->prodi_id,['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('ruang','Nama Ruang',['class' => "control-label col-sm-6"]) !!}
        <div class="col-sm-2">
            {!! Form::select('id_ruang', $room_options, $course->id_ruang,['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group center-block">
        {!! Form::label('day','Hari',['class' => "control-label col-sm-6"]) !!}
        <div class="col-sm-2">
            {!! Form::select('day', array('Senin' => 'Senin', 'Selasa' => 'Selasa', 'Rabu' => 'Rabu', 'Kamis' => 'Kamis', 'Jumat' => 'Jumat'), $course->day,['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group center-block">
        {!! Form::label('time','Jam',['class' => "control-label col-sm-6"]) !!}
        <div class="col-sm-2">
            {!! Form::select('time', $waktu_options, $course->time,['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group center-block">
        {!! Form::label('date','Course start date',['class' => "control-label col-sm-6"]) !!}
        <div class="col-sm-2">
            {!! Form::text('course_start_day', $course->course_start_day, array('id' => 'datepicker','class' => 'form-control')) !!}
        </div>
    </div>

    {!! Form::hidden('seksi',$course->seksi) !!}
    {!! Form::hidden('Kode_Dosen',$Kode_Dosen) !!}

    <br>
    <div class="form-group">
        {!! Form::submit('Update',['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}


    {!! Form::open(array('url' => '/showcourse', 'class' => 'form-horizontal','method'=>'get')) !!}
    <div class="form-group">
        <button type="submit" class="btn btn-primary form-control"><b>Lihat Mata Kuliah</b></button>
    </div>
    {!! Form::close() !!}
@stop