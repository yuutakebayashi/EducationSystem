<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Curriculum;
use App\Models\User;


class Grade extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
    ];

    public function curriculum(){
        return $this->hasMany(Curriculum::class);
    }
    public function user(){
        return $this->hasMany(User::class);
    }
}
