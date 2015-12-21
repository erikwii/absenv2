@extends('layouts.masterhome')
@section('content')

    <body onload="waktu()">
    <div class="row">
        <div class="col-lg-120">


            <h1 class="page-header" style="background-color:#222222; color:#DEDEDE; text-align:center">
                {!! HTML::image('./img/logo.jpg', 'alt', array( 'width' => 150, 'height' => 150 )) !!} ONLINE PRESENCE
                SYSTEM
            </h1>
            <h2 style="text-align:center">
                <small>:: Department of Mathematics, Faculty of Mathematics and Natural Science State University of
                    Jakarta ::
                </small>
            </h2>
            </tr>
            <br>

            <!-- time content -->
            <br>
            <br>


            <!-- Load waktu onload  -->
            <script type="text/javascript" src="{!! asset('js/waktu.js') !!}"></script>

            <?php
            $hariIni = date('Y-m-d');
            $bulanIni = date('m');
            use App\Helpers;
            echo "<center><h3> Hari, Tanggal : " . Helpers::indonesian_date() . " <span id='output'></span> WIB </center></h3></span>"
            ?>
                    <!-- time content -->
            <br>
            <br>
            <br>
            <br>
            <br>
            {!! Form::open(array('url' => 'auth/login', 'method'=>'get')) !!}
                <button type="submit" class="btn btn-default btn-block"><b>Login</b>
                </button>
            {!! Form::close() !!}

            {!! Form::open(array('url' => 'auth/register', 'method'=>'get')) !!}
                <button type="button" class="btn btn-default btn-block" onClick="window.location='auth/register'"><b>Sign Up</b></button>
            {!! Form::close() !!}

        </div>
    </div>
    <!-- time btn btn-default btn-block content -->

@stop
