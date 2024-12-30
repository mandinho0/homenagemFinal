<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Exibir o dashboard.
     */
    public function index()
    {
        $plans = Plan::where('user_id', auth()->id())->get();
        return view('dashboard', compact('plans'));
    }
}
