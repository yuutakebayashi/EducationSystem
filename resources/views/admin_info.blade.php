<!DOCTYPE HTML>  
<html lang="ja">  
<head>
<link rel="stylesheet" href="{{asset('/css/style.css')}}">
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="{{ asset('/js/info.js') }}"></script>
</head>
<body>
<div class="admin__main__container">
<a href=""><div>←戻る</div></a>
<h1>お知らせ一覧</h1>
<button type="button" class="admin__create__btn" onclick="location.href='{{ route('showList.admininfocreate') }}'">{{ __('新規登録') }}</button>
    <table class="admin__main__table">
     <thead>
        <tr>
            <th>投稿日時</th>
            <th>タイトル</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        @foreach ($articles as $article)
            <td>{{ \Carbon\Carbon::parse($article->posted_date)->format('Y年n月j日') }}</td>
            <td>{{ $article->title }}</td>
            <td><button class="admin__edit__btn" type="button" onclick="location.href='{{ route('showList.admininfoedit', ['id'=>$article->id]) }}'">{{ __('変更する') }}</button>
            @csrf
            @method('DELETE')
            <button data-article_id="{{ $article->id }}" class="admin__delete__btn" type="submit" >削除</button></td>
        </tr>
    </tbody>
    @endforeach
  </table>
  <script>
  destroy();
  </script>
</div>
