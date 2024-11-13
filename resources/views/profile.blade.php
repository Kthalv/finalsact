<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $profile->user->name }}'s Profile</title>
</head>
<body>
    <h1>{{ $profile->user->name }}'s Profile</h1>

    <p><strong>Email:</strong> {{ $profile->user->email }}</p>
    <p><strong>Bio:</strong> {{ $profile->bio }}</p>
    <p><strong>School:</strong> {{ $profile->school }}</p>
</body>
</html>
