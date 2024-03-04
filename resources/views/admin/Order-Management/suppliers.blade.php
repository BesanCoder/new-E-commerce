<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/admin.suppliers.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
</head>
<body>

<!-- Header -->
<div class="header">
    <!-- Include the header component -->
    @include('components.header')
</div>

<div class="content">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Include the sidebar component -->
        @include('components.sidebar')
    </div>
    <div class="btn_content">
        <!-- Add Supplier button -->
        <div class="add-supplier-container">
            <a href="{{ route('admin.suppliers.create') }}" class="add-supplier-btn">
                <span class="icon"><i class="fas fa-plus-circle"></i></span>
                <span class="item">Add Supplier</span>
            </a>
        </div>

        <!-- Suppliers Table -->
        <div class="suppliers-table-container">
            <h2>Manage Suppliers</h2>
            <div class="search-container">
            <input type="text" id="search" placeholder="Search by supplier name..." oninput="searchSuppliers()">

            </div>
            <table id="suppliers-table">
                <thead>
                    <tr>
                    <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Contact Person</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
                <!-- Table Body -->
                <tbody>
                    @foreach($suppliers as $supplier)
                    <tr id="row_{{ $supplier->id }}">
                    <td>{{ $supplier->id }}</td>
                        <td>{{ $supplier->name }}</td>
                        <td>{{ $supplier->email }}</td>
                        <td>{{ $supplier->phone }}</td>
                        <td>{{ $supplier->address }}</td>
                        <td>{{ $supplier->contact_person }}</td>
                        <td>{{ $supplier->type }}</td>
                        <td>{{ $supplier->status }}</td>
                        <td>
                            <!-- Edit and Delete Buttons -->
                            <div class="action-buttons">
                                <button type="button" class="edit-btn" onclick="openEditDialog('{{ $supplier->id }}', '{{ $supplier->name }}', '{{ $supplier->email }}', '{{ $supplier->phone }}', '{{ $supplier->address }}', '{{ $supplier->contact_person }}', '{{ $supplier->type }}', '{{ $supplier->status }}')">Edit</button>
                                <form action="{{ route('admin.suppliers.destroy', $supplier->id) }}" method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-btn">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Edit Dialog -->
<div id="edit-dialog" class="edit-dialog">
<form id="edit-form" method="POST" action="{{ route('admin.suppliers.update', $supplier->id) }}">
    @csrf
    @method('PUT')
        <label for="edit-name">Name:</label>
        <input type="text" id="edit-name" name="edit-name">
        
        <label for="edit-email">Email:</label>
        <input type="email" id="edit-email" name="edit-email">
        
        <label for="edit-phone">Phone:</label>
        <input type="tel" id="edit-phone" name="edit-phone">
        
        <label for="edit-address">Address:</label>
        <textarea id="edit-address" name="edit-address"></textarea>
        
        <label for="edit-contact-person">Contact Person:</label>
        <input type="text" id="edit-contact-person" name="edit-contact-person">
        
        <label for="edit-type">Type:</label>
        <input type="text" id="edit-type" name="edit-type">
        
        <label for="edit-status">Status:</label>
        <select id="edit-status" name="edit-status">
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
        </select>

        <button type="button" onclick="saveSupplier()">Save</button>
        <button type="button" onclick="closeEditDialog()">Cancel</button>
    </form>
</div>
<script>
    function openEditDialog(supplierId, name, email, phone, address, contactPerson, type, status) {
        // Display the edit dialog
        document.getElementById('edit-dialog').style.display = 'block';

        // Populate input fields with supplier data
        document.getElementById('edit-name').value = name;
        document.getElementById('edit-email').value = email;
        document.getElementById('edit-phone').value = phone;
        document.getElementById('edit-address').value = address;
        document.getElementById('edit-contact-person').value = contactPerson;
        document.getElementById('edit-type').value = type;
        document.getElementById('edit-status').value = status;

        // Store the supplier ID in a data attribute
        document.getElementById('edit-dialog').setAttribute('data-supplier-id', supplierId);
    }

    function closeEditDialog() {
        // Hide the edit dialog
        document.getElementById('edit-dialog').style.display = 'none';
    }

    function saveSupplier() {
    let supplierId = document.getElementById('edit-dialog').getAttribute('data-supplier-id');
    let formData = new FormData(document.getElementById('edit-form'));

    // Add the _method parameter to simulate a PUT request using POST
    formData.append('_method', 'PUT');

    // Get the CSRF token from the meta tag
    let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    fetch('/Order-Management/admin/suppliers/' + supplierId, {
        method: 'POST', // Use POST method instead of PUT
        headers: {
            'X-CSRF-TOKEN': csrfToken,
        },
        body: formData,
    })
    .then(response => {
        if (response.ok) {
            // Handle success response
            console.log('Supplier updated successfully');
            closeEditDialog(); // Close the edit dialog
            updateRowData(supplierId); // Update the row in the table
        } else {
            // Handle error response
            console.error('Error updating supplier:', response.status);
        }
    })
    .catch(error => {
        console.error('Error updating supplier:', error);
    });
}



    function updateRowData(supplierId) {
        // Retrieve the updated data from the form
        let name = document.getElementById('edit-name').value;
        let email = document.getElementById('edit-email').value;
        let phone = document.getElementById('edit-phone').value;
        let address = document.getElementById('edit-address').value;
        let contactPerson = document.getElementById('edit-contact-person').value;
        let type = document.getElementById('edit-type').value;
        let status = document.getElementById('edit-status').value;

        // Update the row with the new data
        let row = document.getElementById('row_' + supplierId);
        row.cells[1].innerText = name;
        row.cells[2].innerText = email;
        row.cells[3].innerText = phone;
        row.cells[4].innerText = address;
        row.cells[5].innerText = contactPerson;
        row.cells[6].innerText = type;
        row.cells[7].innerText = status;
    }
    function searchSuppliers() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("search");
    filter = input.value.toUpperCase();
    table = document.getElementById("suppliers-table");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1]; // Change the index to match the column of supplier name
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

</script>

</body>
</html>
