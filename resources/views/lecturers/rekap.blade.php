@extends('layouts.masterdosen')
@section('content')
    <div class="row">
        <div class="col-lg-120">

            <h1 class="page-header" style= "background-color:#222222; color:#DEDEDE; text-align:center">
                {!! HTML::image('./img/logo.jpg', 'alt', array( 'width' => 150, 'height' => 150 )) !!} ONLINE PRESENCE SYSTEM
            </h1>
            <h2 style= "text-align:center"><small>:: Department of Mathematics, Faculty of Mathematics and Natural Science State University of Jakarta :: </small></h2></tr>
            <br>
            </br>
            <h2 style="color:black; text-align:center">Rekapitulasi Absen</h2>
            <br>

            <center>
<table id="example" class="display" cellspacing="0" width="100%">
    <tbody>
    <tr>
        <th>Kode Dosen: <select size="1" id="Kode Dosen" name="Kode Dosen">
                <option value="56201" selected="selected">
                </option>
                <option value="56201">
                    56201
                <option value="56202">
                    56202
                </option>
                <option value="56203">
                    56203
                </option>
                <option value="56204">
                    56204
                </option>
                <option value="56205">
                    56205
                </option>
            </select>
        </th>
        <th ALIGN="center">semester: <select size="1" id="Semester" name="Semester">
                <option value="099" selected="selected">
                </option>
                <option value="099">
                    099
                <option value="100">
                    100
                </option>
                <option value="102">
                    102
                </option>
                <option value="103">
                    103
                </option>
                <option value="104">
                    104
                </option>
            </select>
        </th>
        <th ALIGN="center">Kode Matakuliah: <select size="1" id="Kode Matakuliah" name="Kode Matakuliah">
                <option value="3903" selected="selected">
                </option>
                <option value="3903">
                    3903
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
            </select>
        </th>
    </tr>
    <th bgcolor="#CCCCCC"> Rekap Absen Kelas</th>
    </tr>
    <th> Nama Dosen: <input type="text" name="company" form="my_form"></th></td>
    <br>
    <td align "right"><button type="button" form="my_form">Save As PDF</button></td>
<br>
    </thead>
    </tbody>

    <table border="1"cellpadding="8"style="font-size:17px;width:350px;">
        <tbody>
        <tr>
            <td style-"background: #e0ffff;text-align:center;">#</td>
            <td style-"background: #e0ffff;text-align:center;">NRM</td>
            <td style-"background: #e0ffff;text-align:center;">Nama Mahasiswa</td>
            <td style-"background: #e0ffff;text-align:center;">Hadir</td>
            <td style-"background: #e0ffff;text-align:center;">Tidak Hadir</td>
        </tr>
        <tr>
            <td style="text-align:center;">1</td>
            <td style="text-align:center;">3135136188</td>
            <td style="text-align:center;">Tri Febriana Siami</td>
            <td style="text-align:center;">16</td>
            <td style="text-align:center;">0</td>
        </tr>
        <tr>
            <td style="text-align:center;">2</td>
            <td style="text-align:center;">3135136192</td>
            <td style="text-align:center;">Ummu Kultsum</td>
            <td style="text-align:center;">13</td>
            <td style="text-align:center;">3</td>
        </tr>
        <tr>
            <td style="text-align:center;">3</td>
            <td style="text-align:center;">3135136203</td>
            <td style="text-align:center;">Ghina Rosika Amalina</td>
            <td style="text-align:center;">14</td>
            <td style="text-align:center;">2</td>
        </tr>
        <tr>
            <td style="text-align:center;">4</td>
            <td style="text-align:center;">3135136204</td>
            <td style="text-align:center;">Dinda Kharisma</td>
            <td style="text-align:center;">16</td>
            <td style="text-align:center;">0</td>
        </tr>
        </tbody>
    </table>
    <br>
    <center>
@stop