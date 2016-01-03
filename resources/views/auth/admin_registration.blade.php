@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}></li>
            @endforeach
        </ul>
    </div>
@endif

<link href="{!! asset('assets/css/bootstrap.css') !!}" media="all" rel="stylesheet" type="text/css"/>


<h1 class="page-header" style="background-color:#222222; color:#DEDEDE; text-align:center">
    {!! HTML::image('./img/logo.jpg', 'alt', array( 'width' => 50, 'height' => 50 )) !!} Online Presence User
    Registration
</h1>


{!! Form::open(array('url' => '/auth/admin_registration', 'class' => 'form-horizontal','role'=>'form')) !!}

        <!-- previous submission of registration data is re-encoded again as form element -->

{!! csrf_field() !!}

<div class="form-group center-block">
    <label class="control-label col-sm-6" for="nrg">
        ID. Admin:
    </label>
    <div class="col-sm-2    ">
        <input type="text" name="Id_Admin" value='' class="form-control" placeholder="enter registration id">
    </div>
</div>

<div class="form-group">
    <label class="control-label col-sm-6" for="name">
        Nama:
    </label>
    <div class="col-sm-2">
        <input type="text" name="Nama_Admin" value={{$reg_name}} class="form-control" placeholder="enter name">
    </div>
</div>

<div class="form-group">
    <label class="control-label col-sm-6" for="btn_reg">

    </label>
    <div class="col-sm-2">
        <button type="submit" class="btn btn-info">Register</button>
    </div>
</div>

{!! Form::close() !!}

{!! Form::open(array('url' => '/home', 'class' => 'form-horizontal','method'=>'get')) !!}
<button type="submit" class="btn btn-default btn-block"><b>Cancel Registration</b></button>
{!! Form::close() !!}

</div>