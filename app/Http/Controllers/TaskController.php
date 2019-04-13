<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{

    public function index()
    {
        return Task::latest()->get();
    }
    
    public function create()
    {
        //
    }
    
    public function store(Request $request)
    {
        $task = new Task();
        $task->name = $request->name;
        $task->save();
        
        return $task;
    }
    
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
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
