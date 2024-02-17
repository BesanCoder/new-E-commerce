<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve all users from the database
        $users = User::all();
        
        // Pass the users data to the view
        return view('admin.users', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Return the view for creating a new user
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
    // Validate the request data
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,'.$id,
        // Add more validation rules as needed
    ]);

    // Find the user by ID
    $user = User::findOrFail($id);
    
    // Update the user data
    $user->name = $request->name;
    $user->email = $request->email;
    // Update additional user properties here
    
    // Save the updated user data
    $user->save();

    // Redirect the user back to the index page with a success message
    return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
}

   
    
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Perform search query using the $query parameter
        $users = User::where('name', 'like', "%$query%")
                     ->orWhere('email', 'like', "%$query%")
                     ->get();

        // Return the search results view with the $users data
        return view('admin.search-results', compact('users'));
    }
    public function destroy($id)
{
    $user = User::findOrFail($id);
    $user->delete();
    
    return response()->json(['message' => 'User deleted successfully']);
}

}
