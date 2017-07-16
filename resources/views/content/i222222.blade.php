@extends('main')

@section ('content')

    <style>
        .selectedphoto {
            border: 3px black solid;
        }
    </style>


    <div class="content-container single-product module">
        <!-- Title Section -->
        <div class="title-section">
            <div class="row">
                <div class="small-12 columns">
                    <div class="float-right" dir="rtl">
                        חנות: <a href="#" class="store-name">{{$it['Seller']['UserID']}}</a> <span class="opened">Top-rated seller <strong>({{$it['Seller']['FeedbackScore']}}
                                )</strong></span>
                    </div>
                    <div class="pro-rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star off"></i>
                        <span class="review-count store-name">({{$it['Seller']['PositiveFeedbackPercent']}}% Positive feedback)</span>
                    </div>
                    <div class="float-left">
                        <a href="#" class="bordered-light">Follow Store</a>
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

                <div class="medium-5 small-12 columns item-image">
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
                                        <img class="insidephoto selectedphoto" src="{{$row}}" alt=""/>
                                    </a>
                                @endforeach
                            @endif
                        </div>
                    @endif
                </div><!-- Item Image /-->

                <div class="medium-7 small-12 columns item-detail">
                    <div class="item-header">
                        <h1>{{$it['Title']}}</h1>
                        <div class="item-meta">
                            <div class="pro-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star off"></i>
                                <span class="review-count store-name">48 Reviews</span><span
                                        class="review-count no-border">{{$it['QuantitySold']}} נמכרו</span>
                                <div class="socialicons float-right">
                                    <a href="#" title="Share on Facebook"><i class="fa fa-facebook"></i></a>
                                    <a href="#" title="Share on Twitter"><i class="fa fa-twitter"></i></a>
                                    <a href="#" title="Share on Google plus"><i class="fa fa-google"></i></a>
                                </div><!-- social icons /-->
                            </div>
                        </div><!-- item meta /-->
                    </div><!-- item header /-->

                    <div class="item-pricing">
                        <p><span class="row-title">SKU:</span><span>{{isset($it['SKU'])?$it['SKU']:''}}</span></p>
                        <p><span class="row-title">Category:</span><span><a href="#">Pants</a>, <a
                                        href="#">Women</a></span></p>
                        <p><span class="row-title">מחיר:</span><span class="sale-price">{{$it['CurrentPrice']}} ש"ח / יחידה</span>
                        </p>
                        <div><span class="row-title">מחיר:</span><span><span
                                        class="regular-price">{{$it['CurrentPrice']}}₪</span> / יחידה</span><span
                                    class="off-percent"></span>
                            <span class="bulk-price">
                            	<a data-toggle="bulk-price" href="#">
                            		Bulk Price &raquo;
                             	</a>
                            </span>
                            <div class="dropdown-pane top-left" id="bulk-price" data-dropdown data-hover="true"
                                 data-hover-pane="true">
                                <table class="text-center">
                                    <tr>
                                        <th>Qty</th>
                                        <th>Price /piece</th>
                                    </tr>
                                    <tr>
                                        <td>2-10</td>
                                        <td>$89.53</td>
                                    </tr>
                                    <tr>
                                        <td>10-50</td>
                                        <td>$79.53</td>
                                    </tr>
                                    <tr>
                                        <td>50-100</td>
                                        <td>$59</td>
                                    </tr>
                                </table>
                                <p>Discount automatically counted on checkout.</p>
                            </div>
                        </div>

                    </div><!-- item head /-->

                    <div class="item-options">
                        @if(isset($it['Variations']))
                            @if(isset($it['Variations']['VariationSpecificsSet']['NameValueList']['0']))
                                <?php $a = 1; ?>
                                @foreach($it['Variations']['VariationSpecificsSet']['NameValueList'] as $key=>$vari)
                                    <div class="option-box">
                                        <span class="row-title">{{str_replace($variname['ENGLISH'], $variname['Hebrew'], $vari['Name']) }}
                                            :</span>
                                        <span>
                                                  <select hidden id="hdvali{{$a}}"  name="variation" data-variation="{{ $vari['Name'] }}">
                                        @if(is_array($vari['Value']))
                                                          <option>בחר</option>
                                                          @foreach($vari['Value'] as $valn)

                                                              <option>{{ $valn }}</option>
                                                          @endforeach
                                                      @else
                                                          <option>{{ $vari['Value'] }}</option>
                                                      @endif
                                        </select>

                                        <select class="cn" id="vali{{$a++}}" name="variation" data-variation="{{ $vari['Name'] }}">
                                        @if(is_array($vari['Value']))
                                                    <option>בחר</option>
                                                    @foreach($vari['Value'] as $valn)

                                                        <option>{{ $valn }}</option>
                                                    @endforeach
                                                @else
                                                    <option>{{ $vari['Value'] }}</option>
                                                @endif
                                        </select>




                                    </span>
                                        <div class="clearfix"></div>
                                    </div>
                                @endforeach
                            @else
                                <div class="option-box">
                                    <span class="row-title">{{ str_replace($variname['ENGLISH'], $variname['Hebrew'], $it['Variations']['VariationSpecificsSet']['NameValueList']['Name']) }}
                                        :</span>
                                    <span>
                                        <select id="vali" name="variation"
                                                data-variation="{{ $it['Variations']['VariationSpecificsSet']['NameValueList']['Name'] }}">
                                        @if(is_array($it['Variations']['VariationSpecificsSet']['NameValueList']['Value']))
                                                @foreach($it['Variations']['VariationSpecificsSet']['NameValueList']['Value'] as $valn)
                                                    <option>{{ $valn }}</option>
                                                @endforeach
                                            @else
                                                <option>{{ $it['Variations']['VariationSpecificsSet']['NameValueList']['Value'] }}</option>
                                            @endif
                                        </select>
                                    </span>
                                    <div class="clearfix"></div>
                                </div>
                            @endif
                        @endif
                    </div><!-- item options /-->



                    <div class="item-quantity">
                        <div><span class="row-title">Quantity:</span><span><input type="number" class="qty" value="1"/> piece(s)</span>
                            <span id="qtymsg" style="color: red; font-size: 12px;"></span>
                        </div>
                        <div><span class="row-title">Total Price:</span> <span>Select Color, size and quantity.</span>
                        </div>
                    </div>
                    <!-- Item Quantity /-->

                    <div class="shopping-buttons">
                        <a href="#" class="button secondary">Buy Now</a> <a href="#" class="button primary">Add to
                            cart</a> <a href="#" class="wishlist"><i class="fa fa-heart"></i></a>
                        <div class="clearfix"></div>
                    </div>
                    , a
                    <!-- shopping Buttons /-->

                    <div class="store-promotion">
                        <div><span class="row-title">Store Promotion: </span> <span
                                    class="coupon-store"><strong>US $2</strong> off per <strong>US $5</strong></span>
                        </div>
                    </div>
                    <!-- promotion Ends /-->

                </div><!-- item detail /-->

            </div><!-- row /-->
        </div>
        <!-- single product detail /-->

        <!-- customer content -->
        <div class="store-content">
            <div class="row">

                <!-- store sidebar -->
                <div class="sidebar store-sidebar medium-3 small-12 columns">

                    <div class="widget store-widget">
                        <h2>About Store</h2>

                        <div class="widget-content">
                            <a href="#">
                                <img alt="" src="images/help/store1.jpg"/>
                            </a>
                            <h4><a href="#">Fajar Accessories & Fashion Store</a></h4>
                            <div class="store-reputation">
                                <div class="pro-rating float-left">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star off"></i>
                                </div>
                                <span>230 reviews</span>
                            </div><!-- Store reputation /-->
                            <p class="store-location"><i class="fa fa-map-marker" aria-hidden="true"></i> 25 Birmingham,
                                USA</p>
                            <a href="#" class="button primary">Add to Fav Store</a>
                        </div><!-- widget content /-->

                    </div><!-- widget ends /-->

                    <div class="widget">
                        <h2>Customer Service</h2>
                        <div class="widget-content">
                            <ul class="menu vertical">
                                <li><a href="#">Contact Store</a></li>
                                <li><a href="#">Visit Store</a></li>
                            </ul>
                        </div>
                        <!-- widget content /-->
                    </div>
                    <!-- widget /-->

                    <div class="widget">
                        <h2>Store Categors</h2>
                        <div class="widget-content">
                            <ul class="menu vertical">
                                <li><a href="#">Women</a></li>
                                <li><a href="#">Men</a></li>
                                <li><a href="#">Kids</a></li>
                                <li><a href="#">Party Wear</a></li>
                                <li><a href="#">Sports Wear</a></li>
                            </ul>
                        </div><!-- widget content /-->
                    </div><!-- widget /-->

                    <div class="widget">
                        <h2>Best Sellers</h2>
                        <div class="widget-content">

                            <div class="popular-product">
                                <img alt="" src="images/help/product1-1.jpg" class="float-left thumbnail"/>
                                <div class="float-right product-description">
                                    <a href="#">Red hot skirt with laces</a>
                                    <div class="price">$22</div>
                                    <div class="pro-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star off"></i>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div><!-- popular product /-->

                            <div class="popular-product">
                                <img alt="" src="images/help/product4-1.jpg" class="float-left thumbnail"/>
                                <div class="float-right product-description">
                                    <a href="#">Red hot skirt with laces</a>
                                    <div class="price">$22</div>
                                    <div class="pro-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star off"></i>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div><!-- popular product /-->

                            <div class="popular-product">
                                <img alt="" src="images/help/product3-1.jpg" class="float-left thumbnail"/>
                                <div class="float-right product-description">
                                    <a href="#">Red hot skirt with laces</a>
                                    <div class="price">$22</div>
                                    <div class="pro-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star off"></i>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div><!-- popular product /-->

                            <div class="popular-product">
                                <img alt="" src="images/help/product2-1.jpg" class="float-left thumbnail"/>
                                <div class="float-right product-description">
                                    <a href="#">Red hot skirt with laces</a>
                                    <div class="price">$22</div>
                                    <div class="pro-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star off"></i>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div><!-- popular product /-->

                        </div><!-- widget content /-->
                    </div><!-- widget /-->

                </div>
                <!-- store sidebar Ends /-->

                <!-- Store Content -->
                <div class="medium-9 small-12 columns store-content">

                    <ul class="tabs" role="tablist" data-tabs id="new-items">
                        <li class="tabs-title is-active"><a href="#description" role="tab" aria-selected="true">Description</a>
                        </li>
                        <li class="tabs-title"><a href="#panel2" role="tab">Specifications</a></li>
                        <li class="tabs-title"><a href="#panel3" role="tab">Reviews</a></li>
                        <li class="tabs-title"><a href="#panel4" role="tab">Payment & Shipping</a></li>
                    </ul> <!-- Tabs Titles Ends /-->

                    <div class="tabs-content small-module" data-tabs-content="new-items">
                        <div class="tabs-panel is-active product-description" id="panel1">
                            <iframe src='{{url("ifram/ebay/{$it['ItemID']}")}}'></iframe>
                        </div>
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


        @if(0)
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
        alljson = {!! $json !!} ;
        vars = alljson["Item"]['Variations']['VariationSpecificsSet']['NameValueList'].length;
        info = alljson["Item"]['Variations'];

        if (($("#vali").length > 0)){

            $('#vali').find('option').each(function (kay, value) {
                x = $(this).val();



                hidded = true;

                $.each(info['Variation'], function (kay, value) {


                    saar = value['Quantity'] - value['SellingStatus']['QuantitySold'];
                    console.log(saar);
                    if (saar > 0) {

                        vari = value['VariationSpecifics']['NameValueList']['Value'];

                        if (x === vari) {
                            hidded = false;

                        }


                    }
                });
                if (hidded) {
                    $(this).prop('hidden', true);
                }

            });

        }

        if (vars == 2) {
            $('#vali1').find('option').each(function () {
                x = $(this).val();
                hidded = true;

                $.each(info['Variation'], function (kay, value) {
                    saar = value['Quantity'] - value['SellingStatus']['QuantitySold'];
                    if (saar > 0) {

                        vari = value['VariationSpecifics']['NameValueList'][0]['Value'];

                        if (x === vari) {
                            hidded = false;

                        }


                    }
                });
                if (hidded) {
                    $(this).prop('hidden', true);
                }

            });

            $('#vali1').on('change', function () {

                arry = [];
                text = '';
                opt = $('#vali1 option:selected').text();
                xxx = $(this).attr('data-variation');
                // $('select[name=variation]:gt(0)').empty();
                /// $('select[name=variation]:gt(0)').html("<option value=''>בחר</option>");
                $.each(info['Variation'], function (kay, value) {
                    saar = value['Quantity'] - value['SellingStatus']['QuantitySold'];
                    sku = value['SKU'];
                    if (saar > 0) {
                        text = '';
                    }
                    //chopname = $('select[name=variation]:eq(0)').data('variation');
                    $.each(value['VariationSpecifics']['NameValueList'], function (kay, value) {

                        if (saar > 0) {
                            text += value['Name'] + ' val' + value['Value'] + 'val ,';


                        }

                    });


                    if (saar > 0) {
                        arry.push(text)
                    }


                });

                select= '';

                console.log(select);
                $.each(arry, function (key, value) {



                    $('#hdvali2').find('option').each(function (kk, vv) {
                        op = $(this).text();

                        if (value.includes("val" + opt + "val") && value.includes("val" + op + "val")) {
                            console.log(op);
                            select += "<option>"+op+"</option>"


                        }


                    });


                });


                $('#vali2').empty().append(select);

            });
        }

    </script>
@endsection
