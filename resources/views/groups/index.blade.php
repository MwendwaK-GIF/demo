<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Add Group</title>
</head>
<body>
    <div class="content">
        <div class="application_name">
            <h1>Add New Group</h1>
            <a href="{{ route('contacts.index') }}">All Contacts</a>
        </div>
        <hr>
        <form action="{{ route('groups.store') }}" method="post">
            @csrf
            <div class="firm_row">
                <label for="group_name">Group Name:</label>
                <input type="text" id="group_name" name="name" placeholder="type here">
            </div>
            <div class="button">
                <button type="submit">Add Group</button>
            </div>
        </form>
        <hr>

        <h2>All Groups</h2>
        <ul>
            @if ($groups->isEmpty())
                <p>No Groups found.</p>
            @else
                @foreach ($groups as $group)
                    <li>
                        <a href="{{ route('groups.show', $group->id) }}">{{ $group->name }}</a>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
</body>
</html>
