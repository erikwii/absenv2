@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li></li>
            @endforeach
        </ul>
    </div>
@endif
<center>
<h1 class="page-header" style= "background-color:#222222; color:#DEDEDE; text-align:center">
    {!! HTML::image('./img/logo.jpg', 'alt', array( 'width' => 50, 'height' => 50 )) !!} Online Presence User Registration
</h1>

{!! Form::open(array('url' => '/auth/register', 'class' => 'form-horizontal')) !!}

    <div>
        Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;
        <input type="text" name="name" value="">
    </div>

    <div>
        Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;
        <input type="email" name="email" value="">
    </div>

    <div>
        Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="password" name="password">
    </div>

    <div>
        Confirm Password
        <input type="password" name="password_confirmation">
    </div>
<br>
    <div>
        <button type="submit">Register</button>
    </div>

{!! Form::close() !!}

    <button type="button" class="btn btn-default btn-block" onClick="window.location='http://localhost/absenv2/public/'"><b>Back to Home</b></button>
</center>