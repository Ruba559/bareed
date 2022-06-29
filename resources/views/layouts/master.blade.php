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
<<<<<<< HEAD
=======
<<<<<<< HEAD
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
        <!-- Styles -->

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
=======
>>>>>>> 294711eb82283337406eebec0217f88805b8f426
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
        <!-- Styles -->

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Cairo:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
<<<<<<< HEAD
=======
>>>>>>> 02b5ef90dbc5d6998f22015d5ae8bc0d4ffc088b
>>>>>>> 294711eb82283337406eebec0217f88805b8f426
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5/dist/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<<<<<<< HEAD
<<<<<<< HEAD
         <link rel="stylesheet" href="{{asset('css/main.css')}}">
        <script src="{{asset('js/main.js')}}"></script> 
=======
        <link rel="stylesheet" href="{{asset('css/main.css')}}">
        <script src="{{asset('js/main.js')}}"></script>
>>>>>>> 294711eb82283337406eebec0217f88805b8f426
=======
        {{-- <link rel="stylesheet" href="{{asset('css/main.css')}}">
        <script src="{{asset('js/main.js')}}"></script> --}}
        <link rel="stylesheet" href="https://b671-94-47-144-252.eu.ngrok.io/css/main.css">
        <script src="https://b671-94-47-144-252.eu.ngrok.io/js/main.js"></script>
>>>>>>> 02b5ef90dbc5d6998f22015d5ae8bc0d4ffc088b
    </head>
    <nav class="navbar bg-light fixed-top">
        <a id="slide-toggler"><span class="fa fa-bars"></span></a>
        <a class="navbar-brand ml-auto"><img class="img-fluid" width="100px" src="{{asset('images/logo.gif')}}" alt=""></a>


        <div class="nav-icons" class="float">
            <ul>
                <li class="nav-item float-left">
                    <a class="nav-link  d-inline-block" href="#" ><span class="fa fa-user"></span></a>
                </li>
                <li class="nav-item active float-left">
                    <a class="nav-link d-inline-block" href="#"> <span class="fa fa-bell"></span></a>
                </li>

            </ul>
        </div>
    </nav>
    <body dir="rtl">

<<<<<<< HEAD
       @include('layouts.mastermenu')
=======
<<<<<<< HEAD
        <div class="slide-bar ">
            <div class="slide-icons text-center">
                <div class="user-avatar">
                    <img class="img-fluid img-thumbnail rounded-circle w-50" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRRYoAw7SMTXv1u24aZi0N0dmQZri6QmQ37vQ&usqp=CAU" alt="">
                    <h5 class="sans-font">Bareed user</h5>
                </div>
                <ul class="">
                    <li>
                        <a href="">تفعيل الرد الآلي</a>
                    </li>
                    <li>
                        <a href="">إستيراد حساب</a>
                    </li>
                    <li>
                        <a href="">إعدادات المجيب الذكي</a>
                    </li>
                    <li>
                        <a href="">تقرير الرد الآلي</a>
                    </li>
                    <li>
                        <a href="">بيانات الاشتراك</a>
                    </li>
                    <li>
                        <a href="">تسجيل الخروج</a>
                    </li>
                </ul>
            </div>

        </div>
=======
       @include('layouts.mastermenu')
>>>>>>> 02b5ef90dbc5d6998f22015d5ae8bc0d4ffc088b
>>>>>>> 294711eb82283337406eebec0217f88805b8f426
        <div class="body-waraper">
            @yield('body')
        </div>

    </body>
</html>
