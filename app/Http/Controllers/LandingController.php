<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        // $settingItem = SettingModel::first();
        return view('landing.landing', [
            'title' => 'Landing',
        ]);
    }
}
