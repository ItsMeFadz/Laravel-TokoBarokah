<?php

namespace App\Http\Controllers;

use App\Models\SettingModel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $settingItem = SettingModel::first();
        return view('pages.dashboard', [
            'title' => 'Dashboard',
            'active' => 'Dashboard',
            'settingItem' => $settingItem, // Menambahkan settingItem ke dalam array
        ]);
    }

}
