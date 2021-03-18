<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">


    <link href="{{url('assets/css/heroic-features.css')}}" rel="stylesheet">
    <!-- Bootstrap core CSS -->
</head>

<body>
@include('front.layouts.nav')
<!-- Page Content -->
<div class="container">

    @if(session()->has('msg'))
        <div class="alert alert-success">
            {{session()->get('msg')}}
        </div>
@endif


    <!-- Page Features -->
   @yield('content')
    <!-- /.row -->

</div>
<!-- /.container -->




<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>

</html>
