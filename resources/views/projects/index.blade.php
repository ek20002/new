<html>
<head>
    <title>

    </title>
</head>

<body>

<h1>Projects</h1>

<ul>
    @foreach($projects as $project)

<li><a href="/projects/{{$project->id}}">{{$project->title}}</a></li>

     @endforeach

    @if(session('message'))
<p>{{session('message')}}</p>
        @endif
</ul>
</body>
</html>