<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>
            @section('title')
                {{ $title }}
            @show
        </title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="robots" content="INDEX,FOLLOW" />
    <link rel="icon" href="" type="image/x-icon" />
    {{ HTML::style('http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css') }}
</head>
<body>
    <!-- Scripts are placed here -->
    {{ HTML::script('https://code.jquery.com/jquery-2.1.1.min.js') }}
    {{ HTML::script('http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js') }}
    <!-- Container -->
    
    <div class="row">
        <div class="col-md-12">@include('template.navbar')</div>
    </div>
    <div class="row">
        <div class="col-md-2">.col-md-2</div>
        <div class="col-md-8">@yield('content')</div>
        <div class="col-md-2">.col-md-2</div>
    </div>
    <div class="row">
        <div class="col-md-12">footer</div>
    </div>
</body>
</html>