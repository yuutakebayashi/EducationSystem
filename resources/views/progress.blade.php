<!DOCTYPE HTML>  
<html lang="ja">  
<head>
<link rel="stylesheet" href="{{asset('/css/style.css')}}">
</head>
<body>
<div class="progress__main__container">
<a href=""><div>←戻る</div></a>
<table class="progress__main__table">
<tr>
<td class="progress__main__table__img">
@if(!empty($user->profile_image))
    <img src="{{ asset($user->profile_image) }}" class="profile__main__table__img">
     @else
     <img src="{{ asset('storage/image/noimage.png')}}" class="profile__main__table__img">
    @endif
</td>
<td><div class="progress__user__info">{{ $user->name }}さんの授業進捗<br>現在の学年：<span class="curriculum__grade__index">{{ $user->classes_name }}</span></div></td>
</tr>
</table>
<div class="curriculum__main__container">
@foreach ($classes_lists as $classes_list)
<div class="curriculum__main__table">
<table class="" id="class_{{ $classes_list->id }}">
    <tr>
        <th>
          <span class="curriculum__grade__index">{{ $classes_list->name }}</span>
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
                <div><span class="clear_label">受講済</span><a href="">{{ $curriculum->title }}</a></div>
                    @endif
                  @else
                {{-- ユーザーが未受講のカリキュラムの場合 --}}
                  @if($classes_list->id === $curriculum->class_id)
                <div><span class="clear_label"></span><a href="">{{ $curriculum->title }}</a></div>
                  @endif
                @endif
                @else
                {{-- ユーザーがクリアしていない学年の場合 --}}
                  @if($classes_list->id === $curriculum->class_id)
                <div class="not_cleared"><span class="clear_label"></span>{{ $curriculum->title }}</div>
                  @endif
                @endif
              @endforeach
            </td>
    </tr>
</table></div>
@endforeach
</div></div>
