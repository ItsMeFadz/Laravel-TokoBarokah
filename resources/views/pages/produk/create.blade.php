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
                                        <input type="text" class="form-control" name="nama_produk"
                                            value="{{ old('nama_produk') }}" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="multicol-username">Merk</label>
                                        <input type="text" class="form-control" name="merk"
                                            value="{{ old('merk') }}" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="defaultSelect" class="form-label">Satuan</label>
                                        <select class="form-select" name="id_satuan">
                                            <option selected disabledabled>-- Pilih satuan ---</option>
                                            @foreach ($satuan as $sat)
                                                <option value="{{ $sat->id_satuan }}"
                                                    {{ old('id_satuan') == $sat->id_satuan ? 'selected' : '' }}>
                                                    {{ $sat->nama_satuan }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="defaultSelect" class="form-label">Kategori</label>
                                        <select class="form-select" name="id_kategori">
                                            <option selected disabled>-- Pilih Kategori ---</option>
                                            @foreach ($kategori as $kat)
                                                <option value="{{ $kat->id_kategori }}"
                                                    {{ old('id_kategori') == $kat->id_kategori ? 'selected' : '' }}>
                                                    {{ $kat->nama_kategori }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Gambar Produk</label>
                                        <img id="preview-image" src="#" alt="Pratinjau Gambar Produk" width="100"
                                            style="display: none; margin-bottom: 10px;">
                                        <input class="form-control" type="file" id="formFile" name="gambar"
                                            value="{{ old('gambar') }}" onchange="previewImage(event)" />
                                    </div>
                                </div>

                                <!-- Kolom Kanan -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-company">Diskon</label>
                                        <input type="text" class="form-control" name="diskon"
                                            value="{{ old('diskon') }}" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-company">Harga Beli</label>
                                        <input type="text" class="form-control" name="harga_beli"
                                            value="{{ old('harga_beli') }}" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-company">Harga Jual</label>
                                        <input type="text" class="form-control" name="harga_jual"
                                            value="{{ old('harga_jual') }}" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-company">Stok</label>
                                        <input type="text" class="form-control" name="stok"
                                            value="{{ old('stok') }}" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-company">link</label>
                                        <input type="text" class="form-control" name="link"
                                            value="{{ old('link') }}" />
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
    <script>
        function previewImage(event) {
            const image = document.getElementById('preview-image');
            image.style.display = 'block'; // Menampilkan gambar ketika file dipilih
            image.src = URL.createObjectURL(event.target.files[0]);
            image.onload = () => {
                URL.revokeObjectURL(image.src); // Menghapus URL sementara untuk menghemat memori
            }
        }
    </script>
@endsection
