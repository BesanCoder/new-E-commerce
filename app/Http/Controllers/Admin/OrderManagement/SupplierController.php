<?php
namespace App\Http\Controllers\Admin\OrderManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Supplier;
use Illuminate\Http\Response; 

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        return view('admin.Order-Management.suppliers', ['suppliers' => $suppliers]);
    }

    public function create()
    {
        return view('admin.Order-Management.suppliersCreate');
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:suppliers',
                'phone' => 'required|string|max:20',
                'address' => 'required|string|max:255',
                'contact_person' => 'nullable|string|max:255',
                'type' => 'nullable|string|max:255',
                'payment_terms' => 'nullable|string|max:255',
                'status' => 'required|in:active,inactive',
                'notes' => 'nullable|string',
            ]);

            $supplier = new Supplier();
            $supplier->fill($validatedData);
            $supplier->save();

            return redirect()->route('admin.suppliers.index')->with('success', 'Supplier created successfully');
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                return redirect()->back()->withInput()->withErrors(['email' => 'The email address is already taken.']);
            } else {
                return redirect()->back()->withInput()->withErrors(['unexpected' => 'An unexpected error occurred.']);
            }
        }
    }
    
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect()->route('admin.suppliers.index')->with('success', 'Supplier deleted successfully');
    }

    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('admin.Order-Management.suppliers.edit', compact('supplier'));
    }
   
    public function update(Request $request, $id)
{
    // Adjust the validation rules if necessary
    $request->validate([
        'edit-name' => 'required',
        // Add validation rules for other fields as needed
    ]);

    // Find the supplier by ID
    $supplier = Supplier::findOrFail($id);

    // Update the supplier with the data from the request
    $supplier->name = $request->input('edit-name');
    $supplier->email = $request->input('edit-email');
    $supplier->phone = $request->input('edit-phone');
    $supplier->address = $request->input('edit-address');
    $supplier->contact_person = $request->input('edit-contact-person');
    $supplier->type = $request->input('edit-type');
    $supplier->status = $request->input('edit-status');

    // Save the updated supplier
    $supplier->save();

    // Redirect back or to a different page
    return redirect()->route('admin.suppliers.index')->with('success', 'Supplier updated successfully');
}


}
