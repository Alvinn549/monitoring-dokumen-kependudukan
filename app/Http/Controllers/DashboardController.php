<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KartuMonitoring;

class DashboardController extends Controller
{
    public function index()
    {
        $totalKartuMonitoring = KartuMonitoring::count();
        return view('dashboard.index', compact('totalKartuMonitoring'));
    }
}
