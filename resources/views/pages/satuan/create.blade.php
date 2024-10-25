@extends('layouts.main')

@section('content')
    <div class="content-wrapper">
        @include('component.sweetAlert')
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="py-3 mb-4">Tambah Satuan</h4>
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <form action="/satuan/store" enctype="multipart/form-data" method="post">
                            @csrf
                            @method('POST')
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Nama Satuan</label>
                                <input type="text" class="form-control" name="nama_satuan"
                                    value="{{ old('nama_satuan') }}" />
                                @error('nama_satuan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <a href="/satuan" class="btn btn-warning me-2">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
