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
        {!! HTML::image('./img/logo.jpg', 'alt', array( 'width' => 50, 'height' => 50 )) !!} Online Presence Login
    </h1>

{!! Form::open(array('url' => '/auth/login', 'class' => 'form-horizontal')) !!}

    <div>
        Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="email" name="email" value="">
    </div>

    <div>
        Password
        <input type="password" name="password" id="password">
    </div>

    <div>
        <input type="checkbox" name="remember"> Remember Me
    </div>
    <br>
    <a href="password/email">Forgot Password?</a>
    <div>
        <br>
        <button type="submit">Login</button>
    </div>
{!! Form::close() !!}
    <button type="button" class="btn btn-default btn-block" onClick="window.location='http://localhost/absenv2/public/'"><b>Back to Home</b></button>
</center>