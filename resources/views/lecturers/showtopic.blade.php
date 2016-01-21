@extends('layouts.masterdosen')
@section('content')
        <!-- Load waktu onload  -->
<script type="text/javascript" src="{!! asset('js/waktu.js') !!}"></script>
<body onload="waktu()">
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
    </tr>
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
    <h3 style="text-align:center"> Daftar Topik Perkuliahan </h3>
    <div class="col-md-1"></div>
    <div class="col-md-10">
    <table class="table table-responsive table-striped table-hover">
        <thead>
        <tr>
            <th>Pertemuan-Ke</th>
            <th>Kode Mata Kuliah</th>
            <th>Tanggal</th>
            <th>Topik Pembahasan</th>
            <th>Jumlah Mahasiswa</th>
        </tr>
        </thead>
        <tbody>
        @foreach($Topic as $topics)
            <tr>
                <td> {{$topics->pertemuan_ke}} </td>
                <td> {{$topics->Kode_Matkul}} </td>
                <td> {{$topics->tanggal}} </td>
                <td> {{$topics->nama_topik}} </td>
                <td> {{$topics->jumlah_mhs}} </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    <br>
    <br>
</div>
@stop