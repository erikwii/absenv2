@extends('layouts.masterdosen')
@section('content')
        <!-- Load waktu onload  -->
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

    <br>

    <!-- time content -->
    <br>
    <br>

    <h5><p class='text-center'>
            Hari, Tanggal :
            @inject('helpers', 'App\Helpers')
            {!! $helpers::indonesian_date() !!}
            <span id='output'></span> WIB
        </p>
    </h5>

    <!-- time content -->
    <br>
    <br>
    <!--<tr>-->
    <h3 style="text-align:center"> Daftar Courses </h3>
    <div class="row">
        <div class="col-md-1 col-sm-1"></div>
        <div class="col-md-10 col-sm-10">
            <table class="table table-responsive table-striped table-hover">
                <thead>
                <tr>
                    <th>Kode Seksi</th>
                    <th>Kode Mata Kuliah</th>
                    <th>Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Program Studi</th>
                    <th>Day</th>
                    <th>Time</th>
                    <th>Room</th>
                    <th>Course Start Date</th>
                </tr>
                </thead>
                <tbody>
                @foreach($Courses as $course)
                    <tr>
                        <?php $link = "/createcourse/tambahMatkul/" . $course->seksi?>
                        <td><a href={!! $link !!}>{!! $course->seksi !!}</a></td>
                        <td> {!! $course->Kode_Matkul !!}</td>
                        <td> {{$course->Nama_Matkul}} </td>
                        <td> {{$course->SKS}} </td>
                        <td> {{$course->prodi->prodi}} </td>
                        <td> {{$course->day}} </td>
                        <td> {{$course->waktuKuliah->kode_waktu}} </td>
                        <td> {!! $course->room->nama_ruang !!} </td>
                        <td> {{$course->course_start_day}} </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <br>
    <br>
</div>
@stop