@extends('layouts.masteradmin')
@section('content')
    {!! HTML::script('js/ajax-response.js') !!}
    <h1 class="page-header" style="background-color:#222222; color:#DEDEDE; text-align:center">
        {!! HTML::image('./img/logo.jpg', 'alt', array( 'width' => 150, 'height' => 150 )) !!} ONLINE PRESENCE SYSTEM
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
                    <th>No</th>
                    <th>NRM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Hadir</th>
                </tr>
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
                            <td>{!! $presence::countPresenceeBySectionNoreg($enroll->kode_seksi,$enroll->noreg) !!}</td>
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