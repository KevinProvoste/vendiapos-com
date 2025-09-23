<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $stores = [];
        if (Auth::check()) {
            $stores = Store::all();
        }

        return view('dashboard', ['stores' => $stores]);
    }
}
