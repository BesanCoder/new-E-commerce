<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="{{ asset('css/admin.users.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">    
</head>
<body>

    <!-- Header and Sidebar Component -->
    
        <!-- Header -->
        <div class="header">
            <!-- Include the header component -->
            @include('components.header')
        </div>
        <div class='sc'>
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Include the sidebar component -->
            @include('components.sidebar')
        </div>

        <!-- Flex Container for Content -->
        <div class="content-container">
            <!-- Search form -->
            <form class="container_search" action="{{ route('users.search') }}" method="GET">
                <input type="text" name="query" placeholder="Search users...">
                <i class="fas fa-search"></i>
            </form>
<!-- User Table -->
<table class="user-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Is Admin</th> <!-- New column for is_admin -->
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
    <tr data-id="{{ $user->id }}">
        <td>{{ $user->id }}</td>
        <td contenteditable="true" class="editable" data-field="name" data-id="{{ $user->id }}">{{ $user->name }}</td>
        <td contenteditable="true" class="editable" data-field="email" data-id="{{ $user->id }}">{{ $user->email }}</td>
        <td>{{ $user->is_admin ? 'Yes' : 'No' }}</td> <!-- Display "Yes" if user is admin, "No" otherwise -->
        <td>
            <button onclick="updateUser({{ $user->id }})">Save</button>
            <button onclick="deleteUser({{ $user->id }})">Delete</button>
        </td>
    </tr>
@endforeach
</tbody>
</table>


<script>
function updateUser(userId) {
    // Get the updated name and email values from the table cells
    const name = document.querySelector(`.editable[data-id="${userId}"][data-field="name"]`).innerText;
    const email = document.querySelector(`.editable[data-id="${userId}"][data-field="email"]`).innerText;

    // Make an AJAX request to update the user data
    fetch(`/admin/users/${userId}`, {
        method: 'PUT', // Use PUT method for updating data
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include CSRF token for security
        },
        body: JSON.stringify({ // Send the updated name and email as JSON data
            name: name,
            email: email
        })
    })
    .then(response => response.json())
    .then(data => {
        console.log(data.message); // Log the response message from the server
        // You can optionally update the UI to reflect the changes
    })
    .catch(error => {
        console.error('Error:', error); // Log any errors that occur during the request
    });
}


function deleteUser(userId) {
    if (confirm('Are you sure you want to delete this user?')) {
        fetch(`/admin/users/${userId}`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => response.json())
        .then(data => {
            console.log(data.message);
            // If deletion is successful, remove the user row from the table
            document.querySelector(`tr[data-id="${userId}"]`).remove();
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
}
</script>


</body>
</html>