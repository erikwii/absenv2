@extends('layouts.masterdosen')
@section('content')
    <div>
        <h1 class="page-header" style="background-color:#222222; color:#DEDEDE; text-align:center">
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

        <!-- time content -->
        <h6><p class='text-center'>
                Hari, Tanggal :
                @inject('helpers', 'App\Helpers')
                {!! $helpers::indonesian_date() !!}
                <span id='output'></span> WIB
            </p>
        </h6>
        <!-- time content -->

        <div class="table-responsive">
            <div class="col-sm-3"></div>
            <div id="content" class="col-sm-6">
                <h4><p class="text-center">Identitas Dosen</p></h4>
                <table class="table">
                    <tbody>
                    <tr>
                        <td>Kode Dosen</td>
                        <td>{!! $kode_dosen !!}</td>
                    </tr>
                    <tr>
                        <td>Nama Dosen</td>
                        <td>{!! $name !!}</td>
                    </tr>
                    <tr>
                        <td>Telepon</td>
                        <td>{!! $telepon !!}</td>
                    </tr>
                    </tbody>
                </table>
            </div><!-- @end #content -->
        </div><!-- @end #w -->
    </div>

<br>

@stop