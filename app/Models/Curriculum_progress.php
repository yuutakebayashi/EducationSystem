<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Curriculum_progress extends Model
{
    /* Curriculumモデルへの紐付け */
    public function Curriculum() {
        return $this->belongsTo('App\Curriculum');
        }

        protected $table ='curriculum_progress';

}
