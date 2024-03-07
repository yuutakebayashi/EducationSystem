<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Curriculum extends Model
{
    /* Gradeモデルとの紐付け */
    public function grade() {
        return $this->hasMany('App\Grade');
    }

    /* Userモデルとの紐付け */
    public function user() {
        return $this->hasMany('App\User');
    }

    protected $table ='curriculums';
}
