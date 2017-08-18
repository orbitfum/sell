<!doctype html>
<html lang="en">
<head>
    <!-- important for compatibility charset -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Webful One Page Business template</title>

    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <!-- important for responsiveness remove to make your site non responsive. -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- FavIcon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/favicon.png')}}">

    <!-- Animation CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/animate.css')}}" media="all"/>

    <!-- Foundation CSS File -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/foundation.min.css')}}" media="all"/>

    <!-- Font Awesome CSS File -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}" media="all"/>

    <!-- FlatIcon set -->
    <link rel="stylesheet" type="text/css" href="{{asset('fonts/flaticon/flaticon.css')}}" media="all"/>

    <!-- OWL Crousel CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/owl.carousel.css')}}" media="all"/>

    <!-- Theme Styles CSS File -->
    <link rel="stylesheet" type="text/css" href="{{asset('style.css')}}" media="all"/>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700%7CMontserrat:400,700%7CRoboto+Slab:400,700%7CRoboto:700,900"
          rel="stylesheet" type="text/css">

    <!-- Revolution Slider Files Delete if not using slider. -->
    <link rel="stylesheet" type="text/css" href="{{asset('lib/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css')}}">

    <!-- REVOLUTION STYLE SHEETS -->
    <link rel="stylesheet" type="text/css" href="{{asset('lib/css/settings.css')}}">
    <!-- REVOLUTION LAYERS STYLES -->
    <link rel="stylesheet" type="text/css" href="{{asset('lib/css/layers.css')}}">

    <!-- REVOLUTION NAVIGATION STYLES -->
    <link rel="stylesheet" type="text/css" href="{{asset('lib/css/navigation.css')}}">
    {{--orr--}}
    <link rel="stylesheet" type="text/css" href="{{asset('css/second.css')}}">
    <script> var BASEURL = "{{url('')}}/" </script>

</head>

<body>
<!-- MAIN Container Start here. -->
<div class="container">

    <!-- Top Bar Starts Here -->
    <div class="topnav">
        <div class="row" style="position: relative">
            <ul class="navuser">
                @if(Session::has('user_name'))
                    <li>ברוך הבא {{Session::get('user_name')}}</li>
                    <li><a href="{{url('user/logut')}}" style="color: #fff;">התנתק</a></li>
                @else
                    <li id="register"><i class="fa fa-user-plus" aria-hidden="true"> </i> הרשמה
                    </li>
                    <li id="loginsm" class="hide-for-large hide-for-medium-only"><i class="fa fa-sign-in"
                                                                                    aria-hidden="true"></i> התחבר
                    </li>
                    <li id="login" class="hide-for-small-only"><i class="fa fa-sign-in" aria-hidden="true"></i> התחברות
                    </li>

                @endif
                <li class="cartvav"><a href="{{url('cart/mycart')}}" class="acat"> <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    <div id="cart">

                        @if(!Cart::isEmpty())

                            {{Cart::getTotalQuantity()}}
                        @else
                            0
                        @endif

                    </div>
                    </a>
                </li>
                <li class="cartvav">
                    <a href="#" class="acat"><i class="fa fa-heart-o" aria-hidden="true"></i>
                    <div id="wish">0</div>
                    </a>
                </li>
            </ul>


            <ul class="navuserleft  hide-for-small-only">
                <li><i class="fa fa-envelope-o" aria-hidden="true"></i> צור קשר</li>
                <li><i class="fa fa-info" aria-hidden="true"></i> מי אנחנו</li>

            </ul>

            <ul class="navbar-cat hide-for-large-only" style="margin-left: 0">
                <li>
                    <div class="top-bar-title float-right hide-for-large-only">
                        <span class="menu-icon light float-left" data-toggle="categories-dropdown"></span>
                        <div class="dropdown-pane main-nav-container bottom left" id="categories-dropdown" data-dropdown
                             data-hover="true" data-hover-pane="true">
                            <!-- Categories -->
                            <div class="widget categories">
                                <h2>Categories</h2>

                                <nav class="widget-content">
                                    <ul class="menu dropdown vertical" data-responsive-menu="accordion medium-dropdown">
                                        <li class="mega-menu parent-nav"><a href="#"><i
                                                        class="flaticon-black-female-dress"></i> Women’s Clothing</a>
                                            <ul class="child-nav backgroundstyle1">
                                                <li>
                                                    <div class="medium-3 small-12 columns inner-mega">
                                                        <h4>Hot Categories</h4>
                                                        <ul class="menu vertical">
                                                            <li><a href="#">Dresses</a></li>
                                                            <li><a href="#">Blouses & Shirts</a></li>
                                                            <li><a href="#">T-Shirts</a></li>
                                                            <li><a href="#">Tank Tops</a></li>
                                                            <li><a href="#">Jumpsuits & Rompers</a></li>
                                                            <li><a href="#">Bra & Brief Sets</a></li>
                                                        </ul>
                                                    </div>

                                                    <div class="medium-3 small-12 columns inner-mega">
                                                        <h4>Bottoms</h4>
                                                        <ul class="menu vertical">
                                                            <li><a href="#">Skirts</a></li>
                                                            <li><a href="#">Shorts</a></li>
                                                            <li><a href="#">Jeans</a></li>
                                                            <li><a href="#">Pants & Capris</a></li>
                                                            <li><a href="#">Leggings</a></li>
                                                        </ul>
                                                    </div>

                                                    <div class="medium-3 small-12 columns inner-mega">
                                                        <h4>Outwear & Sweaters</h4>
                                                        <ul class="menu vertical">
                                                            <li><a href="#">Blazers</a></li>
                                                            <li><a href="#">Hoodies & Sweatshirts</a></li>
                                                            <li><a href="#">Basic Jackets</a></li>
                                                            <li><a href="#">Trench</a></li>
                                                            <li><a href="#">Cardigans</a></li>
                                                            <li><a href="#">Pullovers</a></li>
                                                        </ul>
                                                    </div>

                                                    <div class="medium-3 small-12 columns inner-mega">
                                                        <h4>Intim & Sleepwear</h4>
                                                        <ul class="menu vertical">
                                                            <li><a href="#">Bras</a></li>
                                                            <li><a href="#">Panties</a></li>
                                                            <li><a href="#">Shapers</a></li>
                                                            <li><a href="#">Bra & Brief Sets</a></li>
                                                            <li><a href="#">Nightgowns & Sleepshirts</a></li>
                                                            <li><a href="#">Pajama Sets</a></li>
                                                        </ul>
                                                    </div>

                                                    <div class="medium-3 small-12 columns inner-mega">
                                                        <h4>Weddings & Events</h4>
                                                        <ul class="menu vertical">
                                                            <li><a href="#">Wedding Dresses</a></li>
                                                            <li><a href="#">Evening Dresses</a></li>
                                                            <li><a href="#">Prom Dresses</a></li>
                                                            <li><a href="#">Bridesmaid Dresses</a></li>
                                                            <li><a href="#">Flower Girl Dresses</a></li>
                                                            <li><a href="#">Cocktail Dresses</a></li>
                                                        </ul>
                                                    </div>

                                                    <div class="medium-3 small-12 columns inner-mega float-left">
                                                        <h4>Accessories</h4>
                                                        <ul class="menu vertical">
                                                            <li><a href="#">Sunglasses</a></li>
                                                            <li><a href="#">Headwear</a></li>
                                                            <li><a href="#">Baseball Caps</a></li>
                                                            <li><a href="#">Scarves & Wraps</a></li>
                                                            <li><a href="#">Belts</a></li>
                                                            <li><a href="#">Skullies & Beanies</a></li>
                                                        </ul>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="mega-menu parent-nav"><a href="#"><i
                                                        class="flaticon-male-businessman-clothes"></i> Men’s
                                                Clothing</a>
                                            <ul class="child-nav second-child-nav backgroundstyle2">
                                                <li>
                                                    <div class="medium-3 small-12 columns inner-mega">
                                                        <h4>Hot Categories</h4>
                                                        <ul class="menu vertical">
                                                            <li><a href="#">Dresses</a></li>
                                                            <li><a href="#">Blouses & Shirts</a></li>
                                                            <li><a href="#">T-Shirts</a></li>
                                                            <li><a href="#">Tank Tops</a></li>
                                                            <li><a href="#">Jumpsuits & Rompers</a></li>
                                                            <li><a href="#">Bra & Brief Sets</a></li>
                                                        </ul>
                                                    </div>

                                                    <div class="medium-3 small-12 columns inner-mega">
                                                        <h4>Bottoms</h4>
                                                        <ul class="menu vertical">
                                                            <li><a href="#">Skirts</a></li>
                                                            <li><a href="#">Shorts</a></li>
                                                            <li><a href="#">Jeans</a></li>
                                                            <li><a href="#">Pants & Capris</a></li>
                                                            <li><a href="#">Leggings</a></li>
                                                        </ul>
                                                    </div>

                                                    <div class="medium-3 small-12 columns inner-mega">
                                                        <h4>Outwear & Sweaters</h4>
                                                        <ul class="menu vertical">
                                                            <li><a href="#">Blazers</a></li>
                                                            <li><a href="#">Hoodies & Sweatshirts</a></li>
                                                            <li><a href="#">Basic Jackets</a></li>
                                                            <li><a href="#">Trench</a></li>
                                                            <li><a href="#">Cardigans</a></li>
                                                            <li><a href="#">Pullovers</a></li>
                                                        </ul>
                                                    </div>

                                                    <div class="medium-3 small-12 columns inner-mega">
                                                        <h4>Intim & Sleepwear</h4>
                                                        <ul class="menu vertical">
                                                            <li><a href="#">Bras</a></li>
                                                            <li><a href="#">Panties</a></li>
                                                            <li><a href="#">Shapers</a></li>
                                                            <li><a href="#">Bra & Brief Sets</a></li>
                                                            <li><a href="#">Nightgowns & Sleepshirts</a></li>
                                                            <li><a href="#">Pajama Sets</a></li>
                                                        </ul>
                                                    </div>

                                                    <div class="medium-3 small-12 columns inner-mega float-left">
                                                        <h4>Weddings & Events</h4>
                                                        <ul class="menu vertical">
                                                            <li><a href="#">Wedding Dresses</a></li>
                                                            <li><a href="#">Evening Dresses</a></li>
                                                            <li><a href="#">Prom Dresses</a></li>
                                                            <li><a href="#">Bridesmaid Dresses</a></li>
                                                            <li><a href="#">Flower Girl Dresses</a></li>
                                                            <li><a href="#">Cocktail Dresses</a></li>
                                                        </ul>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="#"><i class="fa fa-mobile" aria-hidden="true"></i> Phones &
                                                Accessories</a>
                                        </li>
                                        <li><a href="#"><i class="flaticon-monitor"></i> Computer & Office</a></li>
                                        <li><a href="#"><i class="flaticon-tablet-pdf-hand-pointing"></i> Consumer
                                                Electronics</a></li>
                                        <li><a href="#"><i class="flaticon-gold-ingots"></i> Jewelry &amp;
                                                Accessories</a>
                                        </li>
                                        <li><a href="#"><i class="flaticon-book-shopping-cart"></i> Home &amp;
                                                Garden</a>
                                        </li>
                                        <li><a href="#"><i class="flaticon-feminine-heel-shoe"></i> Bags & Shoes</a>
                                        </li>
                                        <li><a href="#"><i class="flaticon-gift-box-with-ribbon"></i> Toys, Kids & Baby</a>
                                        </li>
                                        <li><a href="#"><i class="flaticon-shoe-side"></i> Sports &amp; Outdoor</a></li>
                                        <li><a href="#"><i
                                                        class="flaticon-drink-glass-with-an-umbrella-and-a-fruit-slice-on-border"></i>
                                                Health &amp; Beauty</a></li>
                                        <li><a href="#"><i class="flaticon-business-calendar-symbol-on-day-11"></i>
                                                Watches</a>
                                        </li>
                                    </ul>
                                </nav><!-- widget-content /-->

                            </div><!-- widget /-->
                            <!-- Categories -->
                        </div> <!-- drop down container /-->
                    </div> <!-- Categories /-->

                </li>

            </ul>

            <div class="facbook hide-for-small-only">
                <iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2F%25D7%2596%25D7%2594-%25D7%25A7%25D7%259C-%25D7%259C%25D7%25A7%25D7%25A0%25D7%2595%25D7%25AA-%25D7%259E%25D7%2597%25D7%2595%25D7%259C-272067086606441%2F&width=80&layout=button_count&action=like&size=large&show_faces=false&share=false&height=21&appId=1899215936968165"
                        width="80" height="41" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                        allowTransparency="true"></iframe>
            </div>

        </div>
    </div>
    <!-- top Bar Ends here /-->

    <!-- Header Starts -->
    <div class="header">
        <div class="row">

            <div class="medium-10  small-12 columns">

                <main>

                    <input id="tab1" type="radio" name="tabs" checked>
                    <label for="tab1"><img src="{{asset('images/search/ebay.png')}}"></label>

                    <input id="tab2" type="radio" name="tabs">
                    <label for="tab2"><img src="{{asset('images/search/aliexpress.png')}}"></label>

                    <input id="tab3" type="radio" name="tabs">
                    <label for="tab3"><img src="{{asset('images/search/dealextreme.png')}}"></label>

                    <input id="tab4" type="radio" name="tabs">
                    <label for="tab4"><img src="{{asset('images/search/pinkcherry.jpg')}}"></label>

                    <section id="content1">

                        <div class="main-search-form">
                            <form method="get" action="{{url('ebay/search')}}" autocomplete="on">
                                @if(isset($_GET['q']))
                                    <input type="text" name="q" value="{{isset($_GET['q'])?$_GET['q']:''}}"
                                           autocomplete="on" placeholder="רשום את המוצר שאתה מחפש באייבי"
                                           class="search-head">
                                @elseif(isset($q))
                                    <input type="text" name="q"
                                           value="{{isset($q)?$q:''}}" autocomplete="on"
                                           placeholder="רשום את המוצר שאתה מחפש באייבי" class="search-head"/>
                                @else
                                    <input type="text" name="q"
                                           value="{{isset($q)?$q:''}}" autocomplete="on"
                                           placeholder="רשום את המוצר שאתה מחפש באייבי" class="search-head"/>
                                @endif

                                <select>
                                    <option value="0">All Categories</option>
                                    <option value="1">Women's Clothing &amp; Accessories</option>
                                    <option value="2">Men's Clothing &amp; Accessories</option>

                                </select>
                                <button type="submit" class="black-btn button"><i class="fa fa-search"></i></button>
                            </form>
                        </div><!-- main search form /-->
                    </section>

                    <section id="content2">

                        <div class="main-search-form">
                            <form method="get" action="{{url('ebay/search')}}" autocomplete="on">
                                <input type="text" name="q"
                                       {{isset($_GET['q'])?"value={$_GET['q']}":''}} autocomplete="on"
                                       placeholder="רשום את המוצר שאתה מחפש באליאקפרס" class="search-head"/>
                                <select>
                                    <option value="0">All Categories</option>
                                    <option value="1">Women's Clothing &amp; Accessories</option>
                                    <option value="2">Men's Clothing &amp; Accessories</option>

                                </select>
                                <button type="submit" class="black-btn button"><i class="fa fa-search"></i></button>
                            </form>
                        </div><!-- main search form /-->

                    </section>

                    <section id="content3">

                        <div class="main-search-form">
                            <form method="get" action="{{url('ebay/search')}}" autocomplete="on">
                                <input type="text" name="q"
                                       {{isset($_GET['q'])?"value={$_GET['q']}":''}} autocomplete="on"
                                       placeholder="רשום את המוצר שאתה מחפש בדיל-אקסטרים" class="search-head"/>
                                <select>
                                    <option value="0">All Categories</option>
                                    <option value="1">Women's Clothing &amp; Accessories</option>
                                    <option value="2">Men's Clothing &amp; Accessories</option>

                                </select>
                                <button type="submit" class="black-btn button"><i class="fa fa-search"></i></button>
                            </form>
                        </div><!-- main search form /-->
                    </section>

                    <section id="content4">

                        <div class="main-search-form">
                            <form method="get" action="{{url('ebay/search')}}" autocomplete="on">
                                <input type="text" name="q"
                                       {{isset($_GET['q'])?"value={$_GET['q']}":''}} autocomplete="on"
                                       placeholder="רשום את המוצר שאתה מחפש בפוסי" class="search-head"/>
                                <select>
                                    <option value="0">All Categories</option>
                                    <option value="1">Women's Clothing &amp; Accessories</option>
                                    <option value="2">Men's Clothing &amp; Accessories</option>

                                </select>
                                <button type="submit" class="black-btn button"><i class="fa fa-search"></i></button>
                            </form>
                        </div><!-- main search form /-->
                    </section>

                </main>

            </div><!-- Second Column /-->


            <div class="medium-2 small-12 columns logo-container">
                <div class="logo float-right">
                    <a href="index.html">
                        <img alt="" src="{{asset('images/logo.png')}}"/>
                    </a>
                </div><!-- Logo /-->

                <!-- Categories -->


            </div><!-- first column /-->

        </div><!-- Row /-->
    </div>
    <!-- Header Ends /-->

@yield('content')

<!-- Footer -->
    <div class="footer">
        <div class="footerTop">
            <div class="row inner-padding">
                <div class="large-2 medium-6 small-12 columns footer-widget">
                    <h2>Account</h2>
                    <div class="tx-div"></div>
                    <ul class="menu vertical">
                        <li><a href="#">My Account</a></li>
                        <li><a href="#">Shopping Cart</a></li>
                        <li><a href="#">Your Profile</a></li>
                        <li><a href="#">Your Orders</a></li>
                        <li><a href="#">Your Wishlist</a></li>
                        <li><a href="#">Available Coupons</a></li>
                    </ul>
                </div>

                <div class="large-2 medium-6 small-12 columns footer-widget">
                    <h2>Information</h2>
                    <div class="tx-div"></div>
                    <ul class="menu vertical">
                        <li><a href="#">Return Policy</a></li>
                        <li><a href="#">Exchange Policy</a></li>
                        <li><a href="#">Payment Terms</a></li>
                        <li><a href="#">Faq's</a></li>
                        <li><a href="#">Warranty Policy</a></li>
                        <li><a href="#">Track your order</a></li>
                    </ul>
                </div>

                <div class="large-2 medium-6 small-12 columns footer-widget">
                    <h2>Make Money</h2>
                    <div class="tx-div"></div>
                    <ul class="menu vertical">
                        <li><a href="#">Become a Retailer</a></li>
                        <li><a href="#">Become a Wholesaler</a></li>
                        <li><a href="#">Factory Seller's</a></li>
                        <li><a href="#">Earn Comission</a></li>
                        <li><a href="#">How to Ship</a></li>
                        <li><a href="#">Getting Paid</a></li>
                    </ul>
                </div>

                <div class="large-2 medium-6 small-12 columns footer-widget">
                    <h2>Customer Service</h2>
                    <div class="tx-div"></div>
                    <ul class="menu vertical">
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Request Exchange</a></li>
                        <li><a href="#">Customer FAQ's</a></li>
                        <li><a href="#">Happy Customers</a></li>
                        <li><a href="#">Update Shipping Address</a></li>
                    </ul>
                </div>

                <div class="large-3 medium-6 small-12 columns footer-widget">
                    <div class="textwidget">
                        <ul class="address">
                            <li>
                                <i class="fa fa-home"></i>
                                <h4>Address:</h4>
                                <p>132 Jefferson Avenue, Suite 22,
                                    Redwood City, CA 94872, USA</p>
                            </li>
                            <li>
                                <i class="fa fa-mobile"></i>
                                <h4>Phone:</h4>
                                <p>(00) 123 456 789</p>
                            </li>
                            <li>
                                <i class="fa fa-envelope"></i>
                                <h4>Email:</h4>
                                <p>Name@gmail.com</p>
                            </li>
                        </ul>
                        <hr>
                        <div class="socialicons">
                            Follow Us:
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-google"></i></a>
                        </div>
                    </div>
                </div>
            </div><!-- Row /-->
        </div><!-- footerTop Ends here.. -->

        <!-- Footer bottom -->
        <div class="footerbottom">
            <div class="row">
                <div class="medium-6 small-12 columns">
                    <ul class="menu">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="blog.html">News</a></li>
                        <li><a href="shop.html">Shop</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
                    </ul>
                    <div class="clearfix"></div>
                    <div class="copyrightinfo">2016 © <a href="#">Webful Creations Vision</a> All Rights Reserved.</div>
                </div><!--left side-->
                <div class="medium-6 small-12 columns hide-for-small-only">
                    <div class="payment pull-right">
                        <h2>Payment Methods</h2>
                        <a href="#"><i class="fa fa-cc-mastercard"></i></a>
                        <a href="#"><i class="fa fa-cc-visa"></i></a>
                        <a href="#"><i class="fa fa-cc-paypal"></i></a>
                        <a href="#"><i class="fa fa-cc-discover"></i></a>
                        <a href="#"><i class="fa fa-credit-card"></i></a>
                        <a href="#"><i class="fa fa-cc-amex"></i></a>
                    </div>
                </div><!--Right Side-->
            </div>
        </div><!-- footer Bottom -->
    </div>
    <!-- Footer Ends here -->

</div>


<!-- MAIN Container Ends here. -->
<a href="#top" id="top" class="animated fadeInUp start-anim"><i class="fa fa-angle-up"></i></a>
<!-- Page Preloader -->
<div class="preloader">
    <div class="cssload-thecube">
        <div class="cssload-cube cssload-c1"></div>
        <div class="cssload-cube cssload-c2"></div>
        <div class="cssload-cube cssload-c4"></div>
        <div class="cssload-cube cssload-c3"></div>
    </div>
</div>

@include('inc.error')

<!-- Including Jquery so All js Can run -->
<script type="text/javascript" src="{{asset('js/jquery-1.12.3.min.js')}}"></script>

<!-- Including Foundation JS so Foundation function can work. -->
<script type="text/javascript" src="{{asset('js/foundation.min.js')}}"></script>
<!-- Crousel JS -->
<script type="text/javascript" src="{{asset('js/owl.carousel.min.js')}}"></script>
<!-- jQuery Timer plugin delete if not using -->
<script src="{{asset('js/jquery.simple.timer.js')}}"></script>

<!-- Revolution Slider Files delete if not using slider -->
<script type="text/javascript" src="{{asset('lib/js/jquery.themepunch.tools.min.js')}}"></script>
<script type="text/javascript" src="{{asset('lib/js/jquery.themepunch.revolution.min.js')}}"></script>

<!-- SLIDER REVOLUTION 5.0 EXTENSIONS
    (Load Extensions only on Local File Systems !
    The following part can be removed on Server for On Demand Loading) -->
<script type="text/javascript" src="{{asset('lib/js/extensions/revolution.extension.actions.min.js')}}"></script>
<script type="text/javascript" src="{{asset('lib/js/extensions/revolution.extension.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('lib/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
<script type="text/javascript" src="{{asset('lib/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
<script type="text/javascript" src="{{asset('lib/js/extensions/revolution.extension.migration.min.js')}}"></script>
<script type="text/javascript" src="{{asset('lib/js/extensions/revolution.extension.navigation.min.js')}}"></script>
<script type="text/javascript" src="{{asset('lib/js/extensions/revolution.extension.parallax.min.js')}}"></script>
<script type="text/javascript" src="{{asset('lib/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
<script type="text/javascript" src="{{asset('lib/js/extensions/revolution.extension.video.min.js')}}"></script>
<!-- Revolution Slider Files Ends Delete if not using slider. -->


<!-- Webful JS -->
<script src="{{asset('js/webful.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
@include('inc.modal')


@yield('jscode')

</body>
</html>