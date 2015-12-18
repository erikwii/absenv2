{!! Form::open(array('url' => '/auth/login', 'class' => 'form-horizontal')) !!}

    <div>
        Email
        <input type="email" name="email" value="">
    </div>

    <div>
        <button type="submit">
            Send Password Reset Link
        </button>
    </div>
{!! Form::close() !!}

<button type="button" class="btn btn-default btn-block" onClick="window.location='/home'"><b>Back to Home</b></button>