<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Edit Contact</title>
</head>
<body>
    <div class="content">
        <div class="application_name">
            <h1>Edit Contact</h1>
        </div>
        <hr>

        <!-- Form for editing contact details -->
        <form action="{{ route('contacts.update', $contact->id) }}" method="post">
            @csrf
            @method('PUT') <!-- Use PUT method for updating the resource -->
            <div class="firm_row">
                <label for="name">Full name</label>
                <input type="text" name="name" id="name" value="{{ $contact->name }}" placeholder="Enter full name">
            </div>
            <div class="firm_row">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" value="{{ $contact->email }}" placeholder="Enter email address">
            </div>
            <div class="firm_row">
                <label for="group_id">Group</label>
                <select name="group_id" id="group_id">
                    <option value="">Select a group</option>
                    @foreach($groups as $group)
                        <option value="{{ $group->id }}" {{ $contact->group_id == $group->id ? 'selected' : '' }}>{{ $group->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="button">
                <button type="submit">Update</button>
                <a href="{{ route('contacts.index') }}">Cancel</a>
            </div>
        </form>
    </div>
    @if(session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
    @endif

</body>
</html>
