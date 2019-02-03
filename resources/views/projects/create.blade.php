<html>
<head>
    <title>

    </title>
</head>

<body>

<h1>Create a new project</h1>

<form action="/projects" method="post">
    {{csrf_field()}}
    <div>
        <input type="text" name="title" placeholder="project title" >
    </div>
    <div>
        <textarea type="text" name="description" placeholder="projecct description" ></textarea>
    </div>
    <div>
        <input type="submit" value="create project">
    </div>
</form>
@if($errors->any())
<div>

    <ul>

        @foreach($errors->all() as $error)

<li>{{$error}}</li>

            @endforeach
    </ul>
</div>
    @endif
</body>
</html>