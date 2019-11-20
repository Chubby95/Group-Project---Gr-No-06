<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lectures extends Model
{
    protected $fillable =  [
        'lecture_name'
    ];

    public function departments(){
        return $this->belongsToMany(Department::class,'department_lectures');
    }
}
