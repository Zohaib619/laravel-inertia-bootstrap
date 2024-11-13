<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class WebsiteController extends Controller
{
    function index(){
        return Inertia::render('Website/index', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => "12",
            'phpVersion' => PHP_VERSION,
        ]);
    }
    function about(){
        return inertia("Website/about");
    }
    function blogs(){
        return inertia("Website/blogs");
    }
    function contact(){
        return inertia("Website/contact");
    }
}
