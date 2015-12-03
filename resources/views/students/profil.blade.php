@extends('layouts.mastermhs')
@section('content')
    <div class="row">
        <div class="col-lg-120">

            <h1 class="page-header" style= "background-color:#222222; color:#DEDEDE; text-align:center">
                {!! HTML::image('./img/logo.jpg', 'alt', array( 'width' => 150, 'height' => 150 )) !!} ONLINE PRESENCE SYSTEM
            </h1>
            <h2 style= "text-align:center"><small>:: Department of Mathematics, Faculty of Mathematics and Natural Science State University of Jakarta :: </small></h2></tr>
            <br>
            </br>
            <h2 style="color:red; text-align:center">Welcome!</h2>

            <!-- time content -->
            <br>
            <br>
            <?php
            function indonesian_date ($timestamp = '', $date_format = 'l, j F Y', $suffix = 'Pukul') {
                if (trim ($timestamp) == '')
                {
                    $timestamp = time ();
                }
                elseif (!ctype_digit ($timestamp))
                {
                    $timestamp = strtotime ($timestamp);
                }
                # remove S (st,nd,rd,th) there are no such things in indonesia :p
                $date_format = preg_replace ("/S/", "", $date_format);
                $pattern = array (
                        '/Mon[^day]/','/Tue[^sday]/','/Wed[^nesday]/','/Thu[^rsday]/',
                        '/Fri[^day]/','/Sat[^urday]/','/Sun[^day]/','/Monday/','/Tuesday/',
                        '/Wednesday/','/Thursday/','/Friday/','/Saturday/','/Sunday/',
                        '/Jan[^uary]/','/Feb[^ruary]/','/Mar[^ch]/','/Apr[^il]/','/May/',
                        '/Jun[^e]/','/Jul[^y]/','/Aug[^ust]/','/Sep[^tember]/','/Oct[^ober]/',
                        '/Nov[^ember]/','/Dec[^ember]/','/January/','/February/','/March/',
                        '/April/','/June/','/July/','/August/','/September/','/October/',
                        '/November/','/December/',
                );
                $replace = array ( 'Sen','Sel','Rab','Kam','Jum','Sab','Min',
                        'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu',
                        'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des',
                        'Januari','Februari','Maret','April','Juni','Juli','Agustus','Sepember',
                        'Oktober','November','Desember',
                );
                $date = date ($date_format, $timestamp);
                $date = preg_replace ($pattern, $replace, $date);
                $date = "{$date} {$suffix}";
                return $date;
            }
            ?>

            <script type="text/javascript">
                // 1 detik = 1000
                window.setTimeout("waktu()",1000);
                function waktu() {
                    var tanggal = new Date();
                    setTimeout("waktu()",1000);
                    document.getElementById("output").innerHTML = tanggal.getHours()+":"+tanggal.getMinutes()+":"+tanggal.getSeconds();
                }
            </script>
            <body onload="waktu()">

            <?php

            $hariIni = date('Y-m-d');
            $bulanIni = date('m');

            echo "<center><h3> Hari, Tanggal : ".indonesian_date()." <span id='output'></span> WIB </center></h3>"


            ?>
                    <!-- time content -->
            <br>
            <br>

                <DT style="text-align: center; font: bold">Identitas Mahasiswa</DT>
<br>
            <table border="1" align="center" cellpadding="5" cellspacing="1" bordercolor="#000000">
                    <tr>
                        <td><b>&nbsp;Nomor Registrasi &nbsp;</b></td><td><b>&nbsp;:&nbsp;</b></td>
                        <td> &nbsp;3135136204&nbsp; </td>
                    </tr>
                    <tr>
                        <td><b>&nbsp;Nama Mahasiswa &nbsp;</b></td><td><b>&nbsp;:&nbsp;</b></td>
                        <td>&nbsp;Dinda Kharisma&nbsp;</td>
                </tr>
                <tr>
                    <td><b>&nbsp;Program Studi&nbsp; </b></td><td><b>&nbsp;:&nbsp;</b></td>
                    <td> &nbsp;Sistem Komputer&nbsp; </td>
                </tr>
                <tr>
                    <td><b> &nbsp;Semester &nbsp;</b></td><td><b>&nbsp;:&nbsp;</b></td>
                    <td>&nbsp;103&nbsp;</td>
                </tr>

            </table>
            </body>
            </html>

<br>
    </br>
@stop