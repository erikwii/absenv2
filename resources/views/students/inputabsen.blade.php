@extends('layouts.mastermhs')
@section('content')
    <script type="text/javascript" src="{!! asset('js/waktu.js') !!}"></script>
    <div class="container">
        <h1 class="page-header" style="background-color:#222222; color:#DEDEDE; text-align:center">
            {!! HTML::image('./img/logo.jpg', 'alt', array( 'width' => 150, 'height' => 150 )) !!} ONLINE PRESENCE
            SYSTEM
        </h1>
        <h2 style="text-align:center">
            <small>:: Department of Mathematics, Faculty of Mathematics and Natural Science State University of Jakarta
                ::
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
        <!-- time content -->

        <div class="row">
            <div class="col-md-5 col-sm-5"></div>
            <div class="col-md-2 col-sm-2">
                Pertemuan Ke {!! Form::select('pertemuan_ke', $pertemuan, null,['class' => 'form-control']) !!}
            </div>
        </div>

        <h4 style="color:red; text-align:center">Mark your presence today: </h4>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
            <table class="table table-responsive table-hovered table-striped">
                <thead>
                <tr>
                    <th>
                        Kode Seksi
                    </th>
                    <th>
                        Kode Mata Kuliah
                    </th>
                    <th>
                        Waktu Kuliah
                    </th>
                    <th>
                        Nama Mata Kuliah
                    </th>
                    <th>
                        Kehadiran
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($enrollments as $enrollment)
                <tr>
                    <td>{!! $enrollment->seksi !!}</td>
                    <td>{!! $enrollment->Kode_Matkul !!}</td>
                    <?php $waktu = $enrollment->day.', '.$enrollment->kode_waktu ?>
                    <td>{!! $waktu !!}</td>
                    <td>{!! $enrollment->Nama_Matkul !!}</td>
                    <td>
                        <button class='btn btn-primary' type="submit" value="Submit">submit</button>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
@stop