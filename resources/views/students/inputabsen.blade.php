@extends('layouts.mastermhs')
@section('content')
    <script type="text/javascript" src="{!! asset('js/waktu.js') !!}"></script>

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

    <h4 style="color:red; text-align:center">Mark your presence today: </h4>
    @include('errors.error_validator')
    <div class="row">
        <div class="col-md-1 col-sm-1"></div>
        <div class="col-md-10 col-sm-10">
            <table class="table table-responsive table-hover table-striped">
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
                        Jumlah Pertemuan
                    </th>
                    <th>
                        Pertemuan Ke
                    </th>
                    <th>
                        Kehadiran
                    </th>
                </tr>
                </thead>
                <tbody>
                @inject('helpers', 'App\Helpers')
                @foreach($enrollments as $enrollment)
                    <tr>
                        {!! Form::open(array('url' => '/inputabsen', 'class' => 'form-horizontal')) !!}
                        <td>{!! $enrollment->seksi !!}</td>
                        <td>{!! $enrollment->Kode_Matkul !!}</td>
                        <?php $waktu = $enrollment->day . ', ' . $enrollment->kode_waktu ?>
                        <td>{!! $waktu !!}</td>
                        <td>{!! $enrollment->Nama_Matkul !!}</td>
                        <td>{!! $enrollment->pertemuan !!}</td>
                        {!! Form::hidden('seksi', $enrollment->seksi) !!}
                        {!! Form::hidden('pertemuan',$enrollment->pertemuan+1) !!}
                        {!! Form::hidden('noreg', $noreg) !!}
                        <?php $stat = $helpers::isAbsentFillable($enrollment->day, $enrollment->waktu_start, $enrollment->waktu_end)?>
                        @if($stat)
                            <td>{!! Form::select('pertemuan_ke', $pertemuan, $enrollment->pertemuan+1,['class' => 'form-control']) !!}</td>
                            <td>
                                {!! Form::submit('Submit',['class' => 'btn btn-primary form-control']) !!}
                            </td>
                        @else
                            <td>{!! Form::select('pertemuan_ke', $pertemuan, $enrollment->pertemuan+1,['class' => 'form-control','disabled']) !!}</td>
                            <td>
                                {!! Form::submit('Submit',['class' => 'btn btn-primary form-control','disabled']) !!}
                            </td>
                        @endif
                        {!! form::close() !!}
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@stop