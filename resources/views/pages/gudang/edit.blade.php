@extends('layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="py-3 mb-4">Edit Transaksi</h4>

            @include('component.sweetAlert')
            <div class="row">

                <div class="card">

                    <div class="card-body">
                        <form action="/gudang/update/{{ $gudang->id_pengeluaran }}" enctype="multipart/form-data"
                            method="post">
                            @csrf
                            @method('POST')
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Deskripsi</label>
                                <input type="text" class="form-control" name="deskripsi"
                                    value="{{ $gudang->deskripsi }}" />
                                @error('deskripsi')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-company">Nominal</label>
                                <input type="text" class="form-control" name="nominal" value="{{ $gudang->nominal }}" />
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
