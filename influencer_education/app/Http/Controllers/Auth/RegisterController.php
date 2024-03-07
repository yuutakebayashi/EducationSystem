<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\RegisterRequest;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/top';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param   $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function register(RegisterRequest $request){
        $validatedData = $request->validated();

        // パスワードをハッシュ化
        $validatedData['password'] = Hash::make($validatedData['password']);

        // ユーザーを作成
        $user = User::create($validatedData);

        // リダイレクト
        return redirect($this->redirectPath())->with('success', 'Registration successful! Please login.');
    }

    protected function create(array $data){
        return User::create([
            'name' => $data['name'],
            'name_kana' => $data['name_kana'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'now_class' => $data['now_class'],
        ]);
    }
}
