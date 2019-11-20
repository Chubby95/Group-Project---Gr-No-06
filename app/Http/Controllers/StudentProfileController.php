<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\StudentDetailsRequest;
use App\studentDetails;
use App\Subjects;

class StudentProfileController extends Controller
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


    public function edit(Subjects $subjects, StudentDetails $studentDetails)
    {
        $user = auth()->user()->roles()->get();
        $userid = $user[0]->pivot->user_id;
        $student = $studentDetails->where('id', $userid)->with(
            'subjects_1.departments',
            'subjects_2.departments',
            'subjects_3.departments',
            'subject_1_courses',
            'subject_2_courses',
            'subject_3_courses')->first();


        return view('student.profile.edit', ['student' => $student, 'subjects' => $subjects->get()]);
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StudentDetailsRequest $studentDetailsRequest, StudentDetails $studentDetails)
    {

            $user = auth()->user()->roles()->get();
            $userid = $user[0]->pivot->user_id;
            $studentDetails->updateOrCreate(['users_id' => $userid], $studentDetailsRequest->all());
            auth()->user()->update($studentDetailsRequest->all());
            return redirect()->route('dashboard')->withStatus(__('Profile successfully updated.'));
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return redirect()->route('dashboard')->withPasswordStatus(__('Password successfully updated.'));
    }
}
