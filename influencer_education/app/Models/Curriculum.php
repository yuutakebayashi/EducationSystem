<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Grade;
use App\Models\Curriculum_Progress;
use App\Models\Delivery_time;

class Curriculum extends Model
{
    use HasFactory;

    protected $table = 'curriculums';

    protected $fillable = [
        'title',
        'description',
        'video_url',
        'alway_delivery_flg',
        'classes_id',
    ];

    public function grade(){
        return $this->belongsTo(Grade::class,'classes_id');
    }

    public function curriculum_progress(){
        return $this->hasMany(Curriculum_Progress::class,'curriculums_id');
    }

    public function delivery_time(){
        return $this->hasMany(Delivery_time::class,'curriculums_id');
    }
}
