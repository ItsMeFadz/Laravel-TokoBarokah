<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SatuanModel;
use App\Models\SettingModel;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

class SatuanController extends Controller
{
    public function index()
    {
        $satuan = SatuanModel::all();
        $settingItem = SettingModel::first();

        return view('pages.satuan.index', [
            'title' => 'Satuan',
            'active' => 'Satuan',
            'satuan' => $satuan,
            'settingItem' => $settingItem, // Menambahkan settingItem ke dalam array
        ]);
    }

    public function create()
    {
        $settingItem = SettingModel::first();
        return view('pages.satuan.create', [
            'title' => 'Tambah Satuan',
            'active' => 'Satuan',
            'settingItem' => $settingItem, // Menambahkan settingItem ke dalam array
        ]);
    }

    public function store(request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_satuan' => 'required|max:40',
        ], [
            'required' => 'Kolom :attribute harus diisi.',
            'max' => [
                'string' => 'Kolom :attribute tidak boleh lebih dari :max karakter.',
            ],
            'image' => 'Kolom :attribute harus berupa file gambar.',
            'mimes' => 'Kolom :attribute harus memiliki format: :values.',
            'integer' => 'Kolom :attribute harus berupa angka.',
            'numeric' => 'Kolom :attribute harus berupa angka.',
            'unique' => 'Nama budaya sudah ada. Harap pilih nama budaya yang lain.',
        ]);

        try {
            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            $validatedData = $validator->validated();

            SatuanModel::create($validatedData);

            return redirect('/satuan')->with('success', 'Data Satuan Berhasil Ditambahkan.');
        } catch (ValidationException $e) {
            if ($request->expectsJson()) {
                return response()->json(['errors' => $e->errors()], 422);
            }

            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            if ($request->expectsJson()) {
                return response()->json(['error' => 'Gagal menyimpan data. Silakan coba lagi.'], 500);
            }

            return redirect()->back()->with('error', 'Gagal menyimpan data. Silakan coba lagi.');
        }

    }


    public function edit($id)
    {
        $settingItem = SettingModel::first();
        return view('pages.satuan.edit', [
            'title' => 'Edit Satuan',
            'active' => 'Satuan',
            'satuan' => SatuanModel::findOrFail($id),
            'settingItem' => $settingItem, // Menambahkan settingItem ke dalam array
        ]);
    }

    public function update(Request $request, $id)
    {
        $satuan = SatuanModel::find($id);

        if (!$satuan) {
            return redirect('/satuan')->with('error', 'Data Satuan tidak ditemukan.');
        }

        $validator = Validator::make($request->all(), [
            'nama_satuan' => 'required|max:40',
        ], [
            'required' => 'Kolom :attribute harus diisi.',
            'max' => [
                'string' => 'Kolom :attribute tidak boleh lebih dari :max karakter.',
            ],
            'image' => 'Kolom :attribute harus berupa file gambar.',
            'mimes' => 'Kolom :attribute harus memiliki format: :values.',
            'integer' => 'Kolom :attribute harus berupa angka.',
            'numeric' => 'Kolom :attribute harus berupa angka.',
            'unique' => 'Nama budaya sudah ada. Harap pilih nama budaya yang lain.',
        ]);

        try {
            if ($validator->fails()) {
                throw new ValidationException($validator);
            }


            $validatedData = $validator->validated();

            $satuan->update($validatedData);

            return redirect('/satuan')->with('success', 'Data satuan Berhasil Diperbarui!');
        } catch (ValidationException $e) {
            if ($request->expectsJson()) {
                return response()->json(['errors' => $e->errors()], 422);
            }

            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            if ($request->expectsJson()) {
                return response()->json(['error' => 'Gagal menyimpan data. Silakan coba lagi.'], 500);
            }

            return redirect()->back()->with('error', 'Gagal menyimpan data. Silakan coba lagi.');
        }
    }



    public function destroy(int $id)
    {
        $satuan = SatuanModel::find($id);

        if (!$satuan) {
            return redirect()->back()->with('error', 'satuan tidak ditemukan.');
        }

        $satuan->delete();

        return redirect()->back()->with('success', 'satuan berhasil dihapus.');
    }


}
