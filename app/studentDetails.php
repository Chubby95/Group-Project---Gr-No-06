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
}
