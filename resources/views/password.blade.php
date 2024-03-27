<!DOCTYPE HTML>  
<html lang="ja">  
<head>
<link rel="stylesheet" href="{{asset('/css/style.css')}}">
</head>
<body>
<div class="profile__main__container">
<a href="{{ route('showList.prof', ['id'=>$user->id]) }}"><div>←戻る</div></a>
<h1>パスワード変更</h1>
    <table class="profile__main__table">
    <form method="post" action="{{ route('password.update', ['id'=>$user->id]) }}">
    @csrf
     <tr>
        <th><div><label>旧パスワード</label></th> <td><input class="profile__pwd__input" type="" name="current_password" id="current_password" value="">
        @error('current_password')
        <div class="text-danger">
            {{ $message }}
        </div>
    @enderror</div></td>
</tr>
<tr>
        <th><div><label>新パスワード</label></th> <td><input class="profile__pwd__input" type="" name="new_password" id="new_password" value=""></div></td>
</tr>
<tr>
        <th><div><label>新パスワード確認</label></th> <td><input class="profile__pwd__input" type="" name="new_password_confirm" id="new_password_confirm" value=""></div></td>
</tr>
<th></th>
<td class="profile__submit__td"><button class="profile__pwd__submit__btn" type="submit">登録</button>
</tr>
</form>
  </table>
</div>
