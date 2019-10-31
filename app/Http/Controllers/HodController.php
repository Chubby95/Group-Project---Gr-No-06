<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HodController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:head-of-the-department');
    }
    
    public function index()
    {
        return view('hod.dashboard', ['pageSlug' => 'hod.dashboard']);
    }
}
