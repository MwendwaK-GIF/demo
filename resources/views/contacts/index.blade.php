<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Contact Grouping</title>
</head>
<body>
    <div class="content">
        <div class="application_name">
            <h1>Contact Grouping</h1>
            <a href="{{ route('groups.index') }}">All Groups</a>
        </div>
        <hr>

        <form action="{{ route('contacts.store') }}" method="post">
            @csrf
            <div class="firm_row">
                <label for="name">Full name</label>
                <input type="text" name="name" id="name" placeholder="type here">
            </div>
            <div class="firm_row">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" placeholder="type here">
            </div>
            <div class="firm_row">
                <label for="group">Group</label>
                <select name="group_id" id="group">
                    <option value=""selected>Select a group</option>
                    @foreach($groups as $group)
                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="button">
                <button type="submit">ADD</button>
                <button type="reset">Cancel</button>
            </div>
        </form>
        <hr>

        @if ($contacts->isEmpty())
            <p>No contacts found.</p>
        @else
            <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>GROUP</th> <!-- New column for displaying group -->
                    <th class="action_btn">EDIT</th>
                    <th class="action_btn">DELETE</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                    <tr>
                        <td>{{ $contact->id }}</td>
                        <td>{{ isset($contact->name) ? $contact->name : 'N/A' }}</td>
                        <td>{{ isset($contact->email) ? $contact->email : 'N/A' }}</td>
                        <td>{{ isset($contact->group->name) ? $contact->group->name : 'N/A' }}</td> <!-- Display group name -->
                        <td class="action_btn"><a href="{{ route('contacts.edit', $contact->id) }}"><i class='bx bx-edit-alt'></i> Edit</a></td>
                        <td class="action_btn">
                            <form action="{{ route('contacts.destroy', $contact->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="action_btn delete" type="submit" onclick="return confirm('Are you sure you want to delete this contact?')"><i class='bx bxs-trash'></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @endif

    </div>
    @if(session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
    @endif

</body>
</html>
