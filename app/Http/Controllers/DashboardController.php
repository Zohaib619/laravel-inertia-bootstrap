<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index(){
        $user = User::count();
        return inertia("Dashboard/index",
    compact("user"));

    }

}
