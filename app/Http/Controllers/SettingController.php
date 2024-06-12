<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::first();
        return view('admin.settings', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'system_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'contact' => 'required|string|max:255',
            'about_us' => 'required|string',
        ]);

        $settings = Setting::first();
        $settings->system_name = $request->input('system_name');
        $settings->email = $request->input('email');
        $settings->contact = $request->input('contact');
        $settings->about_us = $request->input('about_us');
        $settings->save();

        return redirect()->route('admin.settings')->with('success', 'Settings updated successfully');
    }
}
