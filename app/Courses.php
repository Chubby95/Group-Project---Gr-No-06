<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $fillable =  [
        'course_name','lecture_id','level','credit','course_code','theory',
        'practical','subject_id','department_id','group_project'
    ];

    public function departments(){
        return $this->belongsTo(Department::class,'department_id');
    }

    public function subjects(){
        return $this->belongsTo(Subjects::class,'subject_id');
    }
}
