<?php

namespace App\Http\Controllers;

use App\Models\Guarantee;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    // Show the Applicant's Dashboard
    public function applicantDashboard()
    {
        // Ensure the user is authenticated
        if (auth()->check()) {
            // Fetch guarantees for the logged-in user (Applicant)
            $guarantees = Guarantee::where('user_id', auth()->id())->get(); // Only fetch the guarantees for the logged-in user

            // Check if there are no guarantees and set a message accordingly
            $message = $guarantees->isEmpty() ? "You haven't created any guarantees yet." : null;

            // Return the applicant dashboard view with guarantees and message
            return view('dashboard.applicant', compact('guarantees', 'message'));
        }

        // If the user is not authenticated, redirect them to the login page
        return redirect()->route('login');
    }

    // Show the Admin's Dashboard
    public function adminDashboard()
    {
        // Fetch counts for users and guarantees (Admin dashboard logic)
        $users = User::count();
        $guarantees = Guarantee::count();

        // Return the admin dashboard view with the counts
        return view('dashboard.admin', compact('users', 'guarantees'));
    }
}
