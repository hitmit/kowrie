<html>
    <head>
        <meta charset="utf-8" />
        <link rel="shortcut icon" href="http://localhost/drupal/webserver12/sites/all/themes/kowrie/favicon.ico" type="image/vnd.microsoft.icon" />
        <meta name="Generator" content="Drupal 7 (http://drupal.org)" />
        <title>
        @section('title')
        @show
        </title>
        <link rel="stylesheet" href="{{asset('assets/kowrie/css/components/misc.css')}}">
        <link rel="stylesheet" href="{{asset('assets/kowrie/css/styles.css')}}">
        <link rel="stylesheet" href="{{asset('assets/kowrie/css/jquery.selectbox.css')}}">
        <link rel="stylesheet" href="{{asset('assets/kowrie/css/responsive.css')}}">
        <link href='http://fonts.googleapis.com/css?family=Merriweather+Sans:400,300,800italic,300italic,400italic,700,700italic,800' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Ubuntu:400,300italic,300,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <div id="page">
            <div class="header-top">
                <div class="site-width">
                    <div class="header__region region region-header">
                        <div id="block-superfish-2" class="block block-superfish first last odd">
                            <ul id="superfish-2" class="menu sf-menu sf-menu-kowrie-top-admin sf-horizontal sf-style-none sf-total-items-2 sf-parent-items-0 sf-single-items-2">
                                @if (Auth::check())
                                @if (Auth::user()->hasRole('admin'))
                                <li><a href="{{{ URL::to('admin') }}}">Admin Panel</a></li>
                                @endif
                                <li><a href="{{{ URL::to('user') }}}">Logged in as {{{ Auth::user()->username }}}</a></li>
                                <li><a href="{{{ URL::to('user/logout') }}}">Logout</a></li>
                                @else
                                <li {{ (Request::is('user/login') ? ' class="active"' : '') }}><a href="{{{ URL::to('user/login') }}}">Login</a></li>
                                <li {{ (Request::is('/') ? ' class="active"' : '') }}><a href="{{{ URL::to('/') }}}">Support</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <header class="header" id="header" role="banner">
                <div class="header-inner">
                    <div class="site-width">
                        <div class="header-left">
                            <a href="/drupal/webserver12/" title="Home" rel="home" class="header__logo" id="logo">
                                <img src="{{asset('assets/kowrie/images/logo.png')}}" alt="Home" class="header__logo-image" />
                            </a>
                            <div class="header__name-and-slogan" id="name-and-slogan">
                                <div class="header__site-slogan" id="site-slogan">One Stop Online Reservations</div>
                            </div>
                        </div>
                    </div>
                </div>	
            </header>
            <div id="navigation">
                <div class="site-width">
                    <div class="region region-navigation">
                        <div id="block-domain-menu-block-main-menu" class="block block-domain-menu-block first last odd">
                            <div class="menu-block-wrapper menu-block-main-menu menu-name-dd2dce761741d54fc177bbfe6a043fb3 parent-mlid-0 menu-level-1">
                                <ul class="menu">
                                    <li class="menu__item is-leaf first leaf menu-mlid-784"><a href="/drupal/webserver12/" title="" class="menu__link"><span>Home</span></a></li>
                                    <li class="menu__item is-leaf leaf menu-mlid-933"><a href="/drupal/webserver12/content/our-services" title="" class="menu__link"><span>Our Services</span></a></li>
                                    <li class="menu__item is-leaf leaf menu-mlid-934"><a href="/drupal/webserver12/content/about-us" title="" class="menu__link"><span>About Us</span></a></li>
                                    <li class="menu__item is-leaf leaf menu-mlid-1188"><a href="/drupal/webserver12/accommodation-service-providers-listings" title="" class="menu__link"><span>All Service Providers</span></a></li>
                                    <li class="menu__item is-leaf leaf menu-mlid-1189"><a href="/drupal/webserver12/make-reservation" title="" class="menu__link"><span>Make Reservations</span></a></li>
                                    <li class="menu__item is-leaf leaf menu-mlid-936"><a href="/drupal/webserver12/company/register" title="" class="menu__link"><span>Create An Account</span></a></li>
                                    <li class="menu__item is-leaf last leaf menu-mlid-817"><a href="/drupal/webserver12/content/contact-apartments" title="" class="menu__link"><span>Make An Enquiry</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="main">
                <div class="main-inner">
                    <div class="site-width">	
                        <div class="content-outer">
                            <div class="content_top"></div>
                            <div class="content-main">
                                <!-- Content -->
                                @yield('content')
                                <!-- ./ content -->
                            </div>
                            <footer id="footer" class="region region-footer">
                                <div id="block-block-1" class="block block-block first last odd">
                                    <img src="{{asset('assets/kowrie/images/add.jpg')}}" alt="" />
                                </div>
                            </footer>
                            <div class="region region-footer-messages">
                                <div id="block-block-3" class="block block-block first odd">
                                    <p>Copyright webserver12.com 2014.</p>
                                </div>
                                <div id="block-menu-menu-kowrie-footer-messages" class="block block-menu last even" role="navigation">
                                    <ul class="menu"><li class="menu__item is-leaf first leaf"><a href="/drupal/webserver12/" title="" class="menu__link"><span>Privacy Policy</span></a></li>
                                        <li class="menu__item is-leaf leaf"><a href="/drupal/webserver12/" title="" class="menu__link"><span>Sitemap XML</span></a></li>
                                        <li class="menu__item is-leaf last leaf"><a href="/drupal/webserver12/" title="" class="menu__link"><span>Terms &amp; Conditions</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>