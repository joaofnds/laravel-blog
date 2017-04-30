<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }


    public function index()
    {
        $settings = Setting::first();

        return view('admin.settings.settings')
            ->with('settings', $settings);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'site_name' => 'required',
            'contact_number' => 'required',
            'contact_email' => 'required|email',
            'address' => 'required'
        ]);

        $settings = Setting::first();

        $settings->site_name = $request->site_name;
        $settings->contact_number = $request->contact_number;
        $settings->contact_email = $request->contact_email;
        $settings->address = $request->address;

        $settings->save();

        return redirect()->route('home');
    }
}
