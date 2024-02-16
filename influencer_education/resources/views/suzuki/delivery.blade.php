@extends('suzuki.header')

@section('content')
<ul>
<p>{{ $gradeName }}</p>
@foreach($curriculums as $curriculum)
<li>
    <div>{{$curriculum->title}}</div>
    <div>講座内容</div>
    <div>{{$curriculum->description}}</div>
</li>
@endforeach
</ul>
@endsection