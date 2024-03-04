<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Supplier</title>
    <link rel="stylesheet" href="{{ asset('css/admin.suppliersCreate.css') }}">
</head>
<body>

<div class="content">
    <div class="create-supplier-container">
        <h2>Create Supplier</h2>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('admin.suppliers.store') }}" method="POST">
            @csrf
            <label for="name">Supplier Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" required>

            <label for="address">Address:</label>
            <textarea id="address" name="address" required></textarea>

            <label for="contact_person">Contact Person:</label>
            <input type="text" id="contact_person" name="contact_person">

            <label for="type">Type:</label>
            <input type="text" id="type" name="type">

            <label for="payment_terms">Payment Terms:</label>
            <input type="text" id="payment_terms" name="payment_terms">

            <label for="status">Status:</label>
            <select id="status" name="status">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>

            <label for="notes">Notes:</label>
            <textarea id="notes" name="notes"></textarea>

            <button type="submit" class="create-supplier-btn">Create Supplier</button>
        </form>
    </div>
</div>

</body>
</html>
