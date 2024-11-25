<?php

namespace App\Http\Controllers;

use App\Models\Guarantee;
use Illuminate\Http\Request;

class GuaranteeController extends Controller
{
    // Show the Applicant's Guarantees (only their own guarantees)
    public function index()
    {
        $guarantees = Guarantee::where('user_id', auth()->id())->get(); // Fetch guarantees only for the logged-in user
        return view('guarantees.index', compact('guarantees'));
    }

    // Show form to create a new Guarantee
    public function create()
    {
        return view('guarantees.create');
    }

    // Store a newly created Guarantee
    public function store(Request $request)
    {
        // Add the logged-in user's ID to the data
        $request->merge(['user_id' => auth()->id()]);

        // Insert the data into the 'guarantees' table
        Guarantee::create($request->all());

        return redirect()->route('applicant.guarantees')->with('success', 'Guarantee created.');
    }

    // Show the form to edit a Guarantee
    public function edit($id)
    {
        $guarantee = Guarantee::findOrFail($id);

        // Check if the logged-in user is the owner or an admin
        if ($guarantee->user_id !== auth()->id() && !auth()->user()->is_admin) {
            return redirect()->route('applicant.guarantees')->with('error', 'You are not authorized to edit this guarantee.');
        }

        return view('guarantees.edit', compact('guarantee'));
    }

    // Update the specified Guarantee
    public function update(Request $request, $id)
    {
        $guarantee = Guarantee::findOrFail($id);

        // Check if the logged-in user is the owner or an admin
        if ($guarantee->user_id !== auth()->id() && !auth()->user()->is_admin) {
            return redirect()->route('applicant.guarantees')->with('error', 'You are not authorized to update this guarantee.');
        }

        // Update the guarantee with the new data
        $guarantee->update($request->all());

        return redirect()->route('applicant.guarantees')->with('success', 'Guarantee updated.');
    }

    // Delete the specified Guarantee
    public function destroy($id)
    {
        $guarantee = Guarantee::findOrFail($id);

        // Check if the logged-in user is the owner or an admin
        if ($guarantee->user_id !== auth()->id() && !auth()->user()->is_admin) {
            return redirect()->route('applicant.guarantees')->with('error', 'You are not authorized to delete this guarantee.');
        }

        // Delete the guarantee
        $guarantee->delete();

        return redirect()->route('applicant.guarantees')->with('success', 'Guarantee deleted.');
    }

    // Show all Guarantees for Admin (Admin can see all)
    public function adminIndex()
    {
        $guarantees = Guarantee::all(); // Admin sees all guarantees
        return view('admin.guarantees', compact('guarantees'));
    }
}
