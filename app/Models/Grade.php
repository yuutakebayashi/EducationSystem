<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    /* Userモデルへの紐付け */
    public function User() {
        return $this->belongsTo('App\User');
        }

    /* Curriculumモデルへの紐付け */
    public function Curriculum() {
        return $this->belongsTo('App\Curriculum');
        }

    protected $fillable = ['name'];
    protected $table ='classes';
}
