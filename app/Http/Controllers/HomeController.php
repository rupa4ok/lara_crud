<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $project  = Project::find(1);
        $tasks = $project->tasks;
        dd($tasks);
        return view('home');
    }
}
