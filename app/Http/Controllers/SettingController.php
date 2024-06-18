<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Kategori;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::first();
        if (!$settings) {
            // Handle the case where no settings are found, possibly return an empty view or create default settings.
            return view('admin.setting')->with('settings', new Setting());
        }

        return view('admin.setting', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'system_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'contact' => 'required|string|max:255',
            'about_us' => 'required|string',
        ]);

        // Retrieve the settings or create new settings if none exist
        $settings = Setting::firstOrNew();
        
        // Update the settings
        $settings->system_name = $request->input('system_name');
        $settings->email = $request->input('email');
        $settings->contact = $request->input('contact');
        $settings->about_us = $request->input('about_us');
        $settings->save();

        return redirect()->route('admin.setting')->with('success', 'Settings updated successfully');
    }

    public function aboutUs()
    {
        $settings = Setting::first();
        $categories = Kategori::all();
        return view('pelanggan.about_us', compact('settings', 'categories'));
    }
}
