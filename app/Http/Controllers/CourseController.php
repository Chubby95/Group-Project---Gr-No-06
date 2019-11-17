<?php

namespace App\Http\Controllers;

use App\Courses;
use App\Department;
use App\Lectures;
use App\Subjects;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Courses $model)
    {
        return view('clark.courses.index',['pageSlug' => 'clark.courses','courses'=> $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Department $department,Lectures $lectures,Subjects $subjects)
    {
        return view('clark.courses.create', ['pageSlug' => 'clark.courses','departments'=> $department->get(),'lectures'=>$lectures->get(),'subjects'=> $subjects->get()]);
    }

    public function getLecturesByDepartment($department,Lectures $lectures){
        return $lectures->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Courses $model)
    {
        if($request["theory"] ==="on"){
            $request["theory"] = 1;
        }

        if($request["practical"] === "on"){
            $request["practical"]=1;
        }
        
        $model->create($request->all());
        return redirect()->route('courses.index')->withStatus(__('Course successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function show(Courses $courses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department,Lectures $lectures,Subjects $subjects,Courses $course)
    {
        return view('clark.courses.edit',compact('course'), ['pageSlug' => 'clark.courses','departments'=>$department->get(),'lectures'=>$lectures->get(),'subjects'=> $subjects->get()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Courses $course)
    {
        if($request["theory"] ==="on"){
            $request["theory"] = 1;
        }else {
            $request["theory"] = 0;
        }

        if($request["practical"] === "on"){
            $request["practical"]=1;
        }else {
            $request["practical"] = 0;
        }
        $course->update($request->all());
        return redirect()->route('courses.index')->withStatus(__('Course successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function destroy(Courses $courses)
    {
        //
    }
}
