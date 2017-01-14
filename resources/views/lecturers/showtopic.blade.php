@extends('layouts.masterdosen')
@section('content')
{!! Html::script('ajax-response-student.jsudent.js') !!}

    <h1 class="page-header" style="background-color:#222222; color:#DEDEDE; text-align:center">
        {!! Html::image('./img/logo.jpg', 'alt', array( 'width' => 150, 'height' => 150 )) !!} ONLINE PRESENCE
        SYSTEM
    </h1>
    <h2 style="text-align:center">
        <small>:: Department of Mathematics, Faculty of Mathematics and Natural Science State University of
            Jakarta ::
        </small>
    </h2>
    <br>

    <!-- time content -->
    <h5><p class='text-center'>
            Hari, Tanggal :
            @inject('helpers', 'App\Helpers')
            {!! $helpers::indonesian_date() !!}
            <span id='output'></span> WIB
        </p>
    </h5>
    <!-- time content -->

    <h3 style="text-align:center"> Kode Mata Kuliah </h3>
        @if(!empty($Courses))
        {!! Form::label('matkul','Mata Kuliah',['class' => "control-label col-sm-6"]) !!}

        {!! Form::open(array('url' => '/coursetopic', 'class' => 'form-horizontal')) !!}
        <div class="form-group center-block">
        <div class="col-sm-2">
            @if(isset($course_id))
                {!! Form::select('course_id', $Courses, $course_id,['class' => 'form-control','id'=>'changeStatus']) !!}
            @else
                {!! Form::select('course_id', $Courses, null,['class' => 'form-control','id'=>'changeStatus']) !!}
            @endif
        </div>
            {!! form::close() !!}
        </div>
        @else
            <div class="row">
            <div class="col-sm-2 col-md-2">
            </div>
                <div class="col-sm-8 col-md-8">
                <div class="alert alert-danger">
                    <strong>No data!</strong> This lecturers does not teach any class.
                </div>
            <div class="col-sm-2 col-md-2   "></div>
        @endif


    <!-- Not used here-->
    <div id="ajaxResponse"></div>

    <h3 style="text-align:center"> Daftar Topik Perkuliahan </h3>
    <!-- Put filter box here -->

    <div class="col-md-1"></div>
    <div class="col-md-10">
        <table class="table table-responsive table-striped table-hover">
            <thead>
            <tr>
                <th>Pertemuan-Ke</th>
                <th>Nama Mata Kuliah</th>
                <th>Tanggal</th>
                <th>Topik Pembahasan</th>
                <th>Jumlah Mahasiswa</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($Topic as $topics)
                <tr>
                    <td> {{$topics->pertemuan_ke}} </td>
                    <td> {{$topics->Nama_Matkul}} </td>
                    <td> {{$topics->tanggal}} </td>
                    <td> {{$topics->nama_topik}} </td>
                    <td> {{$topics->jumlah_mhs}} </td>
                    <?php $link = "/coursetopic/" . $topics->id_topik?>
                    <td><a href={!! $link !!}>Edit</a>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <br>
    <br>
@stop