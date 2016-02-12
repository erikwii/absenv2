@extends('layouts.masteradmin')
@section('content')
    {!! HTML::script('js/viewroom.js') !!}
    <div class="row">
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
    </div>

    <h6><p class='text-center'>
            Hari, Tanggal :
            @inject('helpers', 'App\Helpers')
            {!! $helpers::indonesian_date() !!}
            <span id='output'></span> WIB
        </p>
    </h6>

    @include('errors.error_validator')

    <h3 style="text-align:center"> Daftar Ruangan </h3>

    <div class="row">
        <div class="col-md-2 col-sm-2"></div>
        <div class="col-md-8 col-sm-8">
            <table class="table table-responsive table-striped table-hover">
                <thead>
                <tr>
                    <th>
                        id
                    </th>
                    <th>
                        Nama Ruang
                    </th>
                    <th>
                        Lokasi
                    </th>
                    <th>
                        Action
                    </th>
                </tr>
                </thead>

                <tbody>

                @foreach($rooms as $room)
                    <tr>
                        <td>{!! $room->id_ruang !!}</td>
                        <td>{!! $room->nama_ruang !!}</td>
                        <td>{!! $room->lokasi !!}</td>
                        <?php $room_data = array("id"=>$room->id_ruang,"nama_ruang"=>$room->nama_ruang,"lokasi"=>$room->lokasi)?>
                        <td><button type="button" class="btn btn-link edit-btn" data-toggle="modal" data-target="#myModal" data-id={!! '\''.json_encode($room_data).'\'' !!}>Edit</button></td>
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
                        <h4 class="modal-title text-center">Edit Room</h4>
                    </div>
                    <div class="modal-body" style="padding:40px 50px;">
                        {!! Form::open(array('url' => '/viewroom', 'class' => 'form-horizontal','role'=>'form')) !!}
                        <div class="form-group">
                            {!! Form::label('id_ruang', 'id', array('class' => 'control-label')) !!}
                            {!! Form::text('id_ruang',null ,['class' => 'form-control','readonly'])!!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('nama_ruang', 'Nama Ruang', array('class' => 'control-label')) !!}
                            {!! Form::text('nama_ruang',null,['class' => 'form-control'])!!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('lokasi', 'Lokasi', array('class' => 'control-label')) !!}
                            {!! Form::text('lokasi',null ,['class' => 'form-control'])!!}
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
