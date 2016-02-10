@extends('layouts.masteradmin')
@section('content')
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
                    Name
                </th>
                <th>
                    Email
                </th>
                <th>
                    Role
                </th>
                <th>
                    Hapus
                </th>
                <th>
                    Edit
                </th>
            </tr>
            </thead>

            <tbody>
            @foreach($users as $user)
            <tr>
                <?php $linkedit = "/edituser/" . $user->id?>
                <?php $linkdelete = "/deleteuser/" . $user->id?>
                <td>{!! $user->id !!}</td>
                <td>{!! $user->name !!}</td>
                <td>{!! $user->email !!}</td>
                <td>{!! $user->role !!}</td>
                <td><a href={!! $linkedit !!}>Edit</a></td>
                <td><a href={!! $linkdelete !!}>Delete</a></td>
            </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
@stop
