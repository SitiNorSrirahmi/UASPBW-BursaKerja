<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::where('user_id', auth()->id())->get();
        return view('appllications.index', compact('applications'));
    }
}
