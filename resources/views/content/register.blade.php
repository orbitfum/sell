<div class="top-info-bar">
    <div class="row">

        <div class="medium-6 hide-for-small-only columns">
            <ul class="menu">
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="blog.html">News</a></li>
                <li><a href="shop.html">Shop</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </div><!-- Left Ends /-->
        <div class="my-account-holder float-right medium-3 small-12 columns">
            <div id="cartHolder">
                <div class="cart-holder float-right">

                    <div class="my-account-title" data-toggle="my-cart">
                        <div class="cart-icon float-right">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        </div>
                        <div class="float-left" style="direction: rtl">

                            @if(!Cart::isEmpty())

                                <a href={{url('cart/mycart')}}>{{Cart::getTotalQuantity()}} בעגלה </a>
                            @else
                                <a href={{url('cart//mycart')}}>אין פריטים</a>
                            @endif

                        </div>
                        <div class="clearfix"></div>
                    </div><!-- ends title /-->

                    <!-- Hidden Menus -->
                    <div class="dropdown-pane" id="my-cart" data-dropdown data-hover="true" data-hover-pane="true">
                        <h5>Your Cart Detail</h5>
                        <table>
                            <tbody>
                            <tr>
                                <td><img alt="" src="images/help/product4.jpg"/></td>
                                <td>Beautiful Rhinestone Pearl <br>
                                    2x $ 140
                                </td>
                                <td>280</td>
                            </tr>
                            <tr>
                                <td><img alt="" src="images/help/product4.jpg"/></td>
                                <td>Beautiful Rhinestone Pearl <br>
                                    2x $ 140
                                </td>
                                <td>400</td>
                            </tr>
                            </tbody>
                        </table>
                        <hr>
                        <div class="text-center"><strong>Subtotal: $ 240 </strong></div>
                        <hr>
                        <a href="cart.html" class="button primary float-left">View Cart</a>
                        <a href="checkout.html" class="button success float-right">Checkout</a>
                        <div class="clearfix"></div>
                    </div>
                    <!-- Hidden Menus /-->

                </div><!-- my Cart /-->
            </div>

            <div class="my-account-title" data-toggle="myaccount-dropdown">
                <div class="user-icon float-left">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </div>
                <div class="links float-right">
                    <a href="#" class="sign-in special-margin">התחבר</a> <a href="{{url('register')}}" class="special-margin">הרשמה</a>
                </div>
                <div class="clearfix"></div>
            </div><!-- ends title /-->

            <!-- Hidden Menus -->
            <div class="dropdown-pane" id="myaccount-dropdown" data-dropdown data-hover="true"
                 data-hover-pane="true">
                <ul class="menu vertical">
                    <li><a href="#">My Account</a></li>
                    <li><a href="#">My Orders</a></li>
                    <li><a href="#">Message Center</a></li>
                    <li><a href="#">Wish List</a></li>
                    <li><a href="#">My Favorite Stores</a></li>
                    <li><a href="#">My Coupons</a></li>
                    <li><a href="#">Logout</a></li>
                </ul>
            </div>
            <!-- Hidden Menus /-->

        </div><!-- my account holder /-->


    </div><!-- row /-->
</div>