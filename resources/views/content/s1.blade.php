@extends('main')


@section ('content')


    <div class="content-container module">
        <!-- Title Section -->
        <div class="title-section">
            <div class="row" dir="rtl">
                <div class="small-12 columns">
                    <h1>נמצאו {{number_format($info['totalEntries'])}} פרטים עבור תוצאת החיפוש שבחרת</h1>
                </div> <!-- title /-->
            </div><!-- row /-->
        </div>
        <!-- Title Section End -->

        <div class="row">
            <div class="small-12 columns">
                <ul class="breadcrumbs">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><a href="#">Features</a></li>
                    <li class="disabled">Gene Splicing</li>
                    <li>
                        <span class="show-for-sr">Current: </span> Cloning
                    </li>
                </ul>
            </div><!-- breadcrumbs /-->
        </div><!-- Row ends /-->

        <!-- customer content -->
        <div class="store-content">
            <div class="row">

                <!-- store sidebar -->
                <div class="sidebar store-sidebar medium-3 small-12 columns">

                    <div class="widget">
                        <h2>קטגוריות</h2>
                        <div class="widget-content">
                            <ul class="menu vertical">
                                @foreach($cat as $row)
@if(!empty($row->categoryId))
                                    <li>

                                        <a href="#"><div class="categoryname" data-ebayid="{{$row['categoryId']}}">{{$row['categoryName']}}</div><span>({{$row['count']}})</span></a>

                                        @if(isset($row['childCategoryHistogram']))

                                            <ul>
                                                @foreach($row['childCategoryHistogram'] as $row1)
                                                    @if(!empty($row1['categoryName']))
                                                        <li><a href="#"><subcat class="categoryname" data-ebayid="{{$row1['categoryId']}}">{{$row1['categoryName']}}</subcat><span>({{$row1['count']}})</span></a> </li>
                                                    @endif
                                                    @endforeach
                                            </ul>
                                            @endif
                                    </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div><!-- widget content /-->
                    </div><!-- widget /-->

                    <div class="widget shop-filter" dir="rtl">
                        <h2>סינון מהיר</h2>
                        <div class="widget-content">


                            <form class="sinon" method="get" action="">
                                <span>מחיר</span>
                                <input type="hidden" name="q" value="{{$_GET['q']}}"/>
                                <input type="number" name="min" placeholder="מ: 1"/>
                                <span>- </span>
                                <input type="number" name="max" placeholder="עד: 99999"/>
                                <div class="clearfix"></div>

                                <input type="submit" class="button secondary" value="סנן"/>
                            </form>
                        </div><!-- widget content /-->
                    </div><!-- widget /-->

                    <div class="widget">
                        <h2>Trending</h2>
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

                    <div class="widget store-widget">
                        <h2>Featured Store</h2>

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
                            <p><i class="fa fa-map-marker" aria-hidden="true"></i> 25 Birmingham, USA</p>
                        </div><!-- widget content /-->

                    </div><!-- widget ends /-->

                </div>
                <!-- store sidebar Ends /-->

                <!-- Store Content -->
                @if(!empty($item))
                    <div class="medium-9 small-12 columns store-content">
                        <div class="product-filter">


                            <div class="medium-12 small-12 columns sortby">
                                <div class="pull-right">
                                    <b>מיין לפי:</b>
                                    <span><a href="{{url("ebay/search?q={$_GET['q']}&order=max")}}">מחיר גבוה לנמוך <i
                                                    style="color:rgba(0,91,24,0.91)" class="fa fa-arrow-up"
                                                    aria-hidden="true"></i></a></span>
                                    <span><a href="{{url("ebay/search?q={$_GET['q']}&order=min")}}">מחיר נמוך לגבוה <i
                                                    style="color: rgba(232,19,16,0.91)" class="fa fa-arrow-down"
                                                    aria-hidden="true"></i></a></span>

                                    <span><a href="{{url("ebay/search?q={$_GET['q']}&order=new")}}">החדשים ביותר</a></span>

                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div><!-- product filter /-->

                        <div class="products-wrap">

                            <div class="row">

                                @foreach($item as $row)
                                    @if(isset($row['galleryURL']) || isset($row['pictureURLSuperSize']))

                                        <div class="product medium-4 small-12 columns" style="position: relative">
                                            <a href='{{ url('ebay/'.str_replace([' ','/'],['-',','],$row['title']).'/'.$row["itemId"]) }}' style="position: absolute;z-index: 999; width: 100%;height: 100%">
                                            <div class="product-image">
                                                <!--  <div class="sale-tag">Sale</div> -->

                                                <a href="">
                                                    <img src="{{isset($row['pictureURLSuperSize'])?$row['pictureURLSuperSize']:$row['galleryURL']}}"
                                                         alt="{{$row['title']}}"/>
                                                    <img src="{{isset($row['pictureURLSuperSize'])?$row['pictureURLSuperSize']:$row['galleryURL']}}"
                                                         alt="{{$row['title']}}"/>
                                                </a>

                                                <!-- <div class="pro-buttons menu-centered">
                                                     <ul class="menu">
                                                         <li><a href="#" title="Add to wish list"><i
                                                                         class="fa fa-heart"></i></a>
                                                         </li>
                                                         <li><a href="#" title="Open Product Page"><i
                                                                         class="fa fa-retweet"></i></a></li>
                                                         <li><a href="#" title="Quick View"><i
                                                                         class="fa fa-search-plus"></i></a>
                                                         </li>
                                                         <li><a href="#" title="Add to cart"><i
                                                                         class="fa fa-shopping-cart"></i></a></li>
                                                     </ul>
                                                 </div><!-- product buttons /-->

                                            </div><!-- Product Image /-->
                                            <div class="product-title">
                                                <a href="">{{$row['title']}}</a>
                                            </div><!-- product title /-->
                                            <div class="product-meta">
                                                <div class="prices" dir="rtl">
                                                    @if($row['sellingStatus']['currentPrice']==$row['sellingStatus']['convertedCurrentPrice'])
                                                        <span class="price">{{number_format($row['sellingStatus']['currentPrice'],2)}}
                                                            ₪</span>

                                                    @else
                                                        <span class="price">{{number_format($row['sellingStatus']['currentPrice'],2)}}
                                                            ₪</span>

                                                        <span class="sale-price">{{number_format($row['sellingStatus']['convertedCurrentPrice'],2)}}
                                                            ₪</span>
                                                    @endif
                                                </div>
                                                <!--   <div class="last-row">
                                                       <div class="pro-rating float-left">
                                                           <i class="fa fa-star"></i>
                                                           <i class="fa fa-star"></i>
                                                           <i class="fa fa-star"></i>
                                                           <i class="fa fa-star"></i>
                                                           <i class="fa fa-star off"></i>
                                                       </div>
                                                     <!--  <div class="store float-right">
                                                           By: <a href="store-front.html">Fajar Accessories</a>
                                                       </div>
                                                </div><!-- last row /-->
                                                <div class="clearfix"></div>
                                            </div>
                                            </a><!-- product meta /-->

                                        </div><!-- Product /-->

                                    @endif

                                @endforeach
                            </div>


                        </div><!-- products wrap /-->

                        <!-- pagination starts -->
                        <div class="pagination-container">
                            <ul class="pagination" role="menubar" aria-label="Pagination">
                                <li class="arrow unavailable" aria-disabled="true"><a href="">&laquo; Previous</a></li>
                                <li class="current"><a href="">1</a></li>
                                <li><a href="">2</a></li>
                                <li><a href="">3</a></li>
                                <li><a href="">4</a></li>
                                <li class="unavailable" aria-disabled="true"><a href="">&hellip;</a></li>
                                <li><a href="">12</a></li>
                                <li><a href="">13</a></li>
                                <li class="arrow"><a href="">Next &raquo;</a></li>
                            </ul>
                        </div>
                        <!-- Pagination Ends -->

                    </div>
                @else
                    dldld
            @endif
            <!-- store content /-->

            </div><!-- Row /-->
        </div>
    </div>
    <!-- customer content /-->

    </div><!-- content container /-->



@endsection

@section('jscode')

    <script type="application/javascript">
        $(document).ready(function() {
            $.get('{{ url('cjson') }}', function( info ) {
                $.each(info, function( key, value ) {
                    $('.categoryname').each(function(i, obj) {
                        if($(this).data('ebayid') == key) {
                            $(this).html(value);
                        }
                        //console.log($(this).data('ebayid'));
                    });
                    //console.log(catname.data('ebayid'));
                });
            }, "json");
            //jQuery('.categoryname').data('ebayid', '11450').html('Testing');
        });
    </script>

    @endsection