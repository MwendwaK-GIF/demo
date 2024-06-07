<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Edit Group</title>
</head>
<body>
    <div class="content">
        <div class="application_name">
            <h1>Edit Group</h1>
        </div>
        <hr>
        <form action="{{ route('groups.update', $group->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="firm_row">
                <label for="name">Group Name:</label>
                <input type="text" id="name" name="name" value="{{ $group->name }}">
            </div>
            <div class="button">
                <button type="submit">Update Group's Name</button>
            </div>
        </form>
    </div>
</body>
</html>
