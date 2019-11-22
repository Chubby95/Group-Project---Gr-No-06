<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class StudentDetails extends Model
{
    protected $fillable = [
        'users_id','stu_index_no','stu_register_no','stu_full_name',
        'stu_address_jaffna','stu_address_perment','stu_styding_year','stu_gender','stu_mobile','stu_prefix'
        ,'stu_subject_1','stu_subject_2','stu_subject_3'
    ];

    public function user(){
        return $this->belongsTo(User::class,'users_id');
    }

    public function subjects_1(){
        return $this->belongsTo(Subjects::class,'stu_subject_1');
    }
    public function subjects_2(){
        return $this->belongsTo(Subjects::class,'stu_subject_2');
    }
    public function subjects_3(){
        return $this->belongsTo(Subjects::class,'stu_subject_3');
    }

    public function subject_1_courses(){
        return $this->hasMany(Courses::class,'subject_id','stu_subject_1');
    }

    public function subject_2_courses(){
        return $this->hasMany(Courses::class,'subject_id','stu_subject_2');
    }

    public function subject_3_courses(){
        return $this->hasMany(Courses::class,'subject_id','stu_subject_3');
    }
}
