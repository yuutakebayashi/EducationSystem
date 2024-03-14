<!DOCTYPE HTML>  
<html lang="ja">  
<head>
<link rel="stylesheet" href="{{asset('/css/style.css')}}">
</head>
<body>
<div class="index__main__container">
<a href=""><div>←戻る</div></a>
<table class="index__main__table">
<tr>
<td><div><img src="{{ asset($user->profile_image) }}" class="index__main__table__img"></div></td>
<td><div>{{ $user->name }}さんの授業進捗<br>現在の学年：{{ $user->classes_name }}</div>
</tr>
</table>
@foreach ($classes_lists as $classes_list)
<table id="class_{{ $classes_list->id }}">
    <tr>
        <th>
          {{ $classes_list->name }}
        </th>
    </tr>
    <tr>
            <td>
            @foreach ($curriculums as $curriculum)
                @php
                $clear_flg = $curriculum->clear_flg;
                $user_grade = $user->classes_id;
                @endphp
                @if ($user_grade >= $curriculum->class_id)
                {{-- ユーザーがクリア済の学年の場合 --}}
                  @if ($clear_flg == 1)
                {{-- ユーザーが受講済のカリキュラムの場合 --}}
                    @if($classes_list->id === $curriculum->class_id)
                <div><span style="width: 60px; display: inline-block">受講済</span><a href="">{{ $curriculum->title }}</a></div>
                    @endif
                  @else
                {{-- ユーザーが未受講のカリキュラムの場合 --}}
                  @if($classes_list->id === $curriculum->class_id)
                <div><span style="width: 60px; display: inline-block"></span><a href="">{{ $curriculum->title }}</a></div>
                  @endif
                @endif
                @else
                {{-- ユーザーがクリアしていない学年の場合 --}}
                  @if($classes_list->id === $curriculum->class_id)
                <div><span style="width: 60px; display: inline-block"></span>{{ $curriculum->title }}</div>
                  @endif
                @endif
              @endforeach
            </td>
    </tr>
</table>
@endforeach
</div>
