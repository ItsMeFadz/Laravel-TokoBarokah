<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriModel;
use App\Models\SettingModel;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = KategoriModel::all();
        $settingItem = SettingModel::first();
        
        return view('pages.kategori.index', [
            'title' => 'Kategori',
            'active' => 'Kategori',
            'kategori' => $kategori,
            'settingItem' => $settingItem, // Menambahkan settingItem ke dalam array
        ]);
    }
    
    public function create()
    {
        $settingItem = SettingModel::first();
        return view('pages.kategori.create', [
            'title' => 'Tambah Kategori',
            'active' => 'kategori',
            'settingItem' => $settingItem, // Menambahkan settingItem ke dalam array
        ]);
    }

    public function store(request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_kategori' => 'required|max:40',
            'keterangan' => 'required',
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

            KategoriModel::create($validatedData);

            return redirect('/kategori')->with('success', 'Data kategori Berhasil Ditambahkan.');
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
        return view('pages.kategori.edit', [
            'title' => 'Edit Kategori',
            'active' => 'kategori',
            'kategori' => KategoriModel::findOrFail($id),
            'settingItem' => $settingItem, // Menambahkan settingItem ke dalam array
        ]);
    }

    public function update(Request $request, $id)
    {
        $kategori = KategoriModel::find($id);

        if (!$kategori) {
            return redirect('/kategori')->with('error', 'Data kategori tidak ditemukan.');
        }

        $validator = Validator::make($request->all(), [
            'nama_kategori' => 'required|max:40',
            'keterangan' => 'required',
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

            $kategori->update($validatedData);

            return redirect('/kategori')->with('success', 'Data kategori Berhasil Diperbarui!');
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
        $kategori = KategoriModel::find($id);

        if (!$kategori) {
            return redirect()->back()->with('error', 'kategori tidak ditemukan.');
        }

        $kategori->delete();

        return redirect()->back()->with('success', 'kategori berhasil dihapus.');
    }


}