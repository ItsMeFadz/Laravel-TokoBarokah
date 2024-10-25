@extends('layouts.main')
@section('content')
    <div class="content-wrapper">
        @include('component.sweetAlert')
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="py-3 mb-4">Transaksi Gudang</h4>
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <form action="/gudang/store" enctype="multipart/form-data" method="post">
                            @csrf
                            @method('POST')
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Deskripsi</label>
                                <input type="text" class="form-control" name="deskripsi"
                                    value="{{ old('deskripsi') }}" />
                                @error('deskripsi')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-company">Nominal</label>
                                <input type="text" class="form-control" name="nominal" value="{{ old('nominal') }}" />
                                @error('nominal')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <a href="/gudang" class="btn btn-warning me-2">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
