@extends('layouts.main')
@section('content')
    @include('component.sweetAlert')
    <div class="content-wrapper">

        <div class="container-xxl flex-grow-1 container-p-y">

            <h4 class="fw-bold py-3 mb-2">
                <span class="text-muted fw-light">Dashboard / Produk /</span> {{ $title }}
            </h4>
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="/produk/store" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="row">
                                <!-- Kolom Kiri -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="multicol-username">Nama Produk</label>
                                        <input type="text" class="form-control" name="nama_produk" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="multicol-username">Merk</label>
                                        <input type="text" class="form-control" name="merk" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="defaultSelect" class="form-label">Satuan</label>
                                        <select class="form-select" name="id_satuan">
                                            <option selected disabledabled>-- Pilih satuan ---</option>
                                            @foreach ($satuan as $sat)
                                                <option value="{{ $sat->id_satuan }}">{{ $sat->nama_satuan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="defaultSelect" class="form-label">Kategori</label>
                                        <select class="form-select" name="id_kategori">
                                            <option selected disabledabled>-- Pilih Kategori ---</option>
                                            @foreach ($kategori as $kat)
                                                <option value="{{ $kat->id_kategori }}">{{ $kat->nama_kategori }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Kolom Kanan -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-company">Diskon</label>
                                        <input type="text" class="form-control" name="diskon" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-company">Harga Beli</label>
                                        <input type="text" class="form-control" name="harga_beli" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-company">Harga Jual</label>
                                        <input type="text" class="form-control" name="harga_jual" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-company">Stok</label>
                                        <input type="text" class="form-control" name="stok" />
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3 py-3">
                                <div class="col-sm-10">
                                    <a href="/produk" class="btn btn-warning me-2">Kembali</a>
                                    <button type="submit" class="btn btn-primary me-2 ">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
