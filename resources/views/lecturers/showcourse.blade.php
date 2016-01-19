@extends('layouts.masterdosen')
@section('content')
        <!-- Load waktu onload  -->
<script type="text/javascript" src="{!! asset('js/waktu.js') !!}"></script>
<body onload="waktu()">
<div class="row">
    <div class="col-lg-120">
        <h1 class="page-header" style="background-color:#222222; color:#DEDEDE; text-align:center">
            {!! HTML::image('./img/logo.jpg', 'alt', array( 'width' => 150, 'height' => 150 )) !!} ONLINE PRESENCE
            SYSTEM
        </h1>
        <h2 style="text-align:center">
            <small>:: Department of Mathematics, Faculty of Mathematics and Natural Science State University of
                Jakarta ::
            </small>
        </h2>
        </tr>
        <br>

        <!-- time content -->
        <br>
        <br>

        <h3><p class='text-center'>
                Hari, Tanggal :
                @inject('helpers', 'App\Helpers')
                {!! $helpers::indonesian_date() !!}
                <span id='output'></span> WIB
            </p>
        </h3>

                <!-- time content -->
        <br>
        <br>
        <!--<tr>-->
        <h3 style="text-align:center"> Daftar Courses </h3>
        <table width="800" align="center" border="1">
            <tr>
                <th width="20" style="text-align:center">Kode Mata Kuliah</th>
                <th width="20" style="text-align:center">Mata Kuliah</th>
                <th width="20" style="text-align:center">SKS</th>
                <th width="20" style="text-align:center">Program Studi</th>
                <th width="20" style="text-align:center">Day</th>
                <th width="20" style="text-align:center">Time</th>
                <th width="20" style="text-align:center">Course Start Date</th>
            </tr>
            @foreach($Courses as $course)
                <tr>
                    <?php $link= "/createcourse/tambahMatkul/".$course->Kode_Matkul?>
                    <td width="20" style="text-align:center"><a href={{$link}}>{!! $course->Kode_Matkul !!} </a></td>
                    <td width="20" style="text-align:center"> {{$course->Nama_Matkul}} </td>
                    <td width="20" style="text-align:center"> {{$course->SKS}} </td>
                    <td width="20" style="text-align:center"> {{$course->prodi->prodi}} </td>
                    <td width="20" style="text-align:center"> {{$course->day}} </td>
                    <td width="20" style="text-align:center"> {{$course->time}} </td>
                    <td width="20" style="text-align:center"> {{$course->course_start_day}} </td>
                </tr>
            @endforeach
        </table>
        <br>
        <br>
    </div>
</div>
@stop