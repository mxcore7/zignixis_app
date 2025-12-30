<?php

namespace App\Http\Controllers;

use App\Models\Realization;
use Illuminate\Http\Request;

class RealizationController extends Controller
{
    public function index()
    {
        $realizations = Realization::active()->ordered()->get();
        return view('pages.realizations', compact('realizations'));
    }
}
