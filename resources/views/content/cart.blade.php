@extends('main')

@section ('content')
<?php print_r($cart);?>
    <!-- Content Area -->
    <div class="content-container module contact-page">

        <!-- Title Section -->
        <div class="title-section">
            <div class="row">
                <div class="small-12 columns">
                    <h1>Your Shopping Cart</h1>
                </div> <!-- title /-->
            </div><!-- row /-->
        </div>
        <!-- Title Section End -->

        <div class="row">
            <div class="small-12 columns">
                <ul class="breadcrumbs">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Features</a></li>
                    <li class="disabled">Gene Splicing</li>
                    <li>
                        <span class="show-for-sr">Current: </span> Cloning
                    </li>
                </ul>
            </div><!-- breadcrumbs /-->
        </div><!-- Row ends /-->

        <div class="row cart-page">

            <div class="small-12 columns">

                <div class="featured-area small-module">
                    <div class="section-title">
                        <div class="clearfix"></div>
                    </div><!-- section title /-->

                    <div class="content-section new-items-wrap">
                        <div class="medium-8 small-12 columns responsive-table">
                            <table class="shop_table cart responsive">
                                <thead>
                                <tr>
                                    <th class="product-name" colspan="3">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-notes">Your Comments</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($cart as $item)
                                <tr class="cart-item" data-id="{{$item['id']}}">

                                    <td class="product-remove">
                                        <a href="" class="remove" title="Remove this item" data-id="{{$item['id']}}"><span class="fa fa-close"></span></a>
                                    </td>

                                    <td class="product-thumbnail">
                                        <a href=""><img width="114" height="130" src="{{$item['attributes']['img']}}" alt=""></a>
                                    </td>

                                    <td class="product-name">
                                        <a href="#">{{$item['name']}}</a>

                                        <div class="product-detail">
                                            Color: Green
                                        </div>
                                    </td>

                                    <td class="product-price">
                                        <span class="amount">$&nbsp;{{$item['price']}}</span>
                                    </td>

                                    <td class="product-comment">
                                        <textarea placeholder="Optional Note"></textarea>
                                    </td>

                                    <td class="product-quantity">
                                        <div class="quantity buttons_added">
                                            <input type="number" value="{{$item['quantity']}}" title="Qty" class="input-text qty text" size="4">
                                        </div>
                                    </td>

                                    <td class="product-subtotal">
                                        <span class="amount">$&nbsp;{{$item['price'] * $item['quantity']}}</span>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>

                            </table>
                        </div><!-- left /-->

                        <div class="medium-4 small-12 columns">
                            <div class="total-container">
                                <table>
                                    <tr>
                                        <th>Subtotal</th>
                                        <td>235$</td>
                                    </tr>
                                    <tr>
                                        <th>Shipping</th>
                                        <td>5$ (FLAT)</td>
                                    </tr>
                                    <tr>
                                        <th>Coupon Discount</th>
                                        <td>5% - 22$</td>
                                    </tr>
                                    <tr>
                                        <th>Grand Total</th>
                                        <td>500$</td>
                                    </tr>
                                </table>
                            </div><!-- total container /-->
                            <div class="cart-total-wrap">
                                <ul class="accordion" data-accordion>
                                    <li class="accordion-item" data-accordion-item>
                                        <a href="#" class="accordion-title">Have Coupon from seller?</a>
                                        <div class="accordion-content cart-accordion" data-tab-content>
                                            <input type="text" placeholder="Coupon code here..." />
                                            <input type="submit" class="button secondary" value="Apply!" />
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <textarea class="cart-total-wrap" placeholder="Optional Note to this seller..."></textarea>
                                <input type="submit" class="button primary float-right" value="Buy From this Seller" />
                            </div> <!-- right /-->
                        </div><!-- Shop Cart Detail /-->
                        <div class="clearfix"></div>
                    </div> <!-- content section /-->
                </div><!-- Featured Area -->

                <div class="featured-area small-module">
                    <div class="section-title">
                        <h2 class="float-left">Seller: <a href="#">Galaxy Wardrobe</a></h2> <a href="#" class="float-left">Contact Seller</a>
                        <div class="clearfix"></div>
                    </div><!-- section title /-->

                    <div class="content-section new-items-wrap">
                        <div class="medium-8 small-12 columns responsive-table">
                            <table class="shop_table cart responsive">
                                <thead>
                                <tr>
                                    <th class="product-name" colspan="3">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-notes">Your Comments</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                </tr>
                                </thead>

                                <tbody>
                                <tr class="cart-item">

                                    <td class="product-remove">
                                        <a href="" class="remove" title="Remove this item"><span class="fa fa-close"></span></a>
                                    </td>

                                    <td class="product-thumbnail">
                                        <a href=""><img width="114" height="130" src="images/help/product2-1.jpg" alt=""></a>
                                    </td>

                                    <td class="product-name">
                                        <a href="#">New Dog Cage Five Petals Flowers Opal Stud</a>
                                        <div class="">
                                            <span class="amount">$&nbsp;140.00</span>
                                        </div>
                                        <div class="product-detail">
                                            Color: Green
                                        </div>
                                    </td>

                                    <td class="product-price">
                                        <span class="amount">$&nbsp;140.00</span>
                                    </td>

                                    <td class="product-comment">
                                        <textarea placeholder="Optional Note"></textarea>
                                    </td>

                                    <td class="product-quantity">
                                        <div class="quantity buttons_added">
                                            <input type="number" value="1" title="Qty" class="input-text qty text" size="4">
                                        </div>
                                    </td>

                                    <td class="product-subtotal">
                                        <span class="amount">$&nbsp;140.00</span>
                                    </td>
                                </tr>

                                <tr class="cart-item">

                                    <td class="product-remove">
                                        <a href="" class="remove" title="Remove this item"><span class="fa fa-close"></span></a>
                                    </td>

                                    <td class="product-thumbnail">
                                        <a href=""><img width="114" height="130" src="images/help/product3-1.jpg" alt=""></a>
                                    </td>

                                    <td class="product-name">
                                        <a href="single-product.html">Five Start Good mattle band for Cat</a>
                                        <div class="">
                                            <span class="amount">$&nbsp;140.00</span>
                                        </div>
                                        <div class="product-detail">
                                            Color: Green
                                        </div>
                                    </td>

                                    <td class="product-price">
                                        <span class="amount">$&nbsp;140.00</span>
                                    </td>

                                    <td class="product-comment">
                                        <textarea placeholder="Optional Note"></textarea>
                                    </td>

                                    <td class="product-quantity">
                                        <div class="quantity buttons_added">
                                            <input type="number" value="1" title="Qty" class="input-text qty text" size="4">
                                        </div>
                                    </td>

                                    <td class="product-subtotal">
                                        <span class="amount">$&nbsp;140.00</span>
                                    </td>
                                </tr>
                                </tbody>

                            </table>
                        </div><!-- left /-->

                        <div class="medium-4 small-12 columns">
                            <div class="total-container">
                                <table>
                                    <tr>
                                        <th>Subtotal</th>
                                        <td>235$</td>
                                    </tr>
                                    <tr>
                                        <th>Shipping</th>
                                        <td>5$ (FLAT)</td>
                                    </tr>
                                    <tr>
                                        <th>Coupon Discount</th>
                                        <td>5% - 22$</td>
                                    </tr>
                                    <tr>
                                        <th>Grand Total</th>
                                        <td>500$</td>
                                    </tr>
                                </table>
                            </div><!-- total container /-->
                            <div class="cart-total-wrap">
                                <ul class="accordion" data-accordion>
                                    <li class="accordion-item" data-accordion-item>
                                        <a href="#" class="accordion-title">Have Coupon from seller?</a>
                                        <div class="accordion-content cart-accordion" data-tab-content>
                                            <input type="text" placeholder="Coupon code here..." />
                                            <input type="submit" class="button secondary" value="Apply!" />
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <textarea class="cart-total-wrap" placeholder="Optional Note to this seller ..."></textarea>
                                <input type="submit" class="button primary float-right" value="Buy From this Seller" />
                            </div> <!-- right /-->
                        </div><!-- Shop Cart Detail /-->
                        <div class="clearfix"></div>
                    </div> <!-- content section /-->
                </div><!-- Featured Area -->

                <div class="row">
                    <div class="medium-4 small-12 medium-offset-8 small-offset-0 columns">
                        <div class="cart-total-wrap">
                            <ul class="accordion" data-accordion>
                                <li class="accordion-item" data-accordion-item>
                                    <a href="#" class="accordion-title">Have Coupon from webful market?</a>
                                    <div class="accordion-content cart-accordion" data-tab-content>
                                        <input type="text" placeholder="Coupon code here..." />
                                        <input type="submit" class="button secondary" value="Apply!" />
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <table>
                            <tr>
                                <th>Subtotal</th>
                                <td>225$</td>
                            </tr>
                            <tr>
                                <th>Shipping</th>
                                <td>200$</td>
                            </tr>
                            <tr>
                                <th>Grand Total</th>
                                <td>445$</td>
                            </tr>
                        </table>
                        <input type="submit" class="button primary float-right" value="Buy All" />
                    </div>
                </div><!-- grand total row ends /-->

            </div>
            <!-- sidebar Ends -->

        </div><!-- row ends /-->
    </div>
    <!-- Content Area Ends -->

    <!-- Call to Action box -->
    <div class="call-to-action">
        <div class="row">
            <div class="medium-5 small-12 columns">
                <h4><i class="fa fa-envelope" aria-hidden="true"></i> Subscribe to our newsletter Receive offers</h4>
            </div>
            <div class="medium-7 small-12 columns signup-form">
                <!-- newsletter Form -->
                <form>
                    <div class="medium-5 small-12 columns">
                        <label>
                            <input type="text" placeholder="Your full name..." />
                        </label>
                    </div>
                    <div class="medium-5 small-12 columns">
                        <label>
                            <input type="text" placeholder="Your email address..." />
                        </label>
                    </div>
                    <div class="medium-2 small-12 columns">
                        <label>
                            <input type="button" class="secondary button" value="Subscribe!" />
                        </label>
                    </div>

                </form>
                <!-- Newsletter Form /-->
            </div>
        </div><!-- row -->
    </div>
    <!-- Call to Action End -->




@endsection