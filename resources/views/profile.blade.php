<!DOCTYPE HTML>  
<html lang="ja">  
<head>
<link rel="stylesheet" href="{{asset('/css/style.css')}}">
</head>
<body>
<div class="profile__main__container">
<a href=""><div>←戻る</div></a>
<h1>プロフィール変更</h1>
    <table class="profile__main__table">
    <form method="post" action="{{ route('profile.update', ['id'=>$user->id]) }}" enctype="multipart/form-data">
    @csrf
<tr>
<td>
    @if(!empty($user->profile_image))
    <img src="{{ asset($user->profile_image) }}" class="profile__main__table__img">
     @else
     <img src="{{ asset('storage/image/noimage.png')}}" class="profile__main__table__img">
    @endif
</td><td><div class="profile__img__label">プロフィール画像</div><input type="file" name="profile_image" value="{{ $user->profile_image }}">
    </td>
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
        <th><div><label>パスワード</label></th> <td><button class="profile__psw__btn" type="button" onclick="location.href='{{ route('showList.pass', ['id'=>$user->id]) }}'">{{ __('パスワードを変更する') }}</button></div></td>
</tr>
<tr>
<th></th>
<td class="profile__submit__td"><button class="profile__submit__btn" type="submit">登録</button>
@if(session('message'))
<div class="alert alert-success">{{session('message')}}</div>
@endif
</tr>
</form>
  </table>
</div>
