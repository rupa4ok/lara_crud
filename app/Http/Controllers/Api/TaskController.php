<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    
    public function index()
    {
        return Task::latest()->where('project_id', Task::getReffer())->get();
    }
    
    public function store(Request $request)
    {
        $task = new Task();
        $task->name = $request->name;
        $task->project_id = Task::getReffer();
        $task->save();
        
        return $task;
    }
    
    public function show($id)
    {
        $project = Project::findOrFail($id);
        return view('task', [ 'id' => $id, 'project' => $project ]);
    }

    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->completed = $request->completed;
        $task->update();
        
        return $task;
    }
    
    /**
     * @param int $id
     * @return int
     * @throws \Exception
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        
        return 204;
    }
}
