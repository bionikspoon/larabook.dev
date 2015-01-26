<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- Bootstrap -->
    {{HTML::style('css/bootstrap.css')}}
    {{HTML::style('css/main.css')}}

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    {{HTML::script('js/html5shiv.min.js')}}
    {{HTML::script('js/respond.min.js')}}
    <![endif]-->
</head>
<body>
<div class="container">
    @include('flash::message')
    @include('layouts.partials.nav')
    @yield('content')
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
{{HTML::script('js/jquery-1.11.2.js')}}
<!-- Include all compiled plugins (below), or include individual files as needed -->
{{HTML::script('js/bootstrap.js')}}
<script>
    $('#flash-overlay-modal').modal();
    $('.comments__create-form').on('keydown', function(e){
        if (e.keyCode == 13) {
            e.preventDefault();
            $(this).submit();
        }
    });
</script>
</body>
</html>