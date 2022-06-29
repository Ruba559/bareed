<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- SEO Meta Tags -->
    <meta name="description" content="Facebook Automation Services">
    <meta name="author" content="Brain">

    <!-- OG Meta Tags -->
	<meta property="og:site_name" content="Bareed" /> <!-- website name -->
	<meta property="og:site" content="www.bareed.brain.sy" /> <!-- website link -->
	<meta property="og:title" content="{{isset($title) ? $title : 'Bareed'}}"/> <!-- title shown in the actual shared post -->
	<meta property="og:description" content="{{isset($description) ? $title : 'Best Facebook Automation Services'}}" /> <!-- description shown in the actual shared post -->
	<meta property="og:image" content="{{asset('images/bareed-logo.png')}}" /> <!-- image link, make sure it's jpg -->
	<meta property="og:url" content="{{URL::current()}}" /> <!-- where do you want your post to link to -->
	<meta name="twitter:card" content="{{asset('images/bareed-logo.png')}}"> <!-- to have large image post format in Twitter -->

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>{{isset($title) ? $title : 'Bareed'}}</title>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
        <!-- Styles -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
         <link rel="stylesheet" href="{{asset('css/main.css')}}">
        <script src="{{asset('js/main.js')}}"></script> 
    </head>
    <body dir="rtl">
        @yield('body')
    </body>
</html>
