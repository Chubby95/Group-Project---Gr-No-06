<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;
use App\Http\Requests\DepartmentRequest;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Department $model){
        return view('clark.department.index',['pageSlug' => 'clark.departments','departments'=> $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clark.department.create', ['pageSlug' => 'clark.departments']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentRequest $request,Department $model)
    {
        $model->create($request->all());
        return redirect()->route('departments.index')->withStatus(__('Department successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Department  $departments
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Department  $departments
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        return view('clark.department.edit',compact('department'), ['pageSlug' => 'clark.departments']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $departments
     * @return \Illuminate\Http\Response
     */
    public function update(DepartmentRequest $request, Department $department)
    {
        $department->update($request->all());
        return redirect()->route('departments.index')->withStatus(__('Department successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        //
    }
}
