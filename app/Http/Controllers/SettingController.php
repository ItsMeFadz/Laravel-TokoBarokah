<?php

namespace App\Http\Controllers;

use App\Models\SettingModel;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $setting = SettingModel::all();

        return view('pages.setting.index', [
            'title' => 'Setting',
            'active' => 'Setting',
            'setting' => $setting,
        ]);
    }

    public function show()
    {
        return SettingModel::first();
    }

    public function update(Request $request)
    {
        $setting = SettingModel::first();
        $setting->nama_perusahaan = $request->nama_perusahaan;
        $setting->telepon = $request->telepon;
        $setting->alamat = $request->alamat;

        if ($request->hasFile('path_logo')) {
            $file = $request->file('path_logo');
            $nama = 'logo-' . date('YmdHis') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/img'), $nama);

            $setting->path_logo = "/img/$nama";
        }

        $setting->update(); // Gunakan save() untuk membuat atau memperbarui catatan

        return redirect()->back()->with('success', 'Data berhasil disimpan');
    }


}