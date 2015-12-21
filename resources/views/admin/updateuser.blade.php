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
<center>
    <h1 style="text-align:center">CREATE NEW USER</h1>
<table border="0"cellpadding="3" cellspacing="3"style="font-size:17px;width:350px;">
    <form method="post" action="">
        <tr>
            <td><b>&nbsp;Username&nbsp;</b></td><td><b>&nbsp;:&nbsp;</b></td>
            <td><input type="text" name=""></td>
        </tr>
        <tr>
            <td><b>&nbsp;Nama&nbsp;</b></td><td><b>&nbsp;:&nbsp;</b></td>
            <td><input type="text" name=""></td>
        </tr>
        <tr>
            <td class="animate4 bounceIn"><b>&nbsp;Role&nbsp;</b></td><td><b>&nbsp;:&nbsp;</b></td>
            <td><select id="role" name="role">
                    <option selected value = "Dosen">Dosen</option>
                    <option value = "Mahasiswa">Mahasiswa</option>
                </select> </td>
        <tr>

            <br />
    </form>
</table>
<br />
<button type="submit" value="Submit">Tambah</button>&nbsp;&nbsp;
<button type="reset" value="Reset">Reset</button>

<br />
<br />
<table width="699" border="1">
    <tr>
        <td width="158" rowspan="2"><div align="center"><strong><font face="Arial, Helvetica, sans-serif">Username</font></strong></div></td>
        <td width="200" rowspan="2"><div align="center"><strong><font face="Arial, Helvetica, sans-serif">Nama</font></strong></div></td>
        <td width="200" rowspan="2"><div align="center"><strong><font face="Arial, Helvetica, sans-serif">Role</font></strong></div></td>

        <td width="100" rowspan="2"><div align="center"><strong><font face="Arial, Helvetica, sans-serif">Hapus</font></strong></div></td>
        <td width="100" rowspan="2"><div align="center"><strong><font face="Arial, Helvetica, sans-serif">Edit</font></strong></div></td>
    </tr>
    <tr>


    <tr>
        <td style="text-align:center;">dindakhrsm</td>
        <td style="text-align:center;">Dinda Kharisma</td>
        <td style="text-align:center;">Mahasiswa</td>
        <td style="text-align:center;"><font color="#0000FF"><u>Hapus</u></font></td>
        <td style="text-align:center;"><font color="#0000FF"><u>Edit</u></font></td>
    </tr>
    <tr>
        <td style="text-align:center;">uklt</td>
        <td style="text-align:center;">Ummu Kultsum</td>
        <td style="text-align:center;">Mahasiswa</td>
        <td style="text-align:center;"><font color="#0000FF"><u>Hapus</u></font></td>
        <td style="text-align:center;"><font color="#0000FF"><u>Edit</u></font></td>
    </tr>
    <tr>
        <td style="text-align:center;">ghnarska</td>
        <td style="text-align:center;">Ghina Rosika Amalina</td>
        <td style="text-align:center;">Mahasiswa</td>
        <td style="text-align:center;"><font color="#0000FF"><u>Hapus</u></font></td>
        <td style="text-align:center;"><font color="#0000FF"><u>Edit</u></font></td>
    </tr>
    <tr>

        <td style="text-align:center;">febriami</td>
        <td style="text-align:center;">Tri Febriana Siami</td>
        <td style="text-align:center;">Mahasiswa</td>
        <td style="text-align:center;"><font color="#0000FF"><u>Hapus</u></font></td>
        <td style="text-align:center;"><font color="#0000FF"><u>Edit</u></font></td>
    </tr>
</table>
<p align="right">
</p>
</form>
    </center>
@stop
