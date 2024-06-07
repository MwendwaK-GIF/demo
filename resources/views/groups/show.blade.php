<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Group Profile</title>
</head>
<body>
    <div class="content">
        
        <!-- Button to trigger modal -->
        
        <div class="application_name">
            <h1>{{ $group->name }}</h1>
            <!-- <a href="{{ route('groups.addMembersForm', $group->id) }}">Add Members</a> -->
            <a href="{{ route('groups.edit', $group->id) }}">Edit Group</a>
        </div>
        <hr>
        
        <h2>Contacts in Group</h2>
        <table>
            <thead>
                <tr>
                    <th>NAME</th>
                    <th>EMAIL</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($group->contacts as $contact)
                    <tr>
                        <td>{{ isset($contact->name) ? $contact->name : 'N/A' }}</td>
                        <td>{{ isset($contact->email) ? $contact->email : 'N/A' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
<!-- 
        <ul>
            @foreach ($group->contacts as $contact)
                <li class="users_in_group" >{{ $contact->name }} - {{ $contact->email }}</li>
            @endforeach
        </ul> -->


        
        <form action="{{ route('groups.destroy', $group->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button class="deletegroup" type="submit" onclick="return confirm('Are you sure you want to delete this group?')">Delete Group</button>
        </form>
    </div>
</body>
</html>
