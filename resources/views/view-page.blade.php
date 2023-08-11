<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>

    <!-- Navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">@yield('project-name')</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Settings</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main content -->
    <div class="container-fluid my-3">
        <div class="row">

            <!-- Sidebar -->
            <div class="col-md-3">
                <ul class="list-group">
                    <li class="list-group-item active">Menu</li>
                    <li class="list-group-item"><a href="{{route('books.index')}}">Books</a></li>
                    <li class="list-group-item"><a href="{{ route('books.create') }}">Create Book</a></li>
                </ul>
            </div>

            <!-- Content area -->
            <div class="col-md-9">
                @yield('content')
            </div>

        </div>
    </div>
</body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
h1{
    text-align: center;
}
ul{
    text-align: center;
}
h3{
    text-align: center;
}
li{
    text-align: center;
}
</style>
<body>

<h1><span style="color: red;">Title:</span>{{$book->title}}</h1>
<h1><span style="color: red;">price:</span>{{$book->price}}</h1>
<h1><span style="color: red;">Description:</span>{{$book->description}}</h1>



<h3>Tags:</h3>
<ul>
    @foreach ($book->tags as $tag)
        <li>{{ $tag->name }}</li>
    @endforeach
</ul>
</body>
</html>
