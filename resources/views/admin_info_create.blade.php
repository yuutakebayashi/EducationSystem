<!DOCTYPE HTML>  
<html lang="ja">  
<head>
<link rel="stylesheet" href="{{asset('/css/style.css')}}">
</head>
<body>
<div class="admin__main__container">
<a href="{{ route('showList.admininfo') }}"><div>←戻る</div></a>
<h1>お知らせ変更</h1>
    <table class="admin__edit__table">
    <form method="post" action="{{ route('article.store') }}">
    @csrf
     <tr>
        <th><div><label>投稿日時</label></th> <td class="admin__content__td"><input type="datetime-local" name="posted_date" id="posted_date" value="<?php echo date('Y-m-j H:i', $now);?>">
        @if($errors->has('posted_date'))
                        <p>{{ $errors->first('posted_date') }}</p>
                    @endif</div></td>
</tr>
<tr>
        <th><div><label>タイトル</label></th> <td class="admin__content__td"><input type="text" name="title" id="title" value="">
        @if($errors->has('title'))
                        <p>{{ $errors->first('title') }}</p>
                    @endif</div></td>
</tr>
<tr>
        <th><div><label>本文</label></th> <td class="admin__content__td"><textarea name="article_contents" id="article_contents" value=""></textarea></div>
        @if($errors->has('article_contents'))
                        <p>{{ $errors->first('article_contents') }}</p>
                    @endif</td>
</tr>
<tr>
<th></th>
<td class="admin__submit__td"><button class="admin__submit__btn" type="submit">登録</button>
@if(session('message'))
<div class="alert alert-success">{{session('message')}}</div>
@endif
</tr>
</form>
  </table>
  <script>
  </script>
</div>
