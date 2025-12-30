<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $teamMembers = \App\Models\TeamMember::orderBy('order')->get();
        return view('pages.about', compact('teamMembers'));
    }
}
