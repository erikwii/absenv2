@extends('layouts.mastermhs')
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
            <small>:: Department of Mathematics, Faculty of Mathematics and Natural Science State University of Jakarta
                ::
            </small>
        </h2>
        </tr>
        <br>
        </br>
        <h2 style="color:red; text-align:center">Welcome!</h2>

        <!-- time content -->
        <br>
        <br>

        <?php
        use App\Helpers;
        echo "<center><h3> Hari, Tanggal : " . Helpers::indonesian_date() . " <span id='output'></span> WIB </center></h3>"
        ?>
                <!-- time content -->
        <br>
        <br>

        <DT style="text-align: center; font: bold">Identitas Mahasiswa</DT>
        <br>
        <table border="1" align="center" cellpadding="5" cellspacing="1" bordercolor="#000000">
            <tr>
                <td><b>&nbsp;Nomor Registrasi &nbsp;</b></td>
                <td><b>&nbsp;:&nbsp;</b></td>
                <td> &nbsp;{{$noreg}}&nbsp; </td>
            </tr>
            <tr>
                <td><b>&nbsp;Nama Mahasiswa &nbsp;</b></td>
                <td><b>&nbsp;:&nbsp;</b></td>
                <td>&nbsp;{{$name}}&nbsp;</td>
            </tr>
            <tr>
                <td><b>&nbsp;Program Studi&nbsp; </b></td>
                <td><b>&nbsp;:&nbsp;</b></td>
                <td> &nbsp;Sistem Komputer&nbsp; </td>
            </tr>
            <tr>
                <td><b> &nbsp;Semester &nbsp;</b></td>
                <td><b>&nbsp;:&nbsp;</b></td>
                <td>&nbsp;103&nbsp;</td>
            </tr>

        </table>
        </div>
    </div>
</body>
</html>

<br>
</br>
@stop