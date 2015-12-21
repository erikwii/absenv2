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
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#datepicker").datepicker();
        });
    </script>
</head>

<body>
<center>
<h3 style="text-align:center">CREATE NEW COURSE</h3>
    <br>
<table border="0"cellpadding="3" cellspacing="3"style="font-size:17px;width:350px;">
    <form method="post" action="">
        <tr>
            <td><b>&nbsp;Course Name &nbsp;</b></td><td><b>&nbsp;:&nbsp;</b></td>
            <td><input type="text" name=""></td>
        </tr>
        <tr>
            <td class="animate4 bounceIn"><b>&nbsp;Prodi&nbsp;</b></td><td><b>&nbsp;:&nbsp;</b></td>
            <td><select id="prodi" name="prodi">
                    <option selected value = "Sistem Komputer">Sistem Komputer</option>
                    <option value = "Matematika">Matematika</option>
                    <option value = "Pendidikan Matematika">Pendidikan Matematika</option></select>
            </td>
        <tr>
            <td><b>&nbsp;Schedule &nbsp;</b></td><td><b>&nbsp;:&nbsp;</b></td>
            <td><label for="hari">Day</label>
                <select name="hari" id="keterangan">
                    <option value="Senin" selected="selected">Senin</option>
                    <option value="Selasa">Selasa</option>
                    <option value="Rabu">Rabu</option>
                    <option value="Kamis">Kamis</option><option value="Jumat">Jumat</option>
                </select><br />
                <label for="hari">Time</label>
                <select name="hari" id="hari">
                    <option value="0-1" selected="selected">0-1</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="2+">2+</option><option value="3">3</option>
                    <option value="4">3-4</option><option value="5">5</option>
                </select></td></tr>
        <tr>
            <td><b>Course Start Date &nbsp;</b></td><td><b>&nbsp;:&nbsp;</b></td>
            <td><input id="datepicker" /></td>
        </tr>
        <tr>
            <td>
                <input name="submit" type="button" value="Create Course" />
            </td></tr>

    </form>
</table>
    </center>
<br>
<br>
</body>
</html>
            @stop