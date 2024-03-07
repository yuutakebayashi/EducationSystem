<!DOCTYPE HTML>  
<html lang="ja">  
<head>
<link rel="stylesheet" href="{{asset('/css/style.css')}}">
</head>
<body>
<div class="index__main__container">
<a href=""><div>←戻る</div></a>
<table class="index__main__table">
<tbody>
@foreach ($articles as $article)
<tr>
<td>{{ $article->posted_date }}</td>
</tr>
<tr>
<td>{{ $article->title }}</td>
</tr>
<tr>
<td>{{ $article->article_contents }}</td>
@endforeach
</tr>
</tbody>
  </table>
</div>
