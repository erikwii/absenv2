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
            <center>
                <h2>My Presence </h2>
                <br>
                <table width="584" border="1" cellpadding="2" cellspacing="2">

                    <tr>
                        <td><b>Pertemuan ke-</b></td>
                        <td>&nbsp;</td>
                        <td><table width="387" style=" border:thin; padding-top:50px; padding-right:30px; padding-bottom:50px; padding-left:80px">
                                <tr>
                                    <td width="24"><center>1</center></td>
                                    <td width="24"><center>2</center></td>
                                    <td width="24"><center>3</center></td>
                                    <td width="24"><center>4</center></td>
                                    <td width="24"><center>5</center></td>
                                    <td width="24"><center>6</center></td>
                                    <td width="24"><center>7</center></td>
                                    <td width="24"><center>8</center></td>
                                    <td width="24"><center>9</center></td>
                                    <td width="24"><center>10</center></td>
                                    <td width="24"><center>11</center></td>
                                    <td width="24"><center>12</center></td>
                                    <td width="24"><center>13</center></td>
                                    <td width="24"><center>14</center></td>
                                    <td width="24"><center>15</center></td>
                                    <td width="24"><center>16</center></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td width="122">Analisis dan Perancangan Sistem</td>
                        <td width="59"><input name="isiAbsen" type="button" value="Absen" /></td>
                        <td width="387">
                            <input name="p1" type="checkbox" value="p1" checked="checked" />&nbsp;&nbsp;
                            <input name="p2" type="checkbox" value="p2"/>&nbsp;
                            <input name="p3" type="checkbox" value="p3" checked="checked" />&nbsp;&nbsp;
                            <input name="p4" type="checkbox" value="p4" checked="checked" />&nbsp;&nbsp;
                            <input name="p5" type="checkbox" value="p5" checked="checked" />&nbsp;&nbsp;
                            <input name="p6" type="checkbox" value="p6" checked="checked" />&nbsp;&nbsp;
                            <input name="p7" type="checkbox" value="p7" checked="checked" />&nbsp;&nbsp;
                            <input name="p8" type="checkbox" value="p8" checked="checked" />&nbsp;&nbsp;
                            <input name="p9" type="checkbox" value="p9" checked="checked" />&nbsp;&nbsp;
                            <input name="p10" type="checkbox" value="p10"/>&nbsp;&nbsp;
                            <input name="p11" type="checkbox" value="p11" checked="checked" />&nbsp;&nbsp;
                            <input name="p12" type="checkbox" value="p12" checked="checked" />&nbsp;&nbsp;
                            <input name="p13" type="checkbox" value="p13"/>&nbsp;&nbsp;
                            <input name="p14" type="checkbox" value="p14"/>&nbsp;&nbsp;
                            <input name="p15" type="checkbox" value="p15"/>&nbsp;&nbsp;
                            <input name="p16" type="checkbox" value="p16"/></td>
                    </tr>
                    <tr>
                        <td>Pengolahan Citra</td>
                        <td width="59"><input name="isiAbsen" type="button" value="Absen" /></td>
                        <td width="387">
                        <input name="p1" type="checkbox" value="p1" checked="checked" />&nbsp;&nbsp;
                        <input name="p2" type="checkbox" value="p2" checked="checked" />&nbsp;&nbsp;
                        <input name="p3" type="checkbox" value="p3" checked="checked" />&nbsp;&nbsp;
                        <input name="p4" type="checkbox" value="p4"/>&nbsp;&nbsp;
                        <input name="p5" type="checkbox" value="p5" checked="checked" />&nbsp;&nbsp;
                        <input name="p6" type="checkbox" value="p6" checked="checked" />&nbsp;&nbsp;
                        <input name="p7" type="checkbox" value="p7"/>&nbsp;&nbsp;
                        <input name="p8" type="checkbox" value="p8" checked="checked" />&nbsp;&nbsp;
                        <input name="p9" type="checkbox" value="p9" checked="checked" />&nbsp;&nbsp;
                        <input name="p10" type="checkbox" value="p10" checked="checked" />&nbsp;&nbsp;
                        <input name="p11" type="checkbox" value="p11" checked="checked" />&nbsp;&nbsp;
                        <input name="p12" type="checkbox" value="p12" checked="checked" />&nbsp;&nbsp;
                        <input name="p13" type="checkbox" value="p13"/>&nbsp;&nbsp;
                        <input name="p14" type="checkbox" value="p14"/>&nbsp;&nbsp;
                        <input name="p15" type="checkbox" value="p15"/>&nbsp;&nbsp;
                        <input name="p16" type="checkbox" value="p16"/>&nbsp;&nbsp;
                        </td>
                    </tr>

                    <tr>
                        <td>Jaringan Komputer</td>
                        <td width="59"><input name="isiAbsen" type="button" value="Absen" /></td>
                        <td width="387">
                            <input name="p1" type="checkbox" value="p1" checked="checked" />&nbsp;&nbsp;
                            <input name="p2" type="checkbox" value="p2" checked="checked" />&nbsp;&nbsp;
                            <input name="p3" type="checkbox" value="p3" checked="checked" />&nbsp;&nbsp;
                            <input name="p4" type="checkbox" value="p4"/>&nbsp;&nbsp;
                            <input name="p5" type="checkbox" value="p5" checked="checked" />&nbsp;&nbsp;
                            <input name="p6" type="checkbox" value="p6" checked="checked" />&nbsp;&nbsp;
                            <input name="p7" type="checkbox" value="p7" checked="checked"/>&nbsp;&nbsp;
                            <input name="p8" type="checkbox" value="p8" checked="checked" />&nbsp;&nbsp;
                            <input name="p9" type="checkbox" value="p9" checked="checked" />&nbsp;&nbsp;
                            <input name="p10" type="checkbox" value="p10" checked="checked" />&nbsp;&nbsp;
                            <input name="p11" type="checkbox" value="p11" checked="checked" />&nbsp;&nbsp;
                            <input name="p12" type="checkbox" value="p12" checked="checked" />&nbsp;&nbsp;
                            <input name="p13" type="checkbox" value="p13" />&nbsp;&nbsp;
                            <input name="p14" type="checkbox" value="p14"/>&nbsp;&nbsp;
                            <input name="p15" type="checkbox" value="p15"/>&nbsp;&nbsp;
                            <input name="p16" type="checkbox" value="p16"/>&nbsp;&nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td>Cryptography and Information Security</td>
                        <td><input name="isiAbsen3" type="button" value="Absen" /></td>
                        <td width="387">
                            <input name="p1" type="checkbox" value="p1" checked="checked" />&nbsp;&nbsp;
                            <input name="p2" type="checkbox" value="p2" checked="checked" />&nbsp;&nbsp;
                            <input name="p3" type="checkbox" value="p3" checked="checked" />&nbsp;&nbsp;
                            <input name="p4" type="checkbox" value="p4" checked="checked" />&nbsp;&nbsp;
                            <input name="p5" type="checkbox" value="p5" checked="checked" />&nbsp;&nbsp;
                            <input name="p6" type="checkbox" value="p6" checked="checked" />&nbsp;&nbsp;
                            <input name="p7" type="checkbox" value="p7"/>&nbsp;&nbsp;
                            <input name="p8" type="checkbox" value="p8" checked="checked" />&nbsp;&nbsp;
                            <input name="p9" type="checkbox" value="p9" checked="checked" />&nbsp;&nbsp;
                            <input name="p10" type="checkbox" value="p10" checked="checked" />&nbsp;&nbsp;
                            <input name="p11" type="checkbox" value="p11" checked="checked" />&nbsp;&nbsp;
                            <input name="p12" type="checkbox" value="p12" checked="checked" />&nbsp;&nbsp;
                            <input name="p13" type="checkbox" value="p13"/>&nbsp;&nbsp;
                            <input name="p14" type="checkbox" value="p14"/>&nbsp;&nbsp;
                            <input name="p15" type="checkbox" value="p15"/>&nbsp;&nbsp;
                            <input name="p16" type="checkbox" value="p16"/>&nbsp;&nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td>Interaksi Manusia dan Komputer</td>
                        <td><input name="isiAbsen4" type="button" value="Absen" /></td>
                        <td width="387">
                            <input name="p1" type="checkbox" value="p1" checked="checked" />&nbsp;&nbsp;
                            <input name="p2" type="checkbox" value="p2" checked="checked" />&nbsp;&nbsp;
                            <input name="p3" type="checkbox" value="p3"/>&nbsp;&nbsp;
                            <input name="p4" type="checkbox" value="p4" checked="checked" />&nbsp;&nbsp;
                            <input name="p5" type="checkbox" value="p5" checked="checked" />&nbsp;&nbsp;
                            <input name="p6" type="checkbox" value="p6" checked="checked" />&nbsp;&nbsp;
                            <input name="p7" type="checkbox" value="p7" checked="checked" />&nbsp;&nbsp;
                            <input name="p8" type="checkbox" value="p8" checked="checked" />&nbsp;&nbsp;
                            <input name="p9" type="checkbox" value="p9" checked="checked" />&nbsp;&nbsp;
                            <input name="p10" type="checkbox" value="p10" checked="checked" />&nbsp;&nbsp;
                            <input name="p11" type="checkbox" value="p11" checked="checked" />&nbsp;&nbsp;
                            <input name="p12" type="checkbox" value="p12" checked="checked" />&nbsp;&nbsp;
                            <input name="p13" type="checkbox" value="p13"/>&nbsp;&nbsp;
                            <input name="p14" type="checkbox" value="p14"/>&nbsp;&nbsp;
                            <input name="p15" type="checkbox" value="p15"/>&nbsp;&nbsp;
                            <input name="p16" type="checkbox" value="p16"/>&nbsp;&nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td>Manajemen Keamanan Informasi</td>
                        <td><input name="isiAbsen5" type="button" value="Absen" /></td>
                        <td width="387">
                            <input name="p1" type="checkbox" value="p1" checked="checked" />&nbsp;&nbsp;
                            <input name="p2" type="checkbox" value="p2" checked="checked" />&nbsp;&nbsp;
                            <input name="p3" type="checkbox" value="p3" checked="checked" />&nbsp;&nbsp;
                            <input name="p4" type="checkbox" value="p4" checked="checked" />&nbsp;&nbsp;
                            <input name="p5" type="checkbox" value="p5" checked="checked" />&nbsp;&nbsp;
                            <input name="p6" type="checkbox" value="p6" checked="checked" />&nbsp;&nbsp;
                            <input name="p7" type="checkbox" value="p7" checked="checked" />&nbsp;&nbsp;
                            <input name="p8" type="checkbox" value="p8" checked="checked" />&nbsp;&nbsp;
                            <input name="p9" type="checkbox" value="p9" checked="checked" />&nbsp;&nbsp;
                            <input name="p10" type="checkbox" value="p10" checked="checked" />&nbsp;&nbsp;
                            <input name="p11" type="checkbox" value="p11" checked="checked" />&nbsp;&nbsp;
                            <input name="p12" type="checkbox" value="p12" checked="checked" />&nbsp;&nbsp;
                            <input name="p13" type="checkbox" value="p13"/>&nbsp;&nbsp;
                            <input name="p14" type="checkbox" value="p14"/>&nbsp;&nbsp;
                            <input name="p15" type="checkbox" value="p15"/>&nbsp;&nbsp;
                            <input name="p16" type="checkbox" value="p16"/>&nbsp;&nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td>Metode Penelitian</td>
                        <td><input name="isiAbsen6" type="button" value="Absen" /></td>
                        <td width="387">
                            <input name="p1" type="checkbox" value="p1" checked="checked" />&nbsp;&nbsp;
                            <input name="p2" type="checkbox" value="p2" checked="checked" />&nbsp;&nbsp;
                            <input name="p3" type="checkbox" value="p3" checked="checked" />&nbsp;&nbsp;
                            <input name="p4" type="checkbox" value="p4" checked="checked" />&nbsp;&nbsp;
                            <input name="p5" type="checkbox" value="p5" checked="checked" />&nbsp;&nbsp;
                            <input name="p6" type="checkbox" value="p6" checked="checked" />&nbsp;&nbsp;
                            <input name="p7" type="checkbox" value="p7" checked="checked" />&nbsp;&nbsp;
                            <input name="p8" type="checkbox" value="p8" checked="checked" />&nbsp;&nbsp;
                            <input name="p9" type="checkbox" value="p9" checked="checked" />&nbsp;&nbsp;
                            <input name="p10" type="checkbox" value="p10" checked="checked" />&nbsp;&nbsp;
                            <input name="p11" type="checkbox" value="p11" checked="checked" />&nbsp;&nbsp;
                            <input name="p12" type="checkbox" value="p12" checked="checked" />&nbsp;&nbsp;
                            <input name="p13" type="checkbox" value="p13"/>&nbsp;&nbsp;
                            <input name="p14" type="checkbox" value="p14"/>&nbsp;&nbsp;
                            <input name="p15" type="checkbox" value="p15"/>&nbsp;&nbsp;
                            <input name="p16" type="checkbox" value="p16"/>&nbsp;&nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td>Komunikasi Data</td>
                        <td><input name="isiAbsen7" type="button" value="Absen" /></td>
                        <td width="387">
                            <input name="p1" type="checkbox" value="p1" checked="checked" />&nbsp;&nbsp;
                            <input name="p2" type="checkbox" value="p2" checked="checked" />&nbsp;&nbsp;
                            <input name="p3" type="checkbox" value="p3" checked="checked" />&nbsp;&nbsp;
                            <input name="p4" type="checkbox" value="p4"/>&nbsp;&nbsp;
                            <input name="p5" type="checkbox" value="p5" checked="checked" />&nbsp;&nbsp;
                            <input name="p6" type="checkbox" value="p6" checked="checked" />&nbsp;&nbsp;
                            <input name="p7" type="checkbox" value="p7" checked="checked" />&nbsp;&nbsp;
                            <input name="p8" type="checkbox" value="p8" checked="checked" />&nbsp;&nbsp;
                            <input name="p9" type="checkbox" value="p9" checked="checked" />&nbsp;&nbsp;
                            <input name="p10" type="checkbox" value="p10" checked="checked" />&nbsp;&nbsp;
                            <input name="p11" type="checkbox" value="p11" checked="checked" />&nbsp;&nbsp;
                            <input name="p12" type="checkbox" value="p12" checked="checked" />&nbsp;&nbsp;
                            <input name="p13" type="checkbox" value="p13"/>&nbsp;&nbsp;
                            <input name="p14" type="checkbox" value="p14"/>&nbsp;&nbsp;
                            <input name="p15" type="checkbox" value="p15"/>&nbsp;&nbsp;
                            <input name="p16" type="checkbox" value="p16"/>&nbsp;&nbsp;
                        </td>
                    </tr>
                    <tr>

                </table>

        </center>
            <br>
    <br>
    <br>
    @stop