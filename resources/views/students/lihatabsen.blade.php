@extends('layouts.mastermhs')
@section('content')
    <h1 class="page-header" style="background-color:#222222; color:#DEDEDE; text-align:center">
        {!! Html::image('./img/logo.jpg', 'alt', array( 'width' => 150, 'height' => 150 )) !!} ONLINE PRESENCE SYSTEM
    </h1>
    <h2 style="text-align:center">
        <small>:: Department of Mathematics, Faculty of Mathematics and Natural Science State University of Jakarta ::
        </small>
    </h2>
    <br>

    <!-- time content -->
    <h5><p class='text-center'>
            Hari, Tanggal :
            @inject('helpers', 'App\Helpers')
            {!! $helpers::indonesian_date() !!}
            <span id='output'></span> WIB
        </p>
    </h5>

    <h3 style="text-align:center">My Presence</h3>
    <br>
    <div class="row">
        <div class="col-md-2 col-sm-2"></div>
        <div class="col-md-8 col-sm-8">
            <table class="table table-responsive table-hover table-striped table-bordered">
                <thead>
                <tr>
                    <th rowspan="2">Kode Seksi</th>
                    <th rowspan="2">Mata Kuliah</th>
                    <th colspan="16">Pertemuan ke-</th>
                </tr>
                <tr>
                    @foreach($pertemuan as $key => $val)
                        <th>
                            {!! $val !!}
                        </th>
                    @endforeach
                </tr>
                </thead>
                <tbody>
                @inject('helpers', 'App\Helpers')
                @foreach($enrollments as $enrollment)
                <tr>
                    <td>{!! $enrollment->kode_seksi !!}</td>
                    <td>{!! $enrollment->courses->Nama_Matkul !!}</td>
                    <?php
                        $presences = $enrollment->courses->presence;
                        $array_counter = $helpers::arrayMap($presences);
                    ?>
                    @foreach($array_counter as $key => $val)
                        <td>
                            {!! $val !!}
                        </td>
                    @endforeach
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <br>
    <br>
@stop