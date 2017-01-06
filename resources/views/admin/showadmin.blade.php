@extends('layouts.masteradmin')
@section('content')
    {!! Html::script('js/ajax-response.js') !!}
    <h1 class="page-header" style="background-color:#222222; color:#DEDEDE; text-align:center">
        {!! Html::image('./img/logo.jpg', 'alt', array( 'width' => 150, 'height' => 150 )) !!} ONLINE PRESENCE SYSTEM
    </h1>
    <h2 style="text-align:center">
        <small>:: Department of Mathematics, Faculty of Mathematics and Natural Science State University of Jakarta ::
        </small>
    </h2>
    <br>

    <h5><p class='text-center'>
            Hari, Tanggal :
            @inject('helpers', 'App\Helpers')
            {!! $helpers::indonesian_date() !!}
            <span id='output'></span> WIB
        </p>
    </h5>

    <h2 style="color:black; text-align:center">Rekapitulasi Absen</h2>
    {!! Form::open(array('url' => '/rekapadmin', 'class' => 'form-horizontal')) !!}
    <div class="row form-group">
        <div class="col-md-2 col-md-2"></div>
        <div class="col-md-2 col-sm-2">
            <label for="Semester">Semester</label>
            {!! Form::select('Semester', $kalender_options, $semester_id,['class' => 'form-control','id'=>'changeStatus']) !!}
        </div>
        <div class="col-md-1 col-sm-1"></div>
        <div class="col-md-2 col-sm-2">
            <label for="Kode_Seksi">Nama Mata Kuliah</label>
            {!! Form::select('Kode_Seksi', $course_options, $kode_seksi,['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-5 col-sm-2"></div>
        <div class="col-md-2 col-sm-2">
            @if(empty($course))
                {!! Form::submit('Check',['class' => 'btn btn-primary form-control','disabled']) !!}
            @else
                {!! Form::submit('Check',['class' => 'btn btn-primary form-control']) !!}
            @endif
        </div>
    </div>
    {!! Form::close() !!}
    <div class="row">
        <div class="col-md-2 col-md-2"></div>
        <div class="col-md-8 col-sm-8">
            <table class="table table-responsive table-hover table-striped">
                <thead>
                <tr>
                    <th rowspan="2">No</th>
                    <th rowspan="2">NRM</th>
                    <th rowspan="2">Nama Mahasiswa</th>
                    <th colspan="16">Kehadiran</th>
                </tr>
                <?php $per = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16);?>
                <tr>
                    @foreach($per as $p)
                        <th>
                            {!! $p !!}
                        </th>
                    @endforeach
                </tr>
                {{--<tr>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th>5</th>
                    <th>6</th>
                    <th>7</th>
                    <th>8</th>
                    <th>9</th>
                    <th>10</th>
                    <th>11</th>
                    <th>12</th>
                    <th>13</th>
                    <th>14</th>
                    <th>15</th>
                    <th>16</th>
                </tr>--}}
                </thead>
                <tbody>
                @inject('presence', 'App\Models\Presence')
                @if(!empty($enrolls))
                    <?php $i=1?>
                    @foreach($enrolls as $enroll)
                        <tr>
                            <td>{!! $i !!}</td>
                            <td>{!! $enroll->noreg !!}</td>
                            <td>{!! $enroll->Nama_Mhs !!}</td>
                            @foreach($per as $p)
                                <td>
                                    {{--{!! $presence::getPresencePer($enroll->kode_seksi,$enroll->noreg,$p->pertemuan) !!}--}}
                                </td>
                            @endforeach
                        </tr>
                        <?php $i++?>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">No data to be shown</td>
                    </tr>
                @endif
                </tbody>

            </table>
        </div>
    </div>
    <br>
@stop