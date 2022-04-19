<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title','page-title')</title>


    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</head>

<body>

<!-- Navigation -->
@include('layouts.header')

<!-- Page Content -->
<div class="container" style="margin-top: 65px">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-12">
            @yield('content')
        </div>

        <!-- Sidebar Widgets Column -->
{{--        <div class="col-md-4">--}}
{{--            @section('sidebar')--}}
{{--                @include('layouts.sidebar')--}}
{{--            @show--}}
{{--        </div>--}}
    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->
{{--@include('layouts.footer')--}}

<!-- Bootstrap core JavaScript -->
<script src="/vendor/jquery/jquery.min.js"></script>
<script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
