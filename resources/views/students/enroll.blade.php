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
            <h2 style="color:black; text-align:center">TAMBAH MATA KULIAH</h2>
            <br>

            <center>

<p align="right">
</p>
<form id="form1" name="form1" method="post" action="">
    <div>
        Kode Seksi</div>
    <div>
        <input type="text" name="name" value="">
    </div>
    <br />
    <button type="submit" value="Submit">Tambah</button>&nbsp;&nbsp;
    <button type="reset" value="Reset">Reset</button>
    <br />
    <br />
    <table width="699" border="1">
        <tr>
            <td width="158" rowspan="2"><div align="center"><strong><font face="Arial, Helvetica, sans-serif">Kode Seksi</font></strong></div></td>
            <td width="278" rowspan="2"><div align="center"><strong><font face="Arial, Helvetica, sans-serif">Nama Mata Kuliah </font></strong></div></td>
            <td width="241" rowspan="2"><div align="center"><strong><font face="Arial, Helvetica, sans-serif">Hapus</font></strong></div></td>
        </tr>
        <tr>


        <tr>
            <td style="text-align:center;">3901</td>
            <td style="text-align:center;">Analisis dan Perancangan Sistem </td>
            <td style="text-align:center;"><font color="#0000FF"><u>Hapus</u></font></td>
        </tr>
        <tr>
            <td style="text-align:center;">3902</td>
            <td style="text-align:center;"> Pengolahan Citra </td>
            <td style="text-align:center;"><font color="#0000FF"><u>Hapus</u></font></td>
        </tr>
        <tr>
            <td style="text-align:center;">3903</td>
            <td style="text-align:center;"> Jaringan Komputer </td>
            <td style="text-align:center;"><font color="#0000FF"><u>Hapus</u></font></td>
        </tr>
        <tr>

            <td style="text-align:center;">3904</td>
            <td style="text-align:center;">Cryptography And Information Security </td>
            <td style="text-align:center;"><font color="#0000FF"><u>Hapus</u></font></td>
        </tr>
        <td style="text-align:center;">3905</td>
        <td style="text-align:center;">Interaksi Manusia dan Komputer </td>
        <td style="text-align:center;"><font color="#0000FF"><u>Hapus</u></font></td>
        </tr>
    </table>
    <p align="right">
    </p>
</form>
</center>
    <br>
    <br>
@stop