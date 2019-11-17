<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    protected $fillable =  [
        'Title','department_id'
    ];

    public function departments(){
        return $this->belongsTo(Department::class,'department_id','id');
    }
}
