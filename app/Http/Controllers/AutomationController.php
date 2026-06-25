<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AutomationController extends Controller
{
    /**
     * Display the Technical VA Automation dashboard.
     */
    public function index()
    {
        return view('automation.index');
    }

    /**
     * Process the uploaded e-commerce catalog via background queues.
     */
    public function uploadCatalog(Request $request)
    {
        $request->validate([
            'catalog_file' => 'required|mimes:csv,txt|max:2048'
        ]);

        // Simulating Laravel Queue processing for heavy data
        dispatch(function () {
            Log::info("Technical VA: Automated catalog background processing started...");
        });

        return redirect()->back()->with('success', 'Automation triggered successfully! Processing catalog in the background.');
    }
}
