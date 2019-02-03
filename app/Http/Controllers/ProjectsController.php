<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use phpDocumentor\Reflection\Types\Object_;

class ProjectsController extends Controller
{
    //

    public function __construct(){

      //  $this->middleware('auth')->only(['store','create',.....]);
       //    $this->middleware('auth')->except(['show']);
        $this->middleware('auth');
    }

    public function index(){
       //$projects=Project::all();
        //dd(auth()->id());
       // $projects=Project::where('owner_id',auth()->id())->get();
         $projects=auth()->user()->projects;
        return view('projects.index',compact('projects'));
    }

    public  function create(){


        return view('projects.create');
    }
/////////////////////////////////////
///
///
///
///
//    public function store(){
//
//$project=new Project();
//$project->title=request('title');
//$project->description=request('description');
//$project->save();
//return redirect('/projects');
//    }

    public function store(){
          $validated=request()->validate([

              'title'=>'required',
              'description'=>'required'

          ]);
        $validated['owner_id']=auth()->id();
///this sesstion life time is only one request
        session()->flash('message','your project has been created');
        Project::create($validated);

        return redirect('/projects');
    }


    ////////////////////////////////////////
///////////////////////////////////////////
///
///
///
///
///
//    public function edit($id){
//
//
//        $project=Project::findOrFail($id);
//
//        return view('projects.edit',compact('project'));
//    }



    public function edit(Project $project){




        return view('projects.edit',compact('project'));
    }
///////////////////////////////////////////////////////
/// ////////////////////////////////////////////
///
///
///
///
//    public function update($id){
//        $project=Project::findOrFail($id);
//        $project->title=request('title');
//        $project->description=request('description');
//        $project->save();
//
//        return redirect('/projects');
//
//
//    }




    public function update(Project $project){

        $project->title=request('title');
        $project->description=request('description');
        $project->save();

        return redirect('/projects');


    }
/////////////////////////////////////////////
///
///
///
///
///
//    public function destroy($id){
//
//Project::find($id)->delete();
//return redirect('/projects');
//
//    }

    public function destroy(Project $project){

        $project->delete();
        return redirect('/projects');

    }


    ////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
///
///
///
///
///
//    public function show($id){
//
//        $project=Project::findOrFail($id);
//        return view('projects.show',compact('project'));
//    }


    public function show(Project $project){

             //abort_if($project->owner_id!==auth()->id(),403);

             //$this->authorize('view',$project);
////////////////////php artisan make:policy Projectpolicy --model=Project
/// ///create view function in Projectpolicy
        //abort_if(\Gate::denies('view',$project),'403');
        abort_unless(\Gate::allows('view',$project),'403');
        return view('projects.show',compact('project'));
    }

    ////////////////////////////////////////////////////////////////////////////////
}
