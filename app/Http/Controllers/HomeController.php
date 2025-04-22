<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Management;
use App\Models\Teacher;

class HomeController extends Controller
{
    // Display home page
    public function index()
    {
        $activities = Activity::all(); // For portfolio section
        $teachers = Teacher::all(); // For guru section
        $managements = Management::all(); // For struktur kepengurusan section
        
        return view('home', compact('activities', 'teachers', 'managements')); 
        // Replace 'home' with your actual main view name
    }

}
