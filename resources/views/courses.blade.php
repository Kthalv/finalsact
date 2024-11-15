<!-- resources/views/users/courses.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $user->name }}'s Courses</title>
</head>
<body>
    <h1>{{ $user->name }}'s Courses</h1>


    @if($user->courses->isEmpty())
        <p>This user is not enrolled in any courses.</p>
    @else
        <ul>
            @foreach($user->courses as $course)
                <li>{{ $course->course_name }}</li>
            @endforeach
        </ul>
    @endif


    <a href="/users">Back to Users</a>
</body>
</html>