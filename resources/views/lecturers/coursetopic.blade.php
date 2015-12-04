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
            <h2 style="color:black; text-align:center">Topik Perkuliahan</h2>
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
        <td><b>Tanggal </b><input type="date" name="bday" min="2000-01-02"></td>
        <br>
        <table border="1"cellpadding="8"style="font-size:17px;width:350px;">
            <form method="post" action="">
                <br>
                        <tr>
                            <td><b>&nbsp;Pokok Bahasan &nbsp;</b></td><td><b>&nbsp;:&nbsp;</b></td>
                            <td><input type="text" name=""></td>
                        </tr>
                        <tr>
                            <td><b>&nbsp;Jumlah Mahasiswa &nbsp;</b></td><td><b>&nbsp;:&nbsp;</b></td>
                            <td><input type="text" name=""></td>
                        </tr>

        </table>
        <br>
        <input type="submit" name="submit" value="Submit" />
        </center>

    @stop