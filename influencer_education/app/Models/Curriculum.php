<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Grade;
use App\Models\Curriculum_Progress;

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
        return $this->belongsTo(Grade::class, 'classes_id');
    }

    public function curricurum_progress(){
        return $this->hasMany(Curricurum_progress::class,'curriculums_id');
    }
}
