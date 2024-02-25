<html>
<body>
    <form action="{{route('curriculum.creates')}}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        カリキュラムタイトル:<input type="text" name="title"><br/>
        カリキュラム説明文:<input type="text" name="description"><br/>
        動画URL:<input type="file" name="video"><br/>
        常時公開フラグ:<input type="text" name="alway_delivery_flg"><br/>
        クラスID:<input type="text" name="classes_id"><br/>
        <input type="submit" value="送信">
    </form>
    @foreach( $curriculums as $curriculum )
    <div>{{$curriculum->title}}</div>
    <div>{{$curriculum->description}}</div>
    <video width="320" height="240" controls>
        <source src="{{ route('curriculum.getfiles', ['id' => $curriculum->id]) }}" type="video/mp4">
            Your browser does not support the video tag.
    </video>
    <div>{{$curriculum->alway_delivery_flg}}</div>
    <div>{{$curriculum->classes_id}}</div>
    @endforeach
</body>
</html>