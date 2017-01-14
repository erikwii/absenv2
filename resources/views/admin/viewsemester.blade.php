@extends('layouts.masteradmin')
@section('content')
    {!! Html::script('js/viewsemester.js') !!}
    <div class="row">
        <h1 class="page-header" style="background-color:#222222; color:#DEDEDE; text-align:center">
            {!! Html::image('./img/logo.jpg', 'alt', array( 'width' => 150, 'height' => 150 )) !!} ONLINE PRESENCE
            SYSTEM
        </h1>
        <h2 style="text-align:center">
            <small>:: Department of Mathematics, Faculty of Mathematics and Natural Science State University of Jakarta
                ::
            </small>
        </h2>

        <br>
    </div>

    <h6><p class='text-center'>
            Hari, Tanggal :
            @inject('helpers', 'App\Helpers')
            {!! $helpers::indonesian_date() !!}
            <span id='output'></span> WIB
        </p>
    </h6>

    @include('errors.error_validator')

    <h3 style="text-align:center"> Daftar Semester </h3>

    <div class="row">
        <div class="col-md-1 col-sm-1"></div>
        <div class="col-md-10 col-sm-10">
            <table class="table table-responsive table-striped table-hover">
                <thead>
                <tr>
                    <th>
                        id
                    </th>
                    <th>
                        Semester
                    </th>
                    <th>
                        Awal Semester
                    </th>
                    <th>
                        Akhir Semester
                    </th>
                    <th>
                        Aktif
                    </th>
                    <th>
                        Action
                    </th>
                </tr>
                </thead>
                <tbody>

                @foreach($semesters as $semester)
                    <tr>
                        <td>{!! $semester->id !!}</td>
                        <td>{!! $semester->semester !!}</td>
                        <td>{!! $semester->start_period !!}</td>
                        <td>{!! $semester->end_period !!}</td>
                        <td>{!! $semester->active !!}</td>
                        <?php $semester_data = array("id" => $semester->id, "semester" => $semester->semester, "start_period" => $semester->start_period,
                            "end_period"=>$semester->end_period, "active" => $semester->active)?>
                        <td>
                            <button type="button" class="btn btn-link edit-btn" data-toggle="modal"
                                    data-target="#myModal" data-id={!! '\''.json_encode($semester_data).'\'' !!}>Edit
                            </button>

                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>

        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title text-center">Edit Profile</h4>
                    </div>
                    <div class="modal-body" style="padding:40px 50px;">
                        {!! Form::open(array('url' => '/admin/view_semester', 'class' => 'form-horizontal','role'=>'form')) !!}
                        <div class="form-group">
                            {!! Form::label('id', 'id', array('class' => 'control-label')) !!}
                            {!! Form::text('id',null,['class' => 'form-control','readonly'])!!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('semester', 'Semester', array('class' => 'control-label')) !!}
                            {!! Form::text('semester',null,['class' => 'form-control'])!!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('start_period', 'Awal Semester', array('class' => 'control-label')) !!}
                            {!! Form::text('start_period',null ,['class' => 'form-control'])!!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('end_period', 'Akhir Semester', array('class' => 'control-label')) !!}
                            {!! Form::text('end_period',null,['class' => 'form-control'])!!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('active', 'Aktif', array('class' => 'control-label')) !!}
                            {!! Form::text('active',null,['class' => 'form-control'])!!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Save',['class' => 'btn btn-primary form-control']) !!}
                        </div>
                        {!! form::close() !!}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Cancel</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop
