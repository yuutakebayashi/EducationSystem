<!DOCTYPE HTML>  
<html lang="ja">  
<head>
</head>
<body>
<div class="index__main__container">
<a href="{{ route('showList.admininfo') }}"><div>←戻る</div></a>
<h1>お知らせ変更</h1>
    <table class="index__main__table">
    <form method="post" action="{{ route('article.store') }}">
    @csrf
     <tr>
        <th><div><label>投稿日時</label></th> <td><input type="text" name="posted_date" id="posted_date" value="">
        @if($errors->has('posted_date'))
                        <p>{{ $errors->first('posted_date') }}</p>
                    @endif</div></td>
</tr>
<tr>
        <th><div><label>タイトル</label></th> <td><input type="text" name="title" id="title" value="">
        @if($errors->has('title'))
                        <p>{{ $errors->first('title') }}</p>
                    @endif</div></td>
</tr>
<tr>
        <th><div><label>本文</label></th> <td><textarea name="article_contents" id="article_contents" value=""></textarea></div>
        @if($errors->has('article_contents'))
                        <p>{{ $errors->first('article_contents') }}</p>
                    @endif</td>
</tr>
<tr>
<td class=""><button class="" type="submit">登録</button>
@if(session('message'))
<div class="alert alert-success">{{session('message')}}</div>
@endif
</tr>
</form>
  </table>
  <script>
  </script>
</div>
