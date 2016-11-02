@extends('layouts.masteradmin')
@section('content')
    <!-- Load waktu onload  -->
    <h1 class="page-header" style="background-color:#222222; color:#DEDEDE; text-align:center">
        {!! HTML::image('./img/logo.jpg', 'alt', array( 'width' => 150, 'height' => 150 )) !!} ONLINE PRESENCE
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

    <!--<tr>-->
    <h3 style="text-align:center"> Daftar Courses </h3>
    {!! Form::open(array('url' => '/crudjadwal', 'class' => 'form-horizontal')) !!}
    <div class="row form-group">
        {{--<div class="col-md-2 col-md-2"></div>--}}
        <div class="col-md-5 col-sm-2"></div>
        <div class="col-md-2 col-sm-2">
            <label for="Semester">Semester</label>
            {!! Form::select('Semester', $kalender_options, $semester_id,['class' => 'form-control','id'=>'changeStatus']) !!}
        </div>
    </div>
    <div class="row">
        {{--<div class="col-md-2 col-md-2"></div>--}}
        <div class="col-md-5 col-sm-2"></div>
        <div class="col-md-2 col-sm-2">
                {!! Form::submit('Check',['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}
    <div class="row">
        <div class="col-md-1 col-sm-1"></div>
        <div class="col-md-10 col-sm-10">
            <table class="table table-responsive table-striped table-hover">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Kode Seksi</th>
                    <th>Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Program Studi</th>
                    <th>Day</th>
                    <th>Time</th>
                    <th>Room</th>
                    <th>Kode Dosen</th>
                    <th>Action</th>

                </tr>
                </thead>
                <tbody>
                @foreach($Courses as $course)
                    <tr>
                        <td>{!! $course->seksi !!}</td>
                        <td>{!! $course->Kode_Matkul !!}</td>
                        <td>{!! $course->Nama_Matkul !!}</td>
                        <td>{!! $course->SKS !!}</td>
                        <td>{!! $course->prodi->prodi !!}</td>
                        <td>{!! $course->day !!}</td>
                        <td>{!! $course->waktuKuliah->kode_waktu !!}</td>
                        <td>{!! $course->room->nama_ruang !!}</td>
                        <td>{!! $course->lecturer->Nama_Dosen !!}</td>
                        <?php $course_data = array("id" => $course->seksi, "Kode_Matkul" => $course->Kode_Matkul, "Nama_Matkul" => $course->Nama_Matkul,"SKS"=>$course->SKS,"prodi_id"=>$course->prodi_id,"day"=>$course->day,"time"=>$course->time,"Kode_Dosen"=>$course->Kode_Dosen,"id_ruang"=>$course->id_ruang)?>
                        <td>
                            <button type="button" class="btn btn-link edit-btn" data-toggle="modal"
                                    data-target="#myModal" data-id={!! '\''.json_encode($course_data).'\'' !!}>Edit
                            </button>
                            <button type="button" class="btn btn-link delete-btn" data-toggle="modal"
                                    data-target="#deleteModal" data-id={!! '\''.json_encode($course_data).'\'' !!}>Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {!! Form::open(array('url' => '/addjadwal', 'class' => 'form-horizontal')) !!}
    <div class="form-group">
        <button type="submit" class="btn btn-primary form-control"><b>Add Course Schedule</b></button>
    </div>
    {!! Form::close() !!}

    {{--<div class="row">
        <div class="col-md-2 col-sm-2"></div>
        <div class="col-md-1 col-sm-1">
            <a href="/addjadwal" class="btn btn-primary" role="button">
                Add Course Schedule
            </a>
        </div>
    </div>--}}
    <br>
    <br>
@stop