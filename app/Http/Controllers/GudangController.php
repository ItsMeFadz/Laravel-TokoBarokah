<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\GudangModel;
use App\Models\SettingModel;

class GudangController extends Controller
{
    public function index()
    {
        $gudang = GudangModel::all(); // Ambil semua data dari model GudangModel
        $settingItem = SettingModel::first();
        return view('pages.gudang.index', [
            'title' => 'Gudang',
            'active' => 'Gudang',
            'gudang' => $gudang, // Kirim data GudangModel ke tampilan
            'settingItem' => $settingItem, // Menambahkan settingItem ke dalam array
        ]);
    }
    
    public function create()
    {
        $settingItem = SettingModel::first();
        return view('pages.gudang.create', [
            'title' => 'Tambah Gudang',
            'active' => 'Gudang',
            'settingItem' => $settingItem, // Menambahkan settingItem ke dalam array
        ]);
    }

    public function edit($id)
    {
        $settingItem = SettingModel::first();
        return view('pages.gudang.edit', [
            'title' => 'Edit Gudang',
            'active' => 'gudang',
            'gudang' => GudangModel::findOrFail($id),
            'settingItem' => $settingItem, // Menambahkan settingItem ke dalam array 
        ]);
    }

    public function update(Request $request, $id)
    {
        $gudang = GudangModel::find($id);

        if (!$gudang) {
            return redirect('/gudang')->with('error', 'Data gudang tidak ditemukan.');
        }

        $validator = Validator::make($request->all(), [
            'deskripsi' => 'required|max:40',
            'nominal' => 'required',
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

            $gudang->update($validatedData);

            return redirect('/gudang')->with('success', 'Data gudang Berhasil Diperbarui!');
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

    public function store(request $request)
    {
        $validator = Validator::make($request->all(), [
            'deskripsi' => 'required|max:40',
            'nominal' => 'required',
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

            GudangModel::create($validatedData);

            return redirect('/gudang')->with('success', 'Transaksi Gudang Berhasil Ditambahkan.');
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
        $gudang = GudangModel::find($id);

        if (!$gudang) {
            return redirect()->back()->with('error', 'gudang tidak ditemukan.');
        }

        $gudang->delete();

        return redirect()->back()->with('success', 'gudang berhasil dihapus.');
    }
}