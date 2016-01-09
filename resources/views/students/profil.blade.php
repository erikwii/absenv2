@extends('layouts.mastermhs')
@section('content')
        <!-- Load waktu onload  -->
<script type="text/javascript" src="{!! asset('js/waktu.js') !!}"></script>
<style>

    h3 {
        font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        font-size: 1.0em;
        line-height: 1.5em;
        letter-spacing: -0.05em;
        margin-bottom: 20px;
        padding: .1em 0;
        color: #444;
        position: relative;
        overflow: hidden;
        white-space: nowrap;
        text-align: center;
    }
    h3:before,
    h3:after {
        content: "";
        position: relative;
        display: inline-block;
        width: 50%;
        height: 1px;
        vertical-align: middle;
        background: #f0f0f0;
    }
    h3:before {
        left: -.5em;
        margin: 0 0 0 -50%;
    }
    h3:after {
        left: .5em;
        margin: 0 -50% 0 0;
    }
    h3 > span {
        display: inline-block;
        vertical-align: middle;
        white-space: normal;
    }
    p {
        display: block;
        font-size: 0.8em;
        line-height: 1.0em;
        margin-bottom: 18px;
        color: #555;
    }
    #w {
        display: block;
        width: 500px;
        margin: 0 auto;
        padding-top: 5px;
        padding-bottom: 5px;
    }
    #content {
        display: block;
        width: 100%;
        background: #fff;
        padding: 25px 20px;
        padding-bottom: 35px;
        -webkit-box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 2px 0px;
        -moz-box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 2px 0px;
        box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 2px 0px;
    }
    .activity {
        border-bottom: 1px solid #d6d1af;
        padding-bottom: 4px;
    }
</style>
<body onload="waktu()">
<div class="row">
    <div class="col-lg-120">
        <h1 class="page-header" style= "background-color:#222222; color:#DEDEDE; text-align:center">
            {!! HTML::image('./img/logo.jpg', 'alt', array( 'width' => 150, 'height' => 150 )) !!} ONLINE PRESENCE
            SYSTEM
        </h1>
        <h2 style="text-align:center">
            <small>:: Department of Mathematics, Faculty of Mathematics and Natural Science State University of Jakarta
                ::
            </small>
        </h2>
        <h2 style="color:red; text-align:center">Welcome!</h2>

        <!-- time content -->

        <?php
        use App\Helpers;
        echo "<center><h3> Hari, Tanggal : " . Helpers::indonesian_date() . " <span id='output'></span> WIB </center></h3>"
        ?>
                <!-- time content -->
        <div id="w">
            <div id="content" class="clearfix">

                <h3>Identitas Mahasiswa</h3>

                <section id="activity">


                    <p class="activity"><td><b>&nbsp;Nomor Registrasi &nbsp;</b></td>
                    <td><b>&nbsp;:&nbsp;</b></td>
                    <td> &nbsp;{{$noreg}}&nbsp; </td></p>

                    <p class="activity"><td><b>&nbsp;Nama Mahasiswa &nbsp;</b></td>
                    <td><b>&nbsp;:&nbsp;</b></td>
                    <td>&nbsp;{{$name}}&nbsp;</td></p>

                    <p class="activity"><td><b>&nbsp;Program Studi&nbsp; </b></td>
                    <td><b>&nbsp;:&nbsp;</b></td>
                    <td> &nbsp;{{$prodi}}&nbsp; </td></p>

                    <p class="activity"><td><b> &nbsp;Semester &nbsp;</b></td>
                    <td><b>&nbsp;:&nbsp;</b></td>
                    <td>&nbsp;{{$semester}}&nbsp;</td></p>

                    <p class="activity"><td><b> &nbsp;Alamat &nbsp;</b></td>
                    <td><b>&nbsp;:&nbsp;</b></td>
                    <td>&nbsp;{{$alamat}}&nbsp;</td></p>

                    <p class="activity"><td><b> &nbsp;Telepon &nbsp;</b></td>
                    <td><b>&nbsp;:&nbsp;</b></td>
                    <td>&nbsp;{{$telepon}}&nbsp;</td></p>
                </section>

            </div><!-- @end #content -->
        </div><!-- @end #w -->

        </div>
    </div>
</body>
</html>

<br>
</br>
@stop