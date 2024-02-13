<?php
namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Fetch the invoices data from the database
        $invoices = Invoice::all();

        // Pass the invoices data to the view
        return view('admin.dashboard', compact('invoices'));
    }
}
