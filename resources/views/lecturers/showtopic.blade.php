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

        <?php
        use App\Helpers;
        echo "<center><h3> Hari, Tanggal : " . Helpers::indonesian_date() . " <span id='output'></span> WIB </center></h3></span>"
        ?>
                <!-- time content -->
        <br>
        <br>
<!--<tr>-->
        <h3 style="text-align:center"> Daftar Topik Perkuliahan </h3>
<table width="120" align = "center" border ="1">
    <tr>
        <th width="20" style="text-align:center">NO</th>
        <th width="20" style="text-align:center">Pertemuan-Ke</th>
        <th width="20" style="text-align:center">Kode Mata Kuliah</th>
        <th width="20" style="text-align:center">Tanggal</th>
        <th width="20" style="text-align:center">Topik Pembahasan</th>
        <th width="20" style="text-align:center">Jumlah Mahasiswa</th>
    </tr>
    @foreach($Topic as $topics)
        <tr>
            <td width="20" style="text-align:center"> {{$topics->id_topik}} </td>
            <td width="20" style="text-align:center"> {{$topics->pertemuan_ke}} </td>
            <td width="20" style="text-align:center"> {{$topics->Kode_Matkul}} </td>
            <td width="20" style="text-align:center"> {{$topics->tanggal}} </td>
            <td width="20" style="text-align:center"> {{$topics->nama_topik}} </td>
            <td width="20" style="text-align:center"> {{$topics->jumlah_mhs}} </td>
        </tr>
        @endforeach
    </table>
    <br>
    <br>
</div>
</div>
@stop