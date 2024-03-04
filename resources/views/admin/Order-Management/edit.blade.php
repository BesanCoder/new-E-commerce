<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Supplier</title>
</head>
<body>
    <h1>Edit Supplier</h1>
    @dd($supplier)

    <form action="{{ route('admin.suppliers.update', $supplier->id) }}" method="post">
        @csrf
        @method('PUT')

        <label for="edit-name">Name:</label>
    <input type="text" id="edit-name" name="edit-name" value="{{ $supplier->name }}">
        
        <label for="edit-email">Email:</label>
        <input type="email" id="edit-email" name="edit-email" value="{{ $supplier->email }}">

        <label for="edit-phone">Phone:</label>
        <input type="tel" id="edit-phone" name="edit-phone" value="{{ $supplier->phone }}">
        
        <label for="edit-address">Address:</label>
        <textarea id="edit-address" name="edit-address">{{ $supplier->address }}</textarea>
        
        <label for="edit-contact-person">Contact Person:</label>
        <input type="text" id="edit-contact-person" name="edit-contact-person" value="{{ $supplier->contact_person }}">
        
        <label for="edit-type">Type:</label>
        <input type="text" id="edit-type" name="edit-type" value="{{ $supplier->type }}">
        
        <label for="edit-status">Status:</label>
        <select id="edit-status" name="edit-status">
            <option value="active" {{ $supplier->status == 'active' ? 'selected' : '' }}>Active</option>
            <option value="inactive" {{ $supplier->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
        </select>

        <button type="submit">Save</button>
    </form>
    
</body>
</html>
