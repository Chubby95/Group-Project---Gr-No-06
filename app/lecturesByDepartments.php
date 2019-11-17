<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LecturesByDepartments extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lectures_id', 'department_id'
    ];

}
