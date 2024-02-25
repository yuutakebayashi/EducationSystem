@extends('suzuki.header')

@section('content')
    @foreach ($grade->curriculums as $curriculum)
    <div>
        <video width="320" height="240" controls>
            <source src="{{ route('curriculum.getfiles', ['id' => $curriculum->id]) }}" type="video/mp4">
                Your browser does not support the video tag.
        </video>
        <button>受講しました</button>
    </div>
    @endforeach
<ul>
<p>Grade: {{ $gradeName }}</p>
    @foreach ($grade->curriculums as $curriculum)
        <div>
            <h3>{{ $curriculum->title }}</h3>
            <p>{{ $curriculum->description }}</p>
        </div>
    @endforeach
</ul>

@endsection