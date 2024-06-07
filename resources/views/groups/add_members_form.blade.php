<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Members to Group</title>
</head>
<body>
    <div class="container">
        <h1>Add Members to Group: {{ $group->name }}</h1>

        <form action="{{ route('groups.addMembers', $group->id) }}" method="post">
            @csrf
            <!-- Add form fields for selecting members -->
            <!-- Example: -->
            <label for="member_id">Select Member:</label>
            <select name="member_id" id="member_id">
                <!-- Add options for selecting members -->
                <!-- Example: -->
                @foreach ($members as $member)
                    <option value="{{ $member->id }}">{{ $member->name }}</option>
                @endforeach
            </select>

            <button type="submit">Add Member</button>
        </form>
    </div>
</body>
</html>
