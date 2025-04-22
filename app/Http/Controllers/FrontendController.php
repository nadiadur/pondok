<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity; // Add this import at the top

class FrontendController extends Controller
{
    // Your other methods...
    
    public function portfolio()
    {
        $activities = Activity::all();
        return view('portfolio', compact('activities'));

    }
}