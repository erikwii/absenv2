@extends('layouts.masteradmin')
@section('content')
    <div class="row">
        <div class="col-lg-120">

            <h1 class="page-header" style= "background-color:#222222; color:#DEDEDE; text-align:center">
                {!! HTML::image('./img/logo.jpg', 'alt', array( 'width' => 150, 'height' => 150 )) !!} ONLINE PRESENCE SYSTEM
            </h1>
            <h2 style= "text-align:center"><small>:: Department of Mathematics, Faculty of Mathematics and Natural Science State University of Jakarta :: </small></h2></tr>
            <br>
            </br>
            <h2 style="color:black; text-align:center">LIHAT ABSEN</h2>
            <br>

            <center>
<table id="example" class="display" cellspacing="0" width="100%">
    <tbody>
    <tr>
        <th>Kode Matkul: <select size="1" id="Kode Matkul" name="Kode Matkul">
                <option value="" selected="selected">
                </option>
                <option value="3901">
                    3901
                <option value="3902">
                    3902
                </option>
                <option value="3903">
                    3903
                </option>
                <option value="3904">
                    3904
                </option>
                <option value="3905">
                    3905
                </option>
                <option value="3906">
                    3906
                </option>
                <option value="3907">
                    3907
                </option>
                <option value="3908">
                    3908
                </option>
                <option value="3909">
                    3909
                </option>
            </select>
        </th>
        <th ALIGN="center">Pertemuan: <select size="1" id="Pertemuan" name="Pertemuan">
                <option value="" selected="selected">
                </option>
                <option value="01">
                    01
                <option value="02">
                    02
                </option>
                <option value="03">
                    03
                </option>
                <option value="04">
                    04
                </option>
                <option value="05">
                    05
                </option>
                <option value="06">
                    06
                </option>
                <option value="07">
                    07
                </option>
                <option value="08">
                    08
                </option>
                <option value="09">
                    09
                </option>
                <option value="10">
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
                </option>
                <option value="14">
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
    </tbody>
    <br>
    <table border="1"cellpadding="8"style="font-size:17px;width:350px;">
        <tbody>
        <tr>
            <td style-"background: #e0ffff;text-align:center;">NRM</td>
            <td style-"background: #e0ffff;text-align:center;">Nama Mahasiswa</td>
            <td style-"background: #e0ffff;text-align:center;">Keterangan</td>
        </tr>
        <tr>
            <td style="text-align:center;">3135136188</td>
            <td style="text-align:center;">Tri Febriana Siami</td>
            <td style="text-align:center;">Hadir</td>
        </tr>
        <tr>
            <td style="text-align:center;">3135136192</td>
            <td style="text-align:center;">Ummu Kultsum</td>
            <td style="text-align:center;">Hadir</td>
        </tr>
        <tr>
            <td style="text-align:center;">3135136193</td>
            <td style="text-align:center;">Hana Maulinda</td>
            <td style="text-align:center;">Hadir</td>
        </tr>
        <tr>
            <td style="text-align:center;">3135136194</td>
            <td style="text-align:center;">Dian Rakasiwi</td>
            <td style="text-align:center;">Hadir</td>
        </tr>
        <tr>
            <td style="text-align:center;">3135136196</td>
            <td style="text-align:center;">Mikael Yurubeli</td>
            <td style="text-align:center;">Hadir</td>
        </tr>
        <tr>
            <td style="text-align:center;">3135136197</td>
            <td style="text-align:center;">Muhammad Fachrizal</td>
            <td style="text-align:center;">Hadir</td>
        </tr>
        <tr>
            <td style="text-align:center;">3135136203</td>
            <td style="text-align:center;">Ghina Rosika Amalina</td>
            <td style="text-align:center;">Hadir</td>
        </tr>
        <tr>
            <td style="text-align:center;">3135136204</td>
            <td style="text-align:center;">Dinda Kharisma</td>
            <td style="text-align:center;">Hadir</td>
        </tr>
        <tr>
            <td style="text-align:center;">3135136205</td>
            <td style="text-align:center;">Annisa Mutiara Ditri</td>
            <td style="text-align:center;">Hadir</td>
        </tr>
        <tr>
            <td style="text-align:center;">3135136206</td>
            <td style="text-align:center;">Ghina Salsabila</td>
            <td style="text-align:center;">Hadir</td>
        </tr>
        <tr>
            <td style="text-align:center;">3135136208</td>
            <td style="text-align:center;">Alitinia Prastiantari</td>
            <td style="text-align:center;">Hadir</td>
        </tr>
        <tr>
            <td style="text-align:center;">3135136210</td>
            <td style="text-align:center;">M. Fakhri Ali Ibrahim</td>
            <td style="text-align:center;">Hadir</td>
        </tr>
        <tr>
            <td style="text-align:center;">3135136211</td>
            <td style="text-align:center;">Tiara Amelia</td>
            <td style="text-align:center;">Hadir</td>
        </tr>
        <tr>
            <td style="text-align:center;">3135136212</td>
            <td style="text-align:center;">Anantassa Fitri Andini</td>
            <td style="text-align:center;">Hadir</td>
        </tr>
        <tr>
            <td style="text-align:center;">3135136214</td>
            <td style="text-align:center;">Dimas Sartika</td>
            <td style="text-align:center;">Hadir</td>
        </tr>
        <tr>
            <td style="text-align:center;">3135136215</td>
            <td style="text-align:center;">Andrean Oktavianus</td>
            <td style="text-align:center;">Hadir</td>
        </tr>
        <tr>
            <td style="text-align:center;">3135136216</td>
            <td style="text-align:center;">Rahmi Putri</td>
            <td style="text-align:center;">Hadir</td>
        </tr>
        <tr>
            <td style="text-align:center;">3135136217</td>
            <td style="text-align:center;">Muhammad Reyhan Fahlevi</td>
            <td style="text-align:center;">Hadir</td>
        </tr>
        <tr>
            <td style="text-align:center;">3135136218</td>
            <td style="text-align:center;">Gregorius Andito Herjuno</td>
            <td style="text-align:center;">Hadir</td>
        </tr>
        <tr>
            <td style="text-align:center;">3135136221</td>
            <td style="text-align:center;">Khariza Nabilla A</td>
            <td style="text-align:center;">Hadir</td>
        </tr>
        <tr>
            <td style="text-align:center;">3135136222</td>
            <td style="text-align:center;">Pradika Gustiansyah</td>
            <td style="text-align:center;">Hadir</td>
        </tr>
        <tr>
            <td style="text-align:center;">3135136223</td>
            <td style="text-align:center;">Agustinus P.S.H</td>
            <td style="text-align:center;">Hadir</td>
        </tr>
        <tr>
            <td style="text-align:center;">3135136224</td>
            <td style="text-align:center;">Annisa Nursya</td>
            <td style="text-align:center;">Hadir</td>
        </tr>
        </tbody>
    </table>
    <table border="1"cellpadding="8"style="font-size:17px;width:350px;">
        <tbody>
        <tr>
            <br>
            <td style-"background: #e0ffff;text-align:"right";">Jumlah Mahasiswa: </td>
            <td style-"background: #e0ffff;text-align:center;">23</td>
    </center>
        @stop