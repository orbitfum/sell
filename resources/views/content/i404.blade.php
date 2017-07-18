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

        </div>
    </div>
@endsection