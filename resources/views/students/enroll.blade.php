@extends('layouts.mastermhs')
@section('content')
    <h1 class="page-header" style="background-color:#222222; color:#DEDEDE; text-align:center">
        {!! Html::image('./img/logo.jpg', 'alt', array( 'width' => 150, 'height' => 150 )) !!} ONLINE PRESENCE
        SYSTEM
    </h1>
    <h2 style="text-align:center">
        <small>:: Department of Mathematics, Faculty of Mathematics and Natural Science State University of Jakarta
            ::
        </small>
    </h2>

    <div class="container">

        @include('errors.error_validator')

        <h2 style="text-align:center">ENROLL MATA KULIAH</h2>
        {!! Form::open(array('url' => '/enrollmhs', 'class' => 'form-horizontal','role'=>'form')) !!}
        <div class="form-group form-group-sm" style="text-align: center;">
            <div>
                Kode Seksi
            </div>
        </div>
        <div class="form-group form-group-sm">
            <div class="col-md-5 col-sm-5"></div>
            <div class="col-md-2 col-sm-2">
                <input type="text" class="form-control" name="kode_seksi" value="" title="Kode Mata Kuliah">
            </div>
            <div class="col-md-5 col-sm-5"></div>
        </div>
        <div class="form-group form-group-sm">
            <div class="col-md-5 col-sm-5"></div>
            <div class="col-md-1 col-sm-1">
                <button type="submit" class="btn btn-primary" value="Submit">Tambah</button>
            </div>
            <div class="col-md-1 col-sm-1">
                <button type="reset" class="btn btn-info" value="Reset">Reset</button>
            </div>
        </div>
        <br/>
        {!! Form::close() !!}

        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>
                                Kode Seksi
                            </th>
                            <th>
                                Kode Mata Kuliah
                            </th>
                            <th>
                                Nama Mata Kuliah
                            </th>

                        </tr>
                        </thead>

                        <tbody>
                        @if (!(empty($enrollments)))
                            @foreach($enrollments as $enrollment)
                                <tr>
                                    <td>{!! $enrollment->seksi !!}</td>
                                    <td>{!! $enrollment->Kode_Matkul !!}</td>
                                    <td>{!! $enrollment->Nama_Matkul !!}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3">No Enrollment</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
@stop