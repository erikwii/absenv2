<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Absen Online</title>

    <!-- Bootstrap Core CSS -->
    {!! HTML::style('assets/css/bootstrap.min.css') !!}

    <!-- Custom CSS -->
    {!! HTML::style('assets/css/sb-admin.css') !!}

    <!-- Custom Fonts -->
    {!! HTML::style('assets/font-awesome/css/font-awesome.min.css') !!}

    {!! HTML::style('assets/css/jquery-ui/jquery-ui.min.css') !!}
    {!! HTML::script('assets/js/jquery-1.12.0.min.js') !!}
    {!! HTML::script('assets/js/jquery-ui/jquery-ui.min.js') !!}
    {!! HTML::script('js/waktu.js') !!}

            <!-- Bootstrap Core JavaScript -->
    {!! HTML::script('assets/js/bootstrap.min.js') !!}

            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    {!! HTML::script('assets/js/html5shiv.js') !!}
    {!! HTML::script('assets/js/respond.min.js') !!}
    <![endif]-->
    <![endif]-->

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        @include('includes.header')
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        @include('includes.sidebarhome')
        <!-- /.navbar-collapse -->

    </nav>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            @yield('content')
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<nav>
    @include('includes.footer')
</nav>

</body>

</html>
