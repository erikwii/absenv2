@include('errors.error_validator')

<link href="{!! asset('assets/css/bootstrap.css') !!}" media="all" rel="stylesheet" type="text/css"/>


<h1 class="page-header" style="background-color:#222222; color:#DEDEDE; text-align:center">
    {!! HTML::image('./img/logo.jpg', 'alt', array( 'width' => 50, 'height' => 50 )) !!} Online Presence User
    Registration
</h1>


{!! Form::open(array('url' => '/auth/admin_registration', 'class' => 'form-horizontal','role'=>'form')) !!}

        <!-- previous submission of registration data is re-encoded again as form element -->

<div class="form-group">
    <label class="control-label col-sm-6" for="name">
        Nama
    </label>
    <div class="col-sm-2">
        <input type="text" name="Nama_Admin" value={{$reg_name}} class="form-control" placeholder="enter name">
    </div>
</div>

<div class="form-group">
    <label class="control-label col-sm-6" for="name">
        Alamat
    </label>
    <div class="col-sm-2">
        <input type="text" name="Alamat" value="" class="form-control" placeholder="enter address">
    </div>
</div>

<div class="form-group">
    <label class="control-label col-sm-6" for="name">
        Telepon
    </label>
    <div class="col-sm-2">
        <input type="text" name="Telepon" value="" class="form-control" placeholder="enter phone">
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