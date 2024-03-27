<!DOCTYPE HTML>  
<html lang="ja">  
<head>
<link rel="stylesheet" href="{{asset('/css/style.css')}}">
</head>
<body>
<div class="user__main__container">
<a href=""><div>←戻る</div></a>
<table class="user__main__table">
<tbody>
@foreach ($articles as $article)
<tr class="user__info__date">
<td>{{ \Carbon\Carbon::parse($article->posted_date)->format('Y年n月j日') }}</td>
</tr>
<tr>
<td class="user__info__title">{{ $article->title }}</td>
</tr>
<tr>
<td><div class="user__info__contents">{{ $article->article_contents }}</div></td>
@endforeach
</tr>
</tbody>
  </table>
</div>
