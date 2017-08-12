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
                                        <span class="amount">₪&nbsp;{{$item['price']}}</span>
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
                                        <span class="amount">₪&nbsp;{{$item['price'] * $item['quantity']}}</span>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>

                            </table>
                        </div><!-- left /-->

                        <div class="medium-4 small-12 columns infoAddress" dir="rtl">
                            <b>פרטים עבור המשלוח</b>
                         <form  method="post" action="" dir="rtl">
                             {{csrf_field()}}
                             <label for="email">דואר אלקטרוני</label>
                             <input name="email" placeholder="דואר אלקטרוני" type="text">
                             <label for="name">שם פרטי ומשפחה <span>באנגלית</span></label>
                             <input name="name" placeholder="שם פרטי ומשפחה באנגלית" type="text">
                             <label for="phone">פלאפון</label>
                             <input name="phone" type="text" placeholder="הכנס מספר פלאפון">
                             <label for="city">עיר <span>באנגלית</span></label>
                             <input name="city" type="text" placeholder="עיר באנגלית">
                             <label for="address">רחוב <span>באנגלית</span></label>
                             <input name="address" type="text" placeholder="רחוב באנגלית">
                             <label for="address">בית</label>
                             <input name="numberhome" type="text">
                             <label for="address">דירה</label>
                             <input name="numberdira" type="text">
                         </form>



                                <input type="submit" class="button primary float-right" value="לתשלום" />
                            </div>
                        <div class="medium-4 small-12 columns">
                            dfasdas



                            <input type="submit" class="button primary float-right" value="לתשלום" />
                        </div><!-- right /-->
                        </div><!-- Shop Cart Detail /-->
                        <div class="clearfix"></div>
                    </div> <!-- content section /-->
                </div><!-- Featured Area -->



            </div>
            <!-- sidebar Ends -->

        </div><!-- row ends /-->
    </div>




@endsection