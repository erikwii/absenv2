@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li><?php echo $error?></li>
            @endforeach
        </ul>
    </div>
@endif
<center>

    <link href="{!! asset('assets/css/bootstrap.css') !!}" media="all" rel="stylesheet" type="text/css"/>

    <h1 class="page-header" style="background-color:#222222; color:#DEDEDE; text-align:center">
        {!! HTML::image('./img/logo.jpg', 'alt', array( 'width' => 50, 'height' => 50 )) !!} Online Presence User
        Registration
    </h1>

    {!! Form::open(array('url' => '/auth/register', 'class' => 'form-horizontal')) !!}

    <div class="form-group center-block">
        <label class="control-label col-sm-6" for="name">
            Name:
        </label>
        <div class="col-sm-2    ">
            <input type="text" name="name" value="" class="form-control" placeholder="enter name">
        </div>
    </div>

    <div class="form-group center-block">
        <label class="control-label col-sm-6" for="email">
            e-mail:
        </label>
        <div class="col-sm-2    ">
            <input type="email" name="email" value="" class="form-control" placeholder="enter email">
        </div>
    </div>

    <div class="form-group center-block">
        <label class="control-label col-sm-6" for="password">
            Password:
        </label>
        <div class="col-sm-2">
            <input type="password" name="password" value="" class="form-control" placeholder="enter password">
        </div>
    </div>

    <div class="form-group center-block">
        <label class="control-label col-sm-6" for="confirmpassword">
            Confirm Password:
        </label>
        <div class="col-sm-2">
            <input type="password" name="password_confirmation" value="" class="form-control" placeholder="confirm password">
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
        <label class="control-label col-sm-6" for="btn_reg">
        </label>
        <div class="col-sm-2">
            <button type="submit" class="btn btn-info">Register</button>
        </div>
    </div>

    {!! Form::close() !!}

    {!! Form::open(array('url' => '/home', 'class' => 'form-horizontal','method'=>'get')) !!}
    <button type="submit" class="btn btn-default btn-block"><b>Back to Home</b></button>
    {!! Form::close() !!}
</center>