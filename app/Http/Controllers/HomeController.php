<?php

namespace App\Http\Controllers;

use App\Models\Project;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $projects = Project::with('task')->paginate(9);
        return view('home', compact('projects'));
    }
}
