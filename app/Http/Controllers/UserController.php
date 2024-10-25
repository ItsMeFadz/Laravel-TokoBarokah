<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\SettingModel;
use DataTables;
use ManagesCRUD;

class UserController extends Controller
{
    public function index()
    {
        $users = User::select(['id', 'name', 'email', 'role'])->orderBy('id', 'desc')->get();
        $settingItem = SettingModel::first();

        return view('pages.users.index', [
            'title' => 'Users',
            'active' => 'Users',
            'users' => $users, // Add this line to pass $users to the view
            'settingItem' => $settingItem, // Menambahkan settingItem ke dalam array
        ]);
    }


    public function data()
    {
        $users = User::select(['id', 'name', 'email', 'role'])->orderBy('id', 'desc')->get();

        return datatables()
            ->of($users)
            ->addIndexColumn()
            ->addColumn('aksi', function ($user) {
                return '
                    <div class="btn-group">
                        <button type="button" onclick="editForm(`' . route('users.update', $user->id) . '`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-pencil"></i></button>
                        <button type="button" onclick="deleteData(`' . route('users.destroy', $user->id) . '`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
                    </div>
                ';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt ($request->password);
        $user->role = $request->role;
        $user->save();

        return response()->json(['message' => 'Data berhasil disimpan']);
    }


    public function show($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }

    public function edit($id)
    {
        $settingItem = SettingModel::first();
        $user = User::find($id);
        $title = 'Edit User';
        $active = 'Users'; // Tambahkan ini sesuai dengan halaman yang sedang diakses
        return view('pages.users.edit', compact('user', 'title', 'active', 'settingItem'));
    }


    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'current_password' => 'required_with:new_password',
            'new_password' => 'nullable|string|min:8|confirmed',
            // 'role' => 'required|in:admin,owner,kasir',
            'salah_password' => 'required|in:0,1,2',
            'blokir' => 'required|in:0,1',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        // $user->role = $request->role;
        $user->salah_password = $request->salah_password;
        $user->blokir = $request->blokir;

        // Periksa apakah kata sandi baru disediakan
        if ($request->has('new_password') && $request->new_password != "") {
            // Validasi kata sandi saat ini
            if (!Hash::check($request->current_password, $user->password)) {
                return redirect()->back()->withErrors(['current_password' => 'Kata sandi lama tidak valid']);
            }

            // Tetapkan kata sandi baru
            $user->password = bcrypt($request->new_password);
        }

        $user->save();
        return redirect('/users')->with('success', 'Data User Berhasil Diperbarui.');
    }


    public function destroy(int $id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        $user->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}