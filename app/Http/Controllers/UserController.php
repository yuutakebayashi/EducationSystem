<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Grade;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

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
        
        $request->validate([
            'current_password' => ['required', new CurrentPasswordRule],
            // 他のバリデーションルールを追加
            'new_password' => 'required|string|min:8|confirmed',
        ]);

    
        //パスワードを変更
        $user = Auth::user();
        $user->password = Hash::make($request->get('new_password'));
        $user->save();
    
        return redirect()->route('showList.pass')->with('flash_message', 'パスワードを変更しました');
    }
    
}
