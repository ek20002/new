<?php

namespace App\Http\Controllers;
use App\Task;
use App\Project;
use Illuminate\Http\Request;

class ProjectTasksController extends Controller
{
    //
    public function update(Task $task){

//         $task->update([
//        'completed'=>request()->has('completed')
//          ]);
        ////////////////or
        $task->complete(request()->has('completed'));

return back();
    }

    public function store(Project $project){

        //dd(request()->all());
       $validated=request()->validate([
       'description'=>'required'

]);

       $project->addTask($validated);


       ///////////////or
//        Task::create([
//            'project_id'=>$project->id,
//            'description'=>request('description')
//        ]);

        return back();
    }
}
