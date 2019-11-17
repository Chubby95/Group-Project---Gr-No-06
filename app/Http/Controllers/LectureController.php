<?php

namespace App\Http\Controllers;

use App\Lectures;
use Illuminate\Http\Request;
use App\Http\Requests\LectureRequest;
use App\Department;

class LectureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Lectures $model)
    {
        return view('clark.lectures.index',['pageSlug' => 'clark.lectures','lectures'=> $model->with('departments')->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Department $department)
    {
        return view('clark.lectures.create', ['pageSlug' => 'clark.lectures','departments'=> $department->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LectureRequest $request, Lectures $lectures)
    {
        $department = Department::where('id',$request->get('department_id'))->first();
        $lecture = $lectures->create($request->all());
        $lecture->departments()->attach($department);
        return redirect()->route('lectures.index')->withStatus(__('Course successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lectures  $lectures
     * @return \Illuminate\Http\Response
     */
    public function show(Lectures $lectures)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lectures  $lectures
     * @return \Illuminate\Http\Response
     */
    public function edit(Lectures $lecture)
    {
        $departments = Department::get();
        return view('clark.lectures.edit', compact(['lecture','departments']),['pageSlug' => 'clark.lectures']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lectures  $lectures
     * @return \Illuminate\Http\Response
     */
    public function update(LectureRequest $request, Lectures $lectures)
    {
        $lectures->update($request->all());
        return redirect()->route('lectures.index')->withStatus(__('Course successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lectures  $lectures
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lectures $lectures)
    {
        //
    }
}
