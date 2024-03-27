<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Grade;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->user = new User();
    }

    /* プロフィール変更 */
    public function showListProf($id) {
        $result = User::query()
                ->select('users.*', 'classes.name as classes_name')
                ->join('classes','users.classes_id','=','classes.id');
        
        $result->where('users.id', '=', "$id");
        $user = $result->first();
        $classes_lists = Grade::all();
        return view('profile', ['user' => $user, 'classes_lists' => $classes_lists]);
    }

    public function update(UserRequest $request, $id)
    {
        $user = User::find($id);
        $updateUser = $this->user->updateUser($request, $user);

        return redirect()->route('showList.prof', ['id'=>$user->id])->with('message', '登録しました');
    }

    /* パスワード変更 */
    public function showListPass($id) {
        $user = User::find($id);
        return view('password', ['user' => $user]);
    }

    public function updatePassword(Request $request) {
        
        //現在のパスワードが正しいかを調べる
        if(!(Hash::check($request->get('current-password'), Auth::user()->password))) {
        return redirect()->route('showList.pass')->withInput()->withErrors(array('current-password' => '現在のパスワードが間違っています'));
        }

        //現在のパスワードと新しいパスワードが正しいかを調べる
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
        return redirect()->route('showList.pass')->withInput()->withErrors(array('new-password' => '新しいパスワードが現在のパスワードと同じです'));
        }

        //パスワードのバリデーション。新しいパスワードは8文字以上、new-password_confirmationフィールドの値と一致しているかどうか。
        $validated_date = $request->validate([
        'current-password' => 'required',
        'new-password' => 'required|string|min:8|confirmed',
        ]);

    
        //パスワードを変更
        $user = Auth::user();
        $user->password = Hash::make($request->get('new-password'));
        $user->save();
    
        return redirect()->route('showList.pass')->with('flash_message', 'パスワードを変更しました');
    }
    
}
