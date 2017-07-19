@extends('main')


@section ('content')
    <div class="content-area module pageerror">
        <div class="row" dir="rtl">


            <div class="clearfix"></div>
<div class="nokaim">

    <img src="{{$it['PictureURL'][0]}}" width="120">
    <h1 style=" margin: 0; padding: 0;">אופס!</h1>

    <h2 style="margin-top: -40px;">מוצר אינו זמין עוד!</h2>
    <div class="title">{{$it['Title']}}</div>

</div>
            <div style="margin: 20px 0" class="clearfix"></div>
            <!-- more items from store /-->



        </div>
    <div class="row">

        <div class="featured-area small-module">
            <div class="section-title">
                <h2>מוצרים  <span>דומים</span></h2>
            </div><!-- section title /-->

            <div class="content-section store-related">
@foreach($moreitem['itemRecommendations']['item'] as $row)
                <div class="product">
                    <div class="product-image">
                        <a href="{{ url('ebay/'.str_replace([' ','/'],['-',','],$row['title']).'/'.$row["itemId"]) }}">
                            <img style="height: 150px;" src="{{$row['imageURL']}}" alt=""/>
                            <img style="height: 150px;" src="{{$row['imageURL']}}" alt=""/>
                        </a>

                    </div><!-- Product Image /-->
                    <div class="product-title" >
                        <a style="height: 90px" href="{{ url('ebay/'.str_replace([' ','/'],['-',','],$row['title']).'/'.$row["itemId"]) }}">{{$row['title']}}</a>
                    </div><!-- product title /-->
                    <div class="product-meta">
                        <div class="prices">
                            <span class="price">{{HR::currency($row['buyItNowPrice'])}} ₪</span>

                        </div>
                        <div class="clearfix"></div>
                    </div><!-- product meta /-->
                </div><!-- Product /-->

@endforeach

            </div><!-- Content Section /-->

        </div>
        <!-- More From same store. /-->

    </div>
    </div>
@endsection