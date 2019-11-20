<?php

namespace App\Http\Controllers;

use App\Clark;
use App\Courses;
use App\Department;
use App\Lectures;
use App\User;
use App\UserRoles;
use App\UserAssingedRoles;
use Illuminate\Http\Request;

class ClarkController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:dean-office-clark');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Department $department,Lectures $lectures,UserAssingedRoles $students,Courses $courses,UserRoles $userRoles)
    {
        $roleId = $userRoles->where('roleType','student')->first();
        $st = $students->where('user_roles_id',$roleId->id)->get()->count();

        return view('clark.dashboard', ['pageSlug' => 'clark.dashboard','department_count'=>$department->get()->count(),'lectures_count'=>$lectures->get()->count(),'students_count'=>$st,'courses_count'=>$courses->get()->count()]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Clark  $clark
     * @return \Illuminate\Http\Response
     */
    public function show(Clark $clark)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Clark  $clark
     * @return \Illuminate\Http\Response
     */
    public function edit(Clark $clark)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Clark  $clark
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clark $clark)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Clark  $clark
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clark $clark)
    {
        //
    }
}
