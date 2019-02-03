@extends('layout2')

@section('content')


    <h1>{{$project->title}}</h1>
        <p>{{$project->description}}</p>

<p><a href="/projects/{{$project->id}}/edit">Edit</a></p>




    @if($project->task->count())
        <div>
            
                @foreach($project->task as $task)
                <form action="/tasks/{{$task->id}}" method="post">
                    {{method_field('PATCH')}}
                    {{csrf_field()}}
                    <lable for="completed">
                    <input type="checkbox" name="completed" onchange="this.form.submit()" {{$task->completed ? "checked":""}}>
                        {{$task->description}}
                    </lable>
                </form>
                @endforeach
           
        </div>
    @endif


    <form action="/projects/{{$project->id}}/tasks" method="post">
        {{method_field('POST')}}
        {{csrf_field()}}
      <lable for="description">New task</lable>
        <input type="text" name="description" placeholder="new task">
        <input type="submit" value="create new task">

    </form>
    @include('errors')
    @endsection