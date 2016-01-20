@include('errors.error_validator')

<link href="{!! asset('assets/css/bootstrap.css') !!}" media="all" rel="stylesheet" type="text/css"/>

<h1 class="page-header" style="background-color:#222222; color:#DEDEDE; text-align:center">
    {!! HTML::image('./img/logo.jpg', 'alt', array( 'width' => 50, 'height' => 50 )) !!} Online Presence Login
</h1>

{!! Form::open(array('url' => '/auth/login', 'class' => 'form-horizontal')) !!}

<div class="form-group center-block">
    <label class="control-label col-sm-6" for="email">
        E-mail:
    </label>
    <div class="col-sm-2    ">
        <input type="email" name="email" value="" class="form-control" placeholder="enter e-mail id">
    </div>
</div>

<div class="form-group center-block">
    <label class="control-label col-sm-6" for="password">
        Password:
    </label>
    <div class="col-sm-2    ">
        <input type="password" name="password" value="" class="form-control" placeholder="put password">
    </div>
</div>

<div class="form-group">
    <label class="control-label col-sm-6" for="name">
        Role:
    </label>
    <div class="col-sm-2">
        <?php
        echo Form::select('role', array('student' => 'Student', 'dosen' => 'Dosen'), 'student', array('class' => 'form-control'));
        ?>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-sm-6" for="empty">

    </label>
    <div class="col-sm-2">
        <input type="checkbox" name="remember"> Remember Me
    </div>
</div>

<div class="form-group">
    <label class="control-label col-sm-6" for="empty">

    </label>
    <div class="col-sm-2">
        <a href="password/email">Forgot Password?</a>
    </div>
</div>



<div class="form-group">
    <label class="control-label col-sm-6" for="btn_login">

    </label>
    <div class="col-sm-2">
        <button type="submit" class="btn btn-info">Login</button>
    </div>
</div>

{!! Form::close() !!}
<button type="button" class="btn btn-default btn-block" onClick="window.location='/home'"><b>Back to Home</b></button>