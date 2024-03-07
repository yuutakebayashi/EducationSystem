@extends('suzuki.header')

@section('content')
    <a href="{{ route('top.index') }}" style="text-decoration: none; color: black; font-size: 18px;">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
        </svg>
        戻る
    </a>
    @foreach ($grade->curriculums as $curriculum)
        @php
            $alway_delivery_flg = $curriculum->alway_delivery_flg;
        @endphp
        @if ($alway_delivery_flg == 1)
            <!-- Video is always available -->
            <div class="d-flex align-items-center">
                <video width="520" height="350" controls>
                    <source src="{{ $curriculum->video_url }}" type="video/mp4">
                        Your browser does not support the video tag.
                </video>
                <button class=" border-1 target ms-5 navbar-custom p-3 rounded text-light" data-curriculum="{{ $curriculum->id }}">受講しました</button>
            </div>
        @else
            @foreach ($delivery_times as $delivery_time)
                @if ($delivery_time->curriculums_id == $curriculum->id)
                    @php
                        $now = now();
                        $delivery_from = \Carbon\Carbon::parse($delivery_time->delivery_from);
                        $delivery_to = \Carbon\Carbon::parse($delivery_time->delivery_to);
                    @endphp
                    @if ($now->between($delivery_from, $delivery_to))
                        <div class="d-flex align-items-center">
                            <video width="520" height="350" controls>
                                <source src="{{ route('curriculum.getfiles', ['id' => $curriculum->id]) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                            </video>
                            <button class=" border-1 target ms-5 navbar-custom p-3 rounded text-light" data-curriculum="{{ $curriculum->id }}">受講しました</button>
                        </div>
                    @else
                        <p>動画はまだ公開されていません。</p>
                    @endif
                @endif
            @endforeach
        @endif
    @endforeach
    <!-- <p id='update'>clear_flg:{{ $curriculumProgress }}</p> -->

<div class="mt-5">
    @foreach ($grade->curriculums as $curriculum)
        <div>
            <div class="text-light nav_item-custom mb-3 ps-3 pe-3 pt-1 pb-1 rounded-pill" style="display: inline-block; width: auto;">{{ $gradeName }}</div>
            <h3>{{ $curriculum->title }}</h3>
            <div>講座内容</div>
            <p>{{ $curriculum->description }}</p>
        </div>
    @endforeach
</div>

<script>
    $(document).ready(function(){
        $('.target').click(function(){
            var curriculumId = $(this).data('curriculum');
            $.ajax({
                url: '{{ route('delivery.update') }}',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                data: {
                    curriculum_id: curriculumId
                },
            }).done(function( data ) {
                $('#update').text('clear_flg:'+data.value);
                console.log(data);
            });
        });
    });
</script>

@endsection