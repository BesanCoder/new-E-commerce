<main>
    <div class="container">
        <h2>Search Results</h2>

        @if ($users->isEmpty())
            <p>No users found.</p>
        @else
            <ul>
                @foreach ($users as $user)
                    <li>{{ $user->name }} - {{ $user->email }}</li>
                    <!-- Display additional user information as needed -->
                @endforeach
            </ul>
        @endif
    </div>
</main>
