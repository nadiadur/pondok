<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Registration;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'teacherCount'      => Teacher::count(),
            'studentCount'      => Student::count(),
            'registrationCount' => Registration::where('status', 'pending')->count(),
        ];
        
        return view('admin.dashboard', $data);
    }
}
