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
        <th ALIGN="center">Ruang: <select size="1" id="Ruang" name="Ruang">
                <option value="5.01" selected="selected">
                </option>
                <option value="5.01">
                    5.01
                <option value="5.08">
                    5.08
                </option>
                <option value="5.10">
                    5.10
                </option>
                <option value="5.11">
                    5.11
                </option>
                <option value="5.12">
                    5.12
                </option>
                <option value="5.13">
                    5.13
                </option>
            </select>
        </th>
    </tr>
    </thead>
    </tbody>
    <table border="1"cellpadding="8"style="font-size:17px;width:350px;">
        <tbody>
        <tr>
            <td style-"background: #e0ffff;text-align:center;">Pertemuan Ke</td>
            <td style-"background: #e0ffff;text-align:center;">Tanggal</td>
            <td style-"background: #e0ffff;text-align:center;">NRM</td>
            <td style-"background: #e0ffff;text-align:center;">Kehadiran</td>
        </tr>
        <tr>
            <td style="text-align:center;">1</td>
            <td style="text-align:center;">08/11/12</td>
            <td style="text-align:center;">Tri Febriana Siami</td>
            <td style="text-align:center;">Hadir</td>
        </tr>
        <tr>
            <td style="text-align:center;"></td>
            <td style="text-align:center;"></td>
            <td style="text-align:center;"></td>
            <td style="text-align:center;"></td>
        </tr>
        <tr>
            <td style="text-align:center;"></td>
            <td style="text-align:center;"></td>
            <td style="text-align:center;"></td>
            <td style="text-align:center;"></td>
        </tr>
        <tr>
            <td style="text-align:center;"></td>
            <td style="text-align:center;"></td>
            <td style="text-align:center;"></td>
            <td style="text-align:center;"></td>
        </tr>
        </tbody>
    </table>
    <br>
    <td><align "right"><button type="button" form="my_form">Save As PDF</button></td>
    <br>
    </center>
    @stop
