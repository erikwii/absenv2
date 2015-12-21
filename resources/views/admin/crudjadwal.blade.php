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
            <h2 style="color:black; text-align:center">CREATE UPDATE DELETE JADWAL MATA KULIAH</h2>
            <br>

            <center>
<body>

<p align="right">
    <input name="Save" type="submit" id="Save" value="Save As To PDF" />
</p>
<form id="form1" name="form1" method="post" action="">
    <table width="600" border="1">
        <tr>
            <td colspan="3"><div align="center"><strong><font face="Arial, Helvetica, sans-serif">Kode</font></strong></div></td>
            <td width="43" rowspan="2"><div align="center"><strong><font face="Arial, Helvetica, sans-serif">Hari</font></strong></div></td>
            <td width="37" rowspan="2"><div align="center"><strong><font face="Arial, Helvetica, sans-serif">Jam</font></strong></div></td>
            <td width="63" rowspan="2"><div align="center"><strong><font face="Arial, Helvetica, sans-serif">Ruang</font></strong></div></td>
            <td width="160" rowspan="2"><div align="center"><strong><font face="Arial, Helvetica, sans-serif">Nama Mata Kuliah </font></strong></div></td>
            <td width="44" rowspan="2"><div align="center"><strong><font face="Arial, Helvetica, sans-serif">SKS</font></strong></div></td>
            <td width="163" rowspan="2"><div align="center"><strong><font face="Arial, Helvetica, sans-serif">Nama Dosen </font></strong></div></td>
            <td width="64" rowspan="2"><div align="center"><strong><font face="Arial, Helvetica, sans-serif">Update</font></strong></div></td>
            <td width="63" rowspan="2"><div align="center"><strong><font face="Arial, Helvetica, sans-serif">Delete</font></strong></div></td>
        </tr>
        <tr>
            <td width="59"><div align="center"><strong><font face="Arial, Helvetica, sans-serif">Seksi </font></strong></div></td>
            <td width="113"><div align="center"><strong><font face="Arial, Helvetica, sans-serif">Mata Kuliah</font></strong></div></td>
            <td width="85"><div align="center"><strong><font face="Arial, Helvetica, sans-serif">Dosen </font></strong></div></td>
        </tr>
        <tr>
            <td height="34" style="text-align:center;">3905</td>
            <td style="text-align:center;">3135-207-2</td>
            <td style="text-align:center;">0778</td>
            <td style="text-align:center;">2</td>
            <td style="text-align:center;">1</td>
            <td style="text-align:center;">5.12</td>
            <td style="text-align:center;">ETIKA PROFESI </td>
            <td style="text-align:center;">2</td>
            <td style="text-align:center;">FARIANI HERMIN </td>
            <td style="text-align:center;"><font color="#0000FF"><u>Update</u></font></td>
            <td style="text-align:center;"><font color="#0000FF"><u>Delete</u></font></td>
        </tr>
        <tr>
            <td height="34" style="text-align:center;">3916</td>
            <td style="text-align:center;">3135-209-3</td>
            <td style="text-align:center;">1098</td>
            <td style="text-align:center;">2</td>
            <td style="text-align:center;">4-5</td>
            <td style="text-align:center;">5.13</td>
            <td style="text-align:center;">PROBABILITAS TERAPAN </td>
            <td style="text-align:center;">3</td>
            <td style="text-align:center;">MULYONO</td>
            <td style="text-align:center;"><font color="#0000FF"><u>Update</u></font></td>
            <td style="text-align:center;"><font color="#0000FF"><u>Delete</u></font></td>
        </tr>
        <tr>
            <td height="34" style="text-align:center;">3901</td>
            <td style="text-align:center;">3135-202-3</td>
            <td style="text-align:center;">1374</td>
            <td style="text-align:center;">1</td>
            <td style="text-align:center;">2+</td>
            <td style="text-align:center;">5.12</td>
            <td style="text-align:center;">PENGANTAR KECERDASAN BUATAN </td>
            <td style="text-align:center;">3</td>
            <td style="text-align:center;">RIA ARAFIYAH</td>
            <td style="text-align:center;"><font color="#0000FF"><u>Update</u></font></td>
            <td style="text-align:center;"><font color="#0000FF"><u>Delete</u></font></td>
        </tr>
        <tr>
            <td height="34" style="text-align:center;">3902</td>
            <td style="text-align:center;">3135-203-3</td>
            <td style="text-align:center;">1400</td>
            <td style="text-align:center;">3</td>
            <td style="text-align:center;">3-4</td>
            <td style="text-align:center;">5.13</td>
            <td style="text-align:center;">STURKTUR DATA DAN ALGORITMA </td>
            <td style="text-align:center;">3</td>
            <td style="text-align:center;">MED IRZAL </td>
            <td style="text-align:center;"><font color="#0000FF"><u>Update</u></font></td>
            <td style="text-align:center;"><font color="#0000FF"><u>Delete</u></font></td>
        </tr>
        <tr>
            <td height="34" style="text-align:center;">3907</td>
            <td style="text-align:center;">3135-201-3</td>
            <td style="text-align:center;">1399</td>
            <td style="text-align:center;">2</td>
            <td style="text-align:center;">2+</td>
            <td style="text-align:center;">5.13</td>
            <td style="text-align:center;">ANALISIS NUMERIK </td>
            <td style="text-align:center;">3</td>
            <td style="text-align:center;">RATNA WIDYATI </td>
            <td style="text-align:center;"><font color="#0000FF"><u>Update</u></font></td>
            <td style="text-align:center;"><font color="#0000FF"><u>Delete</u></font></td>
        </tr>
    </table>
    <p align="right">
        <input name="Create New Mk" type="submit" id="Create New Mk" value="Create New MK" />
    </p>
</form>

</center>
</body>

@stop