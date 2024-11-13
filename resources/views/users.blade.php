<!-- resources/views/courses/users.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users in {{ $course->name }}</title>
</head>
<body>
    <h1>Users in {{ $course->name }}</h1>

    @if($course->users->isEmpty())
        <p>No users are enrolled in this course.</p>
    @else
        <ul>
            @foreach($course->users as $user)
                <li>{{ $user->name }}</li>
            @endforeach
        </ul>
    @endif

    <a href="/courses">Back to Courses</a>
</body>
</html>
