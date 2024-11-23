<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingRequest;
use App\Models\Setting;

class SettingController extends Controller
{
    function index(){
        $setting = Setting::first();
        return inertia("Setting/index", 
        compact("setting"));
    }

    function update(SettingRequest $request){
        $setting = Setting::first();
        if(!$setting){
            $setting = new Setting();
        }
        $setting->title = ucfirst($request->title);
        $setting->description = $request->description;
        $setting->save();

    }
}
