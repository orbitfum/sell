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
            @if(!empty($cart))

            <div class="small-12 columns">

                <div class="small-module">

                        <div class="medium-8 small-12 columns responsive-table" style="padding-left: 0.4rem; padding-right: 0.4rem">

                            <table class="shop_table cart responsive">
                                <thead>
                                <tr>
                                    <th class="product-name" colspan="3">מוצר</th>
                                    <th class="product-price">מחיר</th>
                                    <th class="product-notes">משלוח</th>
                                    <th class="product-quantity">כמות</th>
                                    <th class="product-subtotal">סה"כ</th>
                                </tr>
                                </thead>

                                <tbody>

                                @foreach($cart as $item)
                                <tr class="cart-item" data-id="{{$item['id']}}">
                                    <div class="spinner-bg">
                                        <div class="dot1"></div>
                                        <div class="dot2"></div></div>

                                    <td class="product-remove">
                                        <a href="" class="remove-item" title="Remove this item" data-id="{{$item['id']}}"><span class="fa fa-close"></span></a>
                                    </td>

                                    <td class="product-thumbnail">
                                        <a href=""><img width="114" height="130" src="{{$item['attributes']['img']}}" alt=""></a>
                                    </td>

                                    <td class="product-name">
                                        <a href="">{{$item['name']}}</a>

                                        <div class="product-detail">
                                            מאפיינים:
                                            {{$item['attributes']['val1']}}
                                            @if(!empty($item['attributes']['val2']))
                                                , {{$item['attributes']['val2']}}
                                            @elseif(!empty($item['attributes']['val3']))
                                                , {{$item['attributes']['val3']}}
                                            @elseif(!empty($item['attributes']['val4']))
                                                , {{$item['attributes']['val4']}}
                                            @endif
                                        </div>
                                    </td>

                                    <td class="product-price">
                                        <span class="amount">₪&nbsp;{{$item['price']}}</span>
                                    </td>

                                    <td class="product-comment">
                                        <span class="amount">₪&nbsp;{{$item['attributes']['shipping']}}</span>
                                    </td>

                                    <td class="product-quantity">
                                        <div class="quantity buttons_added">
                                            <input type="number" data-id="{{$item['id']}}" value="{{$item['quantity']}}" title="Qty" class="input-text text" id="update-cart" size="2" style="width: 50px">
                                        </div>
                                    </td>

                                    <td class="product-subtotal">
                                        <span class="amount">₪&nbsp;{{($item['price'] * $item['quantity']) + ($item['attributes']['shipping'] * $item['quantity'])}}</span>
                                    </td>
                                    <input type="hidden" id="itemid" value="{{$item['id']}}" />
                                    <input type="hidden" id="itemAttributes" value="{{$item['attributes']['attribute']}}" />
                                    <input type="hidden" id="currentPrice" value="{{$item['attributes']['realprice']}}" />
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
                             <span class="text-danger email_error" style="display: none;">דוא"ל תקין בלבד.</span>
                             <input name="email" placeholder="דואר אלקטרוני" type="email" id="email" onkeyup="checkEmail(this.value)">

                             <label for="customerName">שם פרטי ומשפחה <span>באנגלית</span></label>
                             <span class="text-danger customerName" style="display: none;"></span>
                             <input name="customerName" placeholder="שם פרטי ומשפחה באנגלית" type="text" id="customerName">

                             <label for="phone">פלאפון</label>
                             <span class="text-danger phone" id="phone-valid" style="display: none;"></span>
                             <input name="phone" type="text" id="phone" placeholder="הכנס מספר פלאפון">


                             <label for="city">עיר <span>באנגלית</span></label>
                             <span class="text-danger city" style="display: none;"></span>
                             <input name="city" type="text" id="city" placeholder="עיר באנגלית">
                             <span class="text-danger city" style="display: none;"></span>

                             <label for="address">רחוב <span>באנגלית</span></label>
                             <span class="text-danger address" style="display: none;"></span>
                             <input name="address" id="address" type="text" placeholder="רחוב באנגלית" style="margin-bottom: 5px">
                             <label for="address" style="float: right">בית</label>
                             <input name="numberhome" type="text" style="float: right;    width: 137px;">
                             <label for="address" style="float: right">דירה</label>
                             <input name="numberdira" type="text" style="float: right;    width: 137px;">
                         </form>

                                <input type="submit" id="btnpay" name="btnpay" class="button primary float-right" value="לתשלום"  style="margin-top: 5px;"/>
                            </div>

                        </div><!-- Shop Cart Detail /-->

                @else
                    <div class="medium-12 small-12 columns" dir="rtl">
                        העגלה שלך ריקה, אולי תוסיף משהו?
                    </div>
                @endif
                        <div class="clearfix"></div>
                    </div> <!-- content section /-->
                </div><!-- Featured Area -->



            </div>
            <!-- sidebar Ends -->

        </div><!-- row ends /-->
    </div>




@endsection