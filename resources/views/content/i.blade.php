@extends('main')

@section ('content')

    <style>
        .selectedphoto {
            border: 1px black solid;
        }
    </style>


    <div class="content-container single-product module">
        <!-- Title Section -->
        <div class="title-section">
            <div class="row">
                <div class="small-12 columns">
                    <div class="float-right" dir="rtl">

                        <span><i class="fa fa-hand-peace-o" aria-hidden="true"></i> <b
                                    style="color: chartreuse;font-size: 15pt">{{$it['QuantitySold']}}</b> כבר קנו את המוצר! </span>
                    </div>
                    <div class="float-right" dir="rtl">
                        <span><i class="fa fa-shield" aria-hidden="true"></i> טכנולוגיית הצפנה מתקדמת <i
                                    class="fa fa-shield" aria-hidden="true"></i></span>

                    </div>

                    <div class="float-left " dir="rtl">
                        <a href="#" class="bordered-light"> <i class="fa fa-floppy-o" aria-hidden="true"></i>
                            שמור מוצר</a>
                    </div>
                </div> <!-- title /-->
            </div><!-- row /-->
        </div>
        <!-- Title Section End -->

        <div class="row">
            <div class="medium-9 small-12 columns">
                <ul class="breadcrumbs">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">All Categories</a></li>
                    <li class="disabled">Sports & Entertainment</li>
                    <li>
                        <span class="show-for-sr">Current: </span> Body Building
                    </li>
                </ul>
            </div><!-- breadcrumbs /-->
            <div class="medium-3 hide-for-small-only columns">
                <div class="next-prev-nav pull-right">
                    <div class="prod-dropdown">
                        <a data-toggle="product-prev" href="#" class="btncont">
                            <i class="fa fa-angle-left" aria-hidden="true"></i>
                        </a>
                        <div class="clearfix"></div>
                        <div class="dropdown-pane left" id="product-prev" data-dropdown data-hover="true"
                             data-hover-pane="true">
                            <a href="#">
                                <img alt="" src="images/help/product2-1.jpg"/>
                            </a>
                        </div>
                    </div>
                    <div class="prod-dropdown">
                        <a data-toggle="product-next" href="#" class="btncont">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </a>
                        <div class="clearfix"></div>
                        <div class="dropdown-pane left" id="product-next" data-dropdown data-hover="true"
                             data-hover-pane="true">
                            <a href="#">
                                <img alt="" src="images/help/product3-1.jpg"/>
                            </a>
                        </div>
                    </div>
                </div>
            </div><!-- next item icons /-->
        </div><!-- Row ends /-->

        <!-- Single product detail -->
        <div class="single-product-detail module">
            <div class="row">

                <div class="medium-6 small-12 columns item-image">
                    <div class="main-image">
                        <img id="zoomit"
                             data-zoom-image="{{is_array($it['PictureURL'])?$it['PictureURL'][0]:$it['PictureURL']}}"
                             src="{{is_array($it['PictureURL'])?$it['PictureURL'][0]:$it['PictureURL']}}"
                             alt="{{$it['Title']}}"/>
                    </div>
                    @if(is_array($it['PictureURL']))
                        <div class="thumbnails">
                            @if(isset($it['PictureURL']))

                                @foreach($it['PictureURL'] as $row)
                                    <a href="#">
                                        <img class="insidephoto selectedphoto" src="{{$row}}" style="object-fit: cover;"
                                             alt=""/>
                                    </a>
                                @endforeach
                            @endif
                        </div>
                    @endif
                </div>
                <div class="medium-6 small-12 columns item-detail">
                    <div class="item-header">
                        <h1>{{$it['Title']}}</h1>
                        <div class="item-meta">
                            <div class="pro-rating">
                                <div class="infoseler" dir="rtl">
                                    <i title="מידע על המוכר" class="fa fa-info-circle" aria-hidden="true"></i>
                                    <span>שם המוכר: <b>{{$it['Seller']['UserID']}}</b>  </span>
                                    <span>|</span>
                                    <span>תגובות חיוביות: <b>{{$it['Seller']['PositiveFeedbackPercent']}}</b></span>
                                    <span>|</span>
                                    <span>המוצר נשלח מ: <b>{{$it['Location']}}</b></span>
                                </div>

                            </div>
                        </div><!-- item meta /-->
                    </div><!-- item header /-->

                    <div class="item-options" dir="rtl">
                        <span class="row-title" style="margin-right: 8px;">מצב המוצר:</span>
                        <span style="font-weight: bold"> {{Lang::get('tr.'.$it['ConditionDisplayName'])}}</span>
                        <div style="margin: 5px 0" class="clearfix"></div>
                        @if(isset($it['Variations']))
                            <?php $a = $b = 1; ?>
                            @if(isset($it['Variations']['VariationSpecificsSet']['NameValueList']['0']))
                                @foreach($it['Variations']['VariationSpecificsSet']['NameValueList'] as $key=>$vari)
                                    <div class="option-box">
                        <span class="row-title">{{Lang::get('tr.'. $vari['Name'])}}
                            :</span>
                                        <span>
                            <select class="cn"  id="vali{{$a++}}" name="variation" data-variation="{{ $vari['Name'] }}">
                                <option value="^^^SELECT^^^">בחר</option>
                            </select>
                        <span class="select-error" id="er{{$b++}}" style="display: none">נא לבחור</span>
                                        </span>
                                        <div class="clearfix"></div>
                                    </div>
                                @endforeach
                            @else
                                <div class="option-box">
                        <span class="row-title">{{Lang::get('tr.'. $it['Variations']['VariationSpecificsSet']['NameValueList']['Name'])}}
                            :</span>
                                    <span>
                            <select class="cn" id="vali{{$a++}}" name="variation"
                                    data-variation="{{ $it['Variations']['VariationSpecificsSet']['NameValueList']['Name'] }}">
                                <option value="^^^SELECT^^^">בחר</option>
                            </select>
                                                                <span class="select-error" id="er{{$b++}}" style="display: none">נא לבחור</span>

                        </span>
                                    <div class="clearfix"></div>
                                </div>
                            @endif
                        @endif
                    </div><!-- item options /-->
                    <div class="boxpricnew">
                        <div class="boxup">
                            @if(isset($it['Variations']['Variation'][0]['DiscountPriceInfo']))

                                <div class="infotextprice">מחיר לצרכן: <span>{{HR::currency($it['Variations']['Variation'][0]['DiscountPriceInfo']['OriginalRetailPrice']) }}
                                        ₪</span></div>
                                <div class="haozim">הנחה: <span>{{number_format(HR::currency($it['CurrentPrice'])/ HR::currency($it['Variations']['Variation'][0]['DiscountPriceInfo']['OriginalRetailPrice']) *100)}}
                                        %</span></div>
                            @else
                                <div class="infotextprice">מחיר לצרכן: <span>{{HR::currency($it['CurrentPrice']) + (HR::currency($it['CurrentPrice'] + 63/100))  }}
                                        ₪</span></div>
                                <div class="haozim">הנחה: <span>63%</span></div>
                            @endif
                        </div>
                        <div class="pricafter">
                            <div class="pricexl">
                                <sup>רק:</sup>
                                <b>{{HR::currency($it['CurrentPrice'])}}</b> <span>₪</span>

                            </div>
                            <div><span>מחיר משלוח: <b>{!!$shippnginfo['ShippingCostSummary']['ShippingServiceCost'] != 0 ? HR::currencyShip($shippnginfo['ShippingCostSummary']['ShippingServiceCost']).' ₪':'<i style="color:#ffed00">חינם</i>'!!}
                                        </b></span> | <span>זמן אספקה: <b>19-45 </b><b>ימים</b></span>
                            </div>


                        </div>
                    </div>
                    <hr>
                    <div class="item-quantity" dir="rtl">
                        <div><span class="row-title" style="width: 50px">כמות:</span><span><input type="number"
                                                                                                  class="qty"
                                                                                                  value="1"/> יחידות</span>
                            <span id="qtymsg" style="color: red; font-size: 12px;"></span>
                        </div>

                    </div>
                    <!-- Item Quantity /-->

                    <a class="shopping-buttons float-right">
                        <a href="#" class="button secondary">קנה עכשיו</a>
                        <a href="" class="button primary add-to-cart" data-id="{{$it["ItemID"]}}"
                           data-price="{{HR::currency($it['CurrentPrice'])}}"
                           data-ship="{!!$shippnginfo['ShippingCostSummary']['ShippingServiceCost'] != 0 ? HR::currencyShip($shippnginfo['ShippingCostSummary']['ShippingServiceCost']):0 !!}"
                           data-img="{{is_array($it['PictureURL']) ? $it['PictureURL'][0] : $it['PictureURL']}}"
                           data-title="{{$it['Title']}}">
                            <div class="btn-spinner"></div>
                            הוסף לעגלה</a>

                </div>
                <div class="clearfix"></div>


                <!-- promotion Ends /-->

            </div><!-- item detail /-->
            <!-- Item Image /-->
        </div><!-- row /-->

    </div>
    <!-- single product detail /-->

    <!-- customer content -->
    <div class="store-content">
        <div class="row">
            <div class="featured-area small-module">
                <div class="section-title" style="text-align: center">
                    <h2>מוצרים <span>דומים</span></h2>
                </div><!-- section title /-->

                <div class="content-section store-related">
                    @if(isset($moreitem['itemRecommendations']['item']))
                        @foreach($moreitem['itemRecommendations']['item'] as $row)
                            <div class="product">
                                <div class="product-image">
                                    <a href="{{ url('ebay/'.str_replace([' ','/'],['-',','],$row['title']).'/'.$row["itemId"]) }}">
                                        <img style="height: 150px;" src="{{$row['imageURL']}}" alt=""/>
                                        <img style="height: 150px;" src="{{$row['imageURL']}}" alt=""/>
                                    </a>

                                </div><!-- Product Image /-->
                                <div class="product-title">
                                    <a style="height: 90px"
                                       href="{{ url('ebay/'.str_replace([' ','/'],['-',','],$row['title']).'/'.$row["itemId"]) }}">{{$row['title']}}</a>
                                </div><!-- product title /-->
                                <div class="product-meta">
                                    <div class="prices">
                                        <span class="price">{{HR::currency($row['buyItNowPrice'])}} ₪</span>

                                    </div>
                                    <div class="clearfix"></div>
                                </div><!-- product meta /-->
                            </div><!-- Product /-->

                        @endforeach
                    @endif
                </div><!-- Content Section /-->

            </div>

            <!-- store sidebar -->

            <!-- Store Content -->
            <div class="medium-12 small-12 columns store-content">

                <ul class="tabs" role="tablist" data-tabs id="new-items">
                    <li class="tabs-title is-active"><a href="#description" role="tab"
                                                        aria-selected="true">Description</a>
                    </li>
                    <li class="tabs-title"><a href="#panel2" role="tab">Specifications</a></li>
                    <li class="tabs-title"><a href="#panel3" role="tab">Reviews</a></li>
                    <li class="tabs-title"><a href="#panel4" role="tab">Payment & Shipping</a></li>
                </ul> <!-- Tabs Titles Ends /-->

                <div class="tabs-content small-module" data-tabs-content="new-items">
                    <div class="tabs-panel is-active product-description" id="panel1">
                        <script type="text/javascript">
                            function resizeIframe(iframe) {
                                iframe.height = iframe.contentWindow.document.body.scrollHeight + "px";
                            }
                        </script>

                        <iframe scrolling="yes" frameborder="0" src='{{url("ifram/ebay/{$it['ItemID']}")}}'
                                onload="resizeIframe(this)"></iframe>


                    </div><!-- tabs content /-->

                    <!-- more items from store /-->
                    <div class="featured-area small-module">
                        <div class="section-title">
                            <h2>More From <span>Fajar Accessories</span></h2>
                        </div><!-- section title /-->

                        <div class="content-section store-related">

                            <div class="product">
                                <div class="product-image">
                                    <div class="sale-tag">Sale</div>
                                    <a href="single-product.html">
                                        <img src="images/help/product1-1.jpg" alt=""/>
                                        <img src="images/help/product1-2.jpg" alt=""/>
                                    </a>

                                    <div class="pro-buttons menu-centered">
                                        <ul class="menu">
                                            <li><a href="#" title="Add to wish list"><i class="fa fa-heart"></i></a>
                                            </li>
                                            <li><a href="#" title="Open Product Page"><i class="fa fa-retweet"></i></a>
                                            </li>
                                            <li><a href="#" title="Quick View"><i class="fa fa-search-plus"></i></a>
                                            </li>
                                            <li><a href="#" title="Add to cart"><i class="fa fa-shopping-cart"></i></a>
                                            </li>
                                        </ul>
                                    </div><!-- product buttons /-->

                                </div><!-- Product Image /-->
                                <div class="product-title">
                                    <a href="single-product.html">Small shirt dress</a>
                                </div><!-- product title /-->
                                <div class="product-meta">
                                    <div class="prices">
                                        <span class="price">$234</span> / Piece
                                        <span class="sale-price">$333</span>
                                    </div>
                                    <div class="clearfix"></div>
                                </div><!-- product meta /-->
                            </div><!-- Product /-->

                            <div class="product">
                                <div class="product-image">
                                    <a href="single-product.html">
                                        <img src="images/help/product4-1.jpg" alt=""/>
                                        <img src="images/help/product1-2.jpg" alt=""/>
                                    </a>

                                    <div class="pro-buttons menu-centered">
                                        <ul class="menu">
                                            <li><a href="#" title="Add to wish list"><i class="fa fa-heart"></i></a>
                                            </li>
                                            <li><a href="#" title="Open Product Page"><i class="fa fa-retweet"></i></a>
                                            </li>
                                            <li><a href="#" title="Quick View"><i class="fa fa-search-plus"></i></a>
                                            </li>
                                            <li><a href="#" title="Add to cart"><i class="fa fa-shopping-cart"></i></a>
                                            </li>
                                        </ul>
                                    </div><!-- product buttons /-->

                                </div><!-- Product Image /-->
                                <div class="product-title">
                                    <a href="single-product.html">Small shirt dress</a>
                                </div><!-- product title /-->
                                <div class="product-meta">
                                    <div class="prices">
                                        <span class="price">$234</span> / Piece
                                        <span class="sale-price">$333</span>
                                    </div>
                                    <div class="clearfix"></div>
                                </div><!-- product meta /-->
                            </div><!-- Product /-->

                            <div class="product">
                                <div class="product-image">
                                    <a href="single-product.html">
                                        <img src="images/help/product2-1.jpg" alt=""/>
                                        <img src="images/help/product2-2.jpg" alt=""/>
                                    </a>

                                    <div class="pro-buttons menu-centered">
                                        <ul class="menu">
                                            <li><a href="#" title="Add to wish list"><i class="fa fa-heart"></i></a>
                                            </li>
                                            <li><a href="#" title="Open Product Page"><i class="fa fa-retweet"></i></a>
                                            </li>
                                            <li><a href="#" title="Quick View"><i class="fa fa-search-plus"></i></a>
                                            </li>
                                            <li><a href="#" title="Add to cart"><i class="fa fa-shopping-cart"></i></a>
                                            </li>
                                        </ul>
                                    </div><!-- product buttons /-->

                                </div><!-- Product Image /-->
                                <div class="product-title">
                                    <a href="single-product.html">Small shirt dress</a>
                                </div><!-- product title /-->
                                <div class="product-meta">
                                    <div class="prices">
                                        <span class="price">$234</span> / Piece
                                    </div>
                                    <div class="clearfix"></div>
                                </div><!-- product meta /-->
                            </div><!-- Product /-->

                            <div class="product">
                                <div class="product-image">
                                    <a href="single-product.html">
                                        <img src="images/help/product5-1.jpg" alt=""/>
                                        <img src="images/help/product5-2.jpg" alt=""/>
                                    </a>

                                    <div class="pro-buttons menu-centered">
                                        <ul class="menu">
                                            <li><a href="#" title="Add to wish list"><i class="fa fa-heart"></i></a>
                                            </li>
                                            <li><a href="#" title="Open Product Page"><i class="fa fa-retweet"></i></a>
                                            </li>
                                            <li><a href="#" title="Quick View"><i class="fa fa-search-plus"></i></a>
                                            </li>
                                            <li><a href="#" title="Add to cart"><i class="fa fa-shopping-cart"></i></a>
                                            </li>
                                        </ul>
                                    </div><!-- product buttons /-->

                                </div><!-- Product Image /-->
                                <div class="product-title">
                                    <a href="single-product.html">Small shirt dress</a>
                                </div><!-- product title /-->
                                <div class="product-meta">
                                    <div class="prices">
                                        <span class="price">$234</span> / Piece
                                    </div>
                                    <div class="clearfix"></div>
                                </div><!-- product meta /-->
                            </div><!-- Product /-->

                            <div class="product">
                                <div class="product-image">
                                    <a href="single-product.html">
                                        <img src="images/help/product3-1.jpg" alt=""/>
                                        <img src="images/help/product3-2.jpg" alt=""/>
                                    </a>

                                    <div class="pro-buttons menu-centered">
                                        <ul class="menu">
                                            <li><a href="#" title="Add to wish list"><i class="fa fa-heart"></i></a>
                                            </li>
                                            <li><a href="#" title="Open Product Page"><i class="fa fa-retweet"></i></a>
                                            </li>
                                            <li><a href="#" title="Quick View"><i class="fa fa-search-plus"></i></a>
                                            </li>
                                            <li><a href="#" title="Add to cart"><i class="fa fa-shopping-cart"></i></a>
                                            </li>
                                        </ul>
                                    </div><!-- product buttons /-->

                                </div><!-- Product Image /-->
                                <div class="product-title">
                                    <a href="single-product.html">Small shirt dress</a>
                                </div><!-- product title /-->
                                <div class="product-meta">
                                    <div class="prices">
                                        <span class="price">$234</span> / Piece
                                    </div>
                                    <div class="clearfix"></div>
                                </div><!-- product meta /-->
                            </div><!-- Product /-->

                        </div><!-- Content Section /-->

                    </div>
                    <!-- More From same store. /-->

                    <!-- Related Items /-->
                    <div class="featured-area">
                        <div class="section-title">
                            <h2><span>Related Products</span> From others</h2>
                        </div><!-- section title /-->

                        <div class="content-section store-related">

                            <div class="product">
                                <div class="product-image">
                                    <div class="sale-tag">Sale</div>
                                    <a href="single-product.html">
                                        <img src="images/help/product1-2.jpg" alt=""/>
                                        <img src="images/help/product1-1.jpg" alt=""/>
                                    </a>

                                    <div class="pro-buttons menu-centered">
                                        <ul class="menu">
                                            <li><a href="#" title="Add to wish list"><i class="fa fa-heart"></i></a>
                                            </li>
                                            <li><a href="#" title="Open Product Page"><i class="fa fa-retweet"></i></a>
                                            </li>
                                            <li><a href="#" title="Quick View"><i class="fa fa-search-plus"></i></a>
                                            </li>
                                            <li><a href="#" title="Add to cart"><i class="fa fa-shopping-cart"></i></a>
                                            </li>
                                        </ul>
                                    </div><!-- product buttons /-->

                                </div><!-- Product Image /-->
                                <div class="product-title">
                                    <a href="single-product.html">Small shirt dress</a>
                                </div><!-- product title /-->
                                <div class="product-meta">
                                    <div class="prices">
                                        <span class="price">$234</span> / Piece
                                        <span class="sale-price">$333</span>
                                    </div>
                                    <div class="clearfix"></div>
                                </div><!-- product meta /-->
                            </div><!-- Product /-->

                            <div class="product">
                                <div class="product-image">
                                    <a href="single-product.html">
                                        <img src="images/help/product4-2.jpg" alt=""/>
                                        <img src="images/help/product1-1.jpg" alt=""/>
                                    </a>

                                    <div class="pro-buttons menu-centered">
                                        <ul class="menu">
                                            <li><a href="#" title="Add to wish list"><i class="fa fa-heart"></i></a>
                                            </li>
                                            <li><a href="#" title="Open Product Page"><i class="fa fa-retweet"></i></a>
                                            </li>
                                            <li><a href="#" title="Quick View"><i class="fa fa-search-plus"></i></a>
                                            </li>
                                            <li><a href="#" title="Add to cart"><i class="fa fa-shopping-cart"></i></a>
                                            </li>
                                        </ul>
                                    </div><!-- product buttons /-->

                                </div><!-- Product Image /-->
                                <div class="product-title">
                                    <a href="single-product.html">Small shirt dress</a>
                                </div><!-- product title /-->
                                <div class="product-meta">
                                    <div class="prices">
                                        <span class="price">$234</span> / Piece
                                        <span class="sale-price">$333</span>
                                    </div>
                                    <div class="clearfix"></div>
                                </div><!-- product meta /-->
                            </div><!-- Product /-->

                            <div class="product">
                                <div class="product-image">
                                    <a href="single-product.html">
                                        <img src="images/help/product2-2.jpg" alt=""/>
                                        <img src="images/help/product2-1.jpg" alt=""/>
                                    </a>

                                    <div class="pro-buttons menu-centered">
                                        <ul class="menu">
                                            <li><a href="#" title="Add to wish list"><i class="fa fa-heart"></i></a>
                                            </li>
                                            <li><a href="#" title="Open Product Page"><i class="fa fa-retweet"></i></a>
                                            </li>
                                            <li><a href="#" title="Quick View"><i class="fa fa-search-plus"></i></a>
                                            </li>
                                            <li><a href="#" title="Add to cart"><i class="fa fa-shopping-cart"></i></a>
                                            </li>
                                        </ul>
                                    </div><!-- product buttons /-->

                                </div><!-- Product Image /-->
                                <div class="product-title">
                                    <a href="single-product.html">Small shirt dress</a>
                                </div><!-- product title /-->
                                <div class="product-meta">
                                    <div class="prices">
                                        <span class="price">$234</span> / Piece
                                    </div>
                                    <div class="clearfix"></div>
                                </div><!-- product meta /-->
                            </div><!-- Product /-->

                            <div class="product">
                                <div class="product-image">
                                    <a href="single-product.html">
                                        <img src="images/help/product5-2.jpg" alt=""/>
                                        <img src="images/help/product5-1.jpg" alt=""/>
                                    </a>

                                    <div class="pro-buttons menu-centered">
                                        <ul class="menu">
                                            <li><a href="#" title="Add to wish list"><i class="fa fa-heart"></i></a>
                                            </li>
                                            <li><a href="#" title="Open Product Page"><i class="fa fa-retweet"></i></a>
                                            </li>
                                            <li><a href="#" title="Quick View"><i class="fa fa-search-plus"></i></a>
                                            </li>
                                            <li><a href="#" title="Add to cart"><i class="fa fa-shopping-cart"></i></a>
                                            </li>
                                        </ul>
                                    </div><!-- product buttons /-->

                                </div><!-- Product Image /-->
                                <div class="product-title">
                                    <a href="single-product.html">Small shirt dress</a>
                                </div><!-- product title /-->
                                <div class="product-meta">
                                    <div class="prices">
                                        <span class="price">$234</span> / Piece
                                    </div>
                                    <div class="clearfix"></div>
                                </div><!-- product meta /-->
                            </div><!-- Product /-->

                            <div class="product">
                                <div class="product-image">
                                    <a href="single-product.html">
                                        <img src="images/help/product3-2.jpg" alt=""/>
                                        <img src="images/help/product3-1.jpg" alt=""/>
                                    </a>

                                    <div class="pro-buttons menu-centered">
                                        <ul class="menu">
                                            <li><a href="#" title="Add to wish list"><i class="fa fa-heart"></i></a>
                                            </li>
                                            <li><a href="#" title="Open Product Page"><i class="fa fa-retweet"></i></a>
                                            </li>
                                            <li><a href="#" title="Quick View"><i class="fa fa-search-plus"></i></a>
                                            </li>
                                            <li><a href="#" title="Add to cart"><i class="fa fa-shopping-cart"></i></a>
                                            </li>
                                        </ul>
                                    </div><!-- product buttons /-->

                                </div><!-- Product Image /-->
                                <div class="product-title">
                                    <a href="single-product.html">Small shirt dress</a>
                                </div><!-- product title /-->
                                <div class="product-meta">
                                    <div class="prices">
                                        <span class="price">$234</span> / Piece
                                    </div>
                                    <div class="clearfix"></div>
                                </div><!-- product meta /-->
                            </div><!-- Product /-->

                        </div><!-- Content Section /-->

                    </div>
                    <!-- Related Items Ends. /-->
                </div>
                <!-- store content /-->

            </div><!-- Row /-->
        </div>
        <!-- customer content /-->

    </div><!-- content container /-->


@endsection


@section('jscode')
    <script src="{{ url('lib/assets/zoom/jquery.elevatezoom.js') }}" type="text/javascript"></script>
    <script>
        $('.insidephoto').each(function (i, obj) {
            var bigurl = $('zoomit').attr('src');
            var thisurl = $(this).attr('src');
            if ($(this).attr('src') == $('#zoomit').attr('src')) {
                $(this).css('border', '1px solid black');
                $("#zoomit").elevateZoom({tint: true, tintColour: '#F90', tintOpacity: 0.5});
            }
            $(this).click(function () {
                $('#zoomit').removeData('elevateZoom');
                $('.zoomContainer').remove();
                $('.insidephoto').css('border', '');
                $(this).css('border', '1px solid black');
                $('#zoomit').attr('src', thisurl);
                $('#zoomit').data('zoom-image', thisurl);
                $("#zoomit").elevateZoom({tint: true, tintColour: '#F90', tintOpacity: 0.5});
                return false;
            });
        });
        @if (0)
        $('select').data('variation', '{{ $it['Variations']['Pictures']['VariationSpecificName'] }}').on('change', function () {
            var selvalu = this.value;
            $.each({!! $varpictures !!}, function (key, value) {
                if (selvalu === value.VariationSpecificValue) {
                    $('#zoomit').removeData('elevateZoom');
                    $('.zoomContainer').remove();
                    $('#zoomit').attr('src', value.PictureURL);
                    $('#zoomit').data('zoom-image', value.PictureURL);
                    $("#zoomit").elevateZoom({tint: true, tintColour: '#F90', tintOpacity: 0.5});
                    return false;
                }
            });
        });
        @endif
        ///1
        var qtty = {{ $it['Quantity'] }};
        $('.qty').on('change', function () {
            $('#qtymsg').html('');
            if (this.value > qtty) {
                $('.qty').val(qtty);
                $('#qtymsg').html('מקסימום ' + qtty + ' יחידות!');
            }
            else if (this.value < 1) {
                $('.qty').val('1');
                $('#qtymsg').html('מינימום יחידה אחת!');
            }
        });
        ////2
        alljson = {!! $json !!};
        vars = alljson["Item"]['Variations']['VariationSpecificsSet']['NameValueList'].length;
        info = alljson["Item"]['Variations'];
        //
        var specifics = alljson["Item"]['Variations']["VariationSpecificsSet"]['NameValueList'];
        var variations = alljson["Item"]['Variations']["Variation"];
        var array_selected_specs = {};
        var isMulti = false;
        var outOfStock = " [Out of stock]";
        if (specifics.length > 0) {
            isMulti = true;
        }
        if (isMulti) {
            $.each(specifics, function (k1, v1) {
                var specName = v1['Name'];
                array_selected_specs[specName] = "^^^SELECT^^^";
            });
        }
        else {
            $.each(specifics, function (k1, v1) {
                if (k1 == "Name") {
                    array_selected_specs[v1] = "^^^SELECT^^^";
                }
            });
        }

        $('.cn').on('focusin', function () {
            var selBox = $(this);
            var selectedVal = $(this).val();
            var selectedSpec = $(this).attr('data-variation');
            var new_array_specs = [];
            $(".cn").each(function () {
                array_selected_specs[$(this).attr('data-variation')] = $(this).val();
            });
            $.each(variations, function (k1, v1) {
                var qty = v1['Quantity'];
                var sold = v1['SellingStatus']['QuantitySold'];
                var available = qty - sold;
                if (isMulti) {
                    $.each(v1['VariationSpecifics'], function (k2, v2) {
                        var combinationFound = true;
                        $.each(v2, function (k3, v3) {
                            $.each(array_selected_specs, function (k4, v4) {
                                if (k4 != selectedSpec && v3['Name'] != selectedSpec) {
                                    if (k4 == v3['Name']) {
                                        if (v4 != "^^^SELECT^^^" && v4 != v3['Value']) {
                                            combinationFound = false;
                                        }
                                    }
                                }
                            });
                        });
                        if (combinationFound) {
                            $.each(v2, function (k3, v3) {
                                if (v3['Name'] == selectedSpec) {
                                    if ($.inArray(v3['Value'], new_array_specs) === -1) {
                                        if (available == 0) {
                                            var v = v3['Value'] + outOfStock;
                                            if ($.inArray(v, new_array_specs) === -1) {
                                                new_array_specs.push(v);
                                            }
                                        }
                                        else {
                                            var v = v3['Value'] + outOfStock;
                                            if ($.inArray(v, new_array_specs) !== -1) {
                                                new_array_specs.splice($.inArray(v, new_array_specs), 1);
                                            }
                                            new_array_specs.push(v3['Value']);
                                        }
                                    }
                                }
                            });
                        }
                    });
                }
                else {
                    $.each(v1['VariationSpecifics']['NameValueList'], function (k2, v2) {
                        if (k2 == "Value") {
                            if (available > 0) {
                                new_array_specs.push(v2);
                            }
                            else {
                                new_array_specs.push(v2 + outOfStock);
                            }
                        }
                    });
                }
            });
            //
            selBox.find('option:gt(0)').remove();
            $.each(new_array_specs, function (k2, v2) {
                var selected = "";
                var disabled = "";
                if (v2 == selectedVal) {
                    selected = "selected";
                }
                if (v2.indexOf(outOfStock) >= 0) {
                    disabled = "disabled";
                }
                selBox.append($("<option class='rem' " + selected + " " + disabled + "></option>").attr("value", v2).text(v2));
            });
        });


    </script>
@endsection
