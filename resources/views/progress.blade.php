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
<table>
    <tr>
        <th>
        @foreach ($curriculums as $curriculum)
        {{ $curriculum->name }}
        {{ $curriculum->title }}
        @endforeach
        </th>
    </tr>
    <tr>
        <td>
</div>
