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
            <!-- time content -->
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
            <center><h4 style="color:red; text-align:center">Mark your presence today: </h4>

                <table id="example" class="display" cellspacing="0" width="100%">
                    <tbody>
                    <tr>
                        <td><b>Tanggal </b><input type="date" name="bday" min="2000-01-02"></td>
                        <th>Pertemuan Ke <select size="1" id="pertemuan" name="pertemuan">
                                <option value="" selected="selected">
                                </option>
                                <option value="1">
                                    1
                                <option value="2">
                                    2
                                </option>
                                <option value="3">
                                    3
                                </option>
                                <option value="4">
                                    4
                                </option>
                                <option value="5">
                                    5
                                </option>
                                <option value="6">
                                    6
                                </option>
                                <option value="7">
                                    7
                                </option>
                                <option value="8">
                                    8
                                </option>
                                <option value="9">
                                    9
                                </option> <option value="10">
                                    10
                                </option>
                                <option value="11">
                                    11
                                </option>
                                <option value="12">
                                    12
                                </option>
                                <option value="13">
                                    13
                                </option> <option value="14">
                                    14
                                </option>
                                <option value="15">
                                    15
                                </option>
                                <option value="16">
                                    16
                                </option>

                            </select>
                        </th>


                        <br />
                        <br />
                        <table width="699" border="1">
                            <tr>
                                <td width="158" rowspan="2"><div align="center"><strong><font face="Arial, Helvetica, sans-serif">Kode Seksi</font></strong></div></td>
                                <td width="278" rowspan="2"><div align="center"><strong><font face="Arial, Helvetica, sans-serif">Nama Mata Kuliah </font></strong></div></td>
                                <td width="241" rowspan="2"><div align="center"><strong><font face="Arial, Helvetica, sans-serif">Kehadiran</font></strong></div></td>
                            </tr>
                            <tr>


                            <tr>
                                <td style="text-align:center;">3901</td>
                                <td style="text-align:center;">Analisis dan Perancangan Sistem </td>
                                <td style="text-align:center;"><button type="submit" value="Submit">submit</button></td>
                            </tr>
                            <tr>
                                <td style="text-align:center;">3902</td>
                                <td style="text-align:center;"> Pengolahan Citra </td>
                                <td style="text-align:center;"><button type="submit" value="Submit">submit</button></td>
                            </tr>
                            <tr>
                                <td style="text-align:center;">3903</td>
                                <td style="text-align:center;"> Jaringan Komputer </td>
                                <td style="text-align:center;"><button type="submit" value="Submit">submit</button></td>
                            </tr>
                            <tr>

                                <td style="text-align:center;">3904</td>
                                <td style="text-align:center;">Cryptography And Information Security </td>
                                <td style="text-align:center;"><button type="submit" value="Submit">submit</button></td>
                            </tr>
                            <td style="text-align:center;">3905</td>
                            <td style="text-align:center;">Interaksi Manusia dan Komputer </td>
                            <td style="text-align:center;"><button type="submit" value="Submit">submit</button></td>
                            </tr>
                        </table>
                        <p align="right">
                        </p>

        </center>
            <br>
    <br>
    <br>
    @stop