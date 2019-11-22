<?php

namespace App\Http\Controllers;

use App\StudentDetails;
use App\Subjects;
use App\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:student');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('student.dashboard', ['pageSlug' =>'student.dashboard']);
    }

    
    public function index(User $model)
    {
        return view('student.user.index', ['pageSlug' => 'student.users','users' => $model->paginate(15)]);
    }


    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('student.user.create',['pageSlug' => 'student.users']);
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request, User $model)
    {
        $model->create($request->merge(['password' => Hash::make($request->get('password'))])->all());

        return redirect()->route('student.user.index')->withStatus(__('User successfully created.'));
    }

    /**
     * Show the form for editing the specified user
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        
        return view('student.user.edit', compact('user'),['pageSlug' => 'student.users']);
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User  $user)
    {
        $hasPassword = $request->get('password');
        $user->update(
            $request->merge(['password' => Hash::make($request->get('password'))])
                ->except(
                    [$hasPassword ? '' : 'password']
                )
        );

        return redirect()->route('student.user.index')->withStatus(__('User successfully updated.'));
    }

    /**
     * Remove the specified user from storage
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User  $user)
    {
        if ($user->id == 1) {
            return abort(403);
        }

        $user->delete();

        return redirect()->route('student.user.index')->withStatus(__('User successfully deleted.'));
    }

    public function renew(){
        return view('student.forms.renew',['pageSlug' => 'student.form.renew']);
    }

    public function renewstore(){
        return redirect()->route('student.forms.renew')->withStatus(__('User successfully deleted.'));
    }

    public function confirmation(){
        return view('student.forms.confirmation',['pageSlug' => 'student.form.confirmation']);
    }

    public function confirmationstore(){
        return redirect()->route('student.forms.confirmation')->withStatus(__('User successfully deleted.'));
    }

    public function endexam(StudentDetails $studentDetails){
       
        $user = auth()->user()->roles()->get();
        $userid = $user[0]->pivot->user_id;
        $student = $studentDetails->where('id', $userid)->with(
            'subjects_1.departments',
            'subjects_2.departments',
            'subjects_3.departments',
            'subject_1_courses',
            'subject_2_courses',
            'subject_3_courses')->first();

        return view('student.forms.endexam',['pageSlug' => 'student.form.endexam','students'=>$student]);
    }

    public function endexamstore(){
        return redirect()->route('student.forms.endexam')->withStatus(__('User successfully deleted.'));
    }
}
