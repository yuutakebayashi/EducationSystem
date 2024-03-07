<!DOCTYPE HTML>  
<html lang="ja">  
<head>
<link rel="stylesheet" href="{{asset('/css/style.css')}}">
</head>
<body>
<div class="index__main__container">
<a href=""><div>←戻る</div></a>
<h1>プロフィール変更</h1>
    <table class="index__main__table">
    <form method="post" action="{{ route('profile.update', ['id'=>$user->id]) }}" enctype="multipart/form-data">
    @csrf
<tr>
<th><div><label>プロフィール画像</label></th> <td><input type="file" name="profile_image" value="{{ $user->profile_image }}"><img src="{{ asset($user->profile_image) }}" class="index__main__table__img"></div></td>
</tr>
     <tr>
        <th><div><label>ユーザーネーム</label></th> <td><input type="text" name="name" id="name" value="{{ $user->name }}">
        @if($errors->has('name'))
                        <p>{{ $errors->first('name') }}</p>
                    @endif</div></td>
</tr>
<tr>
        <th><div><label>カナ</label></th> <td><input type="text" name="name_kana" id="name_kana" value="{{ $user->name_kana }}">
        @if($errors->has('name_kana'))
                        <p>{{ $errors->first('name_kana') }}</p>
                    @endif</div></td>
</tr>
<tr>
        <th><div><label>メールアドレス</label></th> <td><input type="text" name="email" id="email" value="{{ $user->email }}">
        @if($errors->has('email'))
                        <p>{{ $errors->first('email') }}</p>
                    @endif</div></td>
</tr>
<tr>
        <th><div><label>パスワード</label></th> <td><button class="" type="button" onclick="location.href='{{ route('showList.pass', ['id'=>$user->id]) }}'">{{ __('パスワードを変更する') }}</button></div></td>
</tr>
<tr>
<td class=""><button class="" type="submit">登録</button>
</tr>
</form>
  </table>
</div>
