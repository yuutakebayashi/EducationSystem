@extends('suzuki.header')

@section('content')

    <!-- <form action="{{route('banner.create')}}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        商品画像:<input type="file" name="file"><br/>
        <input type="submit" value="送信">
    </form> -->

    <!-- @foreach( $banners as $banner )
    <img style="height:100px; width:100px;" src="{{route('banner.getfile',['id'=>$banner->id])}}">
    @endforeach -->

    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
        @foreach( $banners as $key => $banner )
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                <img class="w-100" style="max-height:300px;" src="{{ route('banner.getfile',['id'=>$banner->id]) }}">
            </div>
        @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <h3 class="mt-5">お知らせ</h3>
    <div class="border border-1 rounded p-3 ms-3">
        @foreach($articles as $article)
        <div class="list-unstyled d-flex">
            <div class="me-5">{{ $article->posted_date }}</div>
            <div>{{ $article->title }}</div>
        </div>
        @endforeach
    </div>
@endsection