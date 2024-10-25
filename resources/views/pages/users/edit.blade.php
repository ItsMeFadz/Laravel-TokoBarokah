@extends('layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="py-3 mb-4">Edit Pengguna</h4>

            @include('component.sweetAlert')
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('users.update', ['id' => $user->id]) }}" method="post">
                            @csrf
                            @method('PUT')
                            {{-- <div class="col mb-3">
                                <label for="roleLarge" class="form-label">Role</label>
                                <select name="role" id="roleLarge" class="form-select">
                                    <option>--Role--</option>
                                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="owner" {{ $user->role == 'owner' ? 'selected' : '' }}>Owner</option>
                                    <option value="kasir" {{ $user->role == 'kasir' ? 'selected' : '' }}>Kasir</option>
                                </select>
                            </div> --}}
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Nama</label>
                                <input type="text" class="form-control" name="name" value="{{ $user->name }}" />
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-company">Email</label>
                                <input type="text" class="form-control" name="email" value="{{ $user->email }}" />
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col mb-3">
                                <label for="roleLarge" class="form-label">Gagal Login</label>
                                <select name="salah_password" id="roleLarge" class="form-select">
                                    <option value="0" {{ $user->salah_password == '0' ? 'selected' : '' }}>0</option>
                                    <option value="1" {{ $user->salah_password == '1' ? 'selected' : '' }}>1</option>
                                    <option value="2" {{ $user->salah_password == '2' ? 'selected' : '' }}>2</option>
                                </select>
                            </div>
                            <div class="col mb-3">
                                <label for="roleLarge" class="form-label">Keterangan Akun</label>
                                <select name="blokir" id="roleLarge" class="form-select">
                                    <option value="0" {{ $user->blokir == '0' ? 'selected' : '' }}>Masih Berfungsi
                                    </option>
                                    <option value="1" {{ $user->blokir == '1' ? 'selected' : '' }}>Terblokir</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-company">Kata Sandi Lama</label>
                                <input type="password" class="form-control" name="current_password" value="" />
                                @error('current_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-company">Kata Sandi Baru</label>
                                <input type="password" class="form-control" name="new_password" value="" />
                                @error('new_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-company">Konfirmasi Kata Sandi Baru</label>
                                <input type="password" class="form-control" name="new_password_confirmation"
                                    value="" />
                                @error('new_password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <a href="/users" class="btn btn-warning me-2">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
