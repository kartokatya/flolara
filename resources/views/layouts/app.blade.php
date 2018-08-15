<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Floral HTML CSS Template</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <link href="{{ asset('css/templatemo_style.css') }}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{ asset('css/orman.css') }}" type="text/css" media="screen" />
    <link rel="stylesheet" href="{{ asset('css/nivo-slider.css') }}" type="text/css" media="screen" />

    <link rel="stylesheet" type="text/css" href="{{ asset('css/ddsmoothmenu.css') }}" />

    <script type="text/javascript" src="{{ asset('js/jquery-1.6.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.nivo.slider.pack.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/ddsmoothmenu.js') }}">

    </script>

    <script type="text/javascript">

        ddsmoothmenu.init({
            mainmenuid: "templatemo_menu", //menu DIV id
            orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
            classname: 'ddsmoothmenu', //class added to menu's outer DIV
            //customtheme: ["#1c5a80", "#18374a"],
            contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
        })

        function clearText(field)
        {
            if (field.defaultValue == field.value) field.value = '';
            else if (field.value == '') field.value = field.defaultValue;
        }

    </script>

    <link rel="stylesheet" href="{{ asset('css/slimbox2.css') }}" type="text/css" media="screen" />
    <script type="text/JavaScript" src="{{ asset('js/slimbox2.js') }}"></script>


</head>

<body>

<div id="templatemo_wrapper_h">
    <div id="templatemo_header_wh">
        <div id="templatemo_header" class="header_home">
            <div id="site_title"><a href="#">Floral Shop</a></div>
            <div id="templatemo_menu" class="ddsmoothmenu">
                <ul>
                    <li><a href="index.html" class="selected">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="products.html">Products</a>
                        <ul>
                            <li><a href="#subpage1">Sub Page One</a></li>
                            <li><a href="#subpage2">Sub Page Two</a></li>
                            <li><a href="#subpage3">Sub Page Three</a></li>
                            <li><a href="#subpage4">Sub Page Four</a></li>
                            <li><a href="#subpage5">Sub Page Five</a></li>
                        </ul>
                    </li>
                    <li><a href="checkout.html">Checkout</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li><a href="faqs.html">FAQs</a></li>
                </ul>
                <div id="templatemo_search">
                    <form action="#" method="get">
                        <input type="text" value="Site Search" name="keyword" id="keyword" title="keyword"
                               onfocus="clearText(this)" onblur="clearText(this)" class="txt_field" />
                        <input type="submit" name="Search" value="" alt="Search" id="searchbutton" title="Search" class="sub_btn" />
                    </form>
                </div>
                <br style="clear: left" />
            </div> <!-- end of templatemo_menu -->

            <div class="slider-wrapper theme-orman">
                <div class="ribbon"></div>
                <div id="slider" class="nivoSlider">
                    <img src="{{ asset('images/portfolio/01.jpg') }}" alt="slider image 1" />
                    <a href="#">
                        <img src="{{ asset('images/portfolio/02.jpg') }}" alt="slider image 2" title="This is an example of a caption" />
                    </a>
                    <img src="{{ asset('images/portfolio/03.jpg') }}" alt="slider image 3" />
                    <img src="{{ asset('images/portfolio/04.jpg') }}" alt="slider image 4" title="#htmlcaption" />
                    <img src="{{ asset('images/portfolio/05.jpg') }}" alt="slider image 5" title="#htmlcaption" />
                </div>
                <div id="htmlcaption" class="nivo-html-caption">
                    <strong>Example</strong> caption with <a href="http://dev7studios.com" rel="nofollow">a credit link</a> for <em>this slider</em>.
                </div>
            </div>

            <script type="text/javascript">
                $(window).load(function() {
                    $('#slider').nivoSlider({
                        controlNav:false
                    });
                });
            </script>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div> <!-- END of header -->
    </div> <!-- END of header wrapper -->

    @yield('content')
    <div id="templatemo_footer_wrapper">
        <div id="templatemo_footer">
            <div class="footer_left">
                <a href="#"><img src="{{ asset('images/1311260370_paypal-straight.png') }}" alt="Paypal" /></a>
                <a href="#"><img src="{{ asset('images/1311260374_mastercard-straight.png') }}" alt="Master" /></a>
                <a href="#"><img src="{{ asset('images/1311260374_visa-straight.png') }}" alt="Visa" /></a>
            </div>
            <div class="footer_right">
                <p><a href="index.html">Home</a> | <a href="products.html">Products</a> | <a href="about.html">About</a> | <a href="faqs.html">FAQs</a> | <a href="checkout.html">Checkout</a> | <a href="contact.html">Contact</a></p>
                <p>Copyright © 2084 <a href="#">Company Name</a></p>
            </div>
            <div class="cleaner"></div>
        </div> <!-- END of footer -->
    </div> <!-- END of footer wrapper -->
</div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
