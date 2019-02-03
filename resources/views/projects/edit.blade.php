@extends('layout2');


@section('content')

    <h1>edit project</h1>
    <form action="/projects/{{$project->id}}" method="post">
        {{csrf_field()}}
        {{method_field('PATCH')}}
        <div>
            <input type="text" name="title" placeholder="project title" value="{{$project->title}}">
        </div>
        <div>
            <textarea type="text" name="description" placeholder="projecct description" >{{$project->description}}</textarea>
        </div>
        <div>
            <input type="submit" value="Update project">
        </div>
    </form>


    <form action="/projects/{{$project->id}}" method="post">
        {{csrf_field()}}
        {{method_field('DELETE')}}
        <input type="submit" value="DELETE project">


    </form>

    @endsection