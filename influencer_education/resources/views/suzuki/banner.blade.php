<html>
<body>
    <form action="{{route('banner.create')}}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        商品画像:<input type="file" name="file"><br/>
        <input type="submit" value="送信">
    </form>
    @foreach( $banners as $banner )
    <img style="height:100px; width:100px;" src="{{route('banner.getfile',['id'=>$banner->id])}}">
    @endforeach
</body>
</html>