<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'name_kana',
        'email',
        'password',
        'profile_image',
     ];

    /* Gradeモデルとの紐付け */
    public function grade() {
        return $this->hasMany('App\Grade');
    }

    /* Curriculumモデルへの紐付け */
    public function Curriculum() {
        return $this->belongsTo('App\Curriculum');
        }

    /* プロフィール変更処理 */
    public function updateUser($request, $user)
    {
        $dir = 'image';
        if(!empty($request->file('profile_image'))){
            $file_name = $request->file('profile_image')->getClientOriginalName();
            $request->file('profile_image')->storeAs('public/' . $dir, $file_name);

            $result = $user->fill([
                'name' => $request->name,
                'name_kana' => $request->name_kana,
                'email' => $request->email,
                'profile_image' => 'storage/' . $dir . '/' . $file_name,
    
            ])->save();
        } else {
            $result = $user->fill([
                'name' => $request->name,
                'name_kana' => $request->name_kana,
                'email' => $request->email,
    
            ])->save();
        }

        return $result;
    }
}
