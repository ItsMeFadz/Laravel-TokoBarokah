@extends('layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="py-3 mb-4">Tambah Supplier</h4>

            @include('component.sweetAlert')
            <div class="row">

                <div class="card">

                    <div class="card-body">
                        <form action="/supplier/store" enctype="multipart/form-data" method="post">
                            @csrf
                            @method('POST')
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Nama Supplier</label>
                                <input type="text" class="form-control" name="nama" value="{{ old('nama') }}" />
                                @error('nama')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-company">Alamat</label>
                                <input type="text" class="form-control" name="alamat" value="{{ old('alamat') }}" />
                                @error('alamat')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-company">Telepon</label>
                                <input type="number" class="form-control" name="telepon" value="{{ old('telepon') }}" />
                                @error('telepon')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
