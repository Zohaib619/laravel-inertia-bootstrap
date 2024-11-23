<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    function index(){
        return inertia('Website/index');
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
