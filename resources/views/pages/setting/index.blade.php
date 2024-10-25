@extends('layouts.main')
@section('content')
    @include('component.sweetAlert')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="add-button-container">
                            <h4>Setting Perusahaan</h4>
                        </div>
                    </div>
                    <form action="{{ route('setting.update') }}" method="post" class="form-setting" data-toggle="validator"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            @foreach ($setting as $settingItem)
                                <div class="form-group row mb-4">
                                    <label for="nama_perusahaan" class="col-lg-2 control-label text-end">Nama
                                        Perusahaan</label>
                                    <div class="col-lg-6">
                                        <input type="text" value="{{ $settingItem->nama_perusahaan }}"
                                            name="nama_perusahaan" class="form-control" id="nama_perusahaan" required
                                            autofocus>
                                        <span class="help-block with-errors"></span>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="telepon" class="col-lg-2 control-label text-end">Telepon</label>
                                    <div class="col-lg-6">
                                        <input type="text" value="{{ $settingItem->telepon }}" name="telepon"
                                            class="form-control" id="telepon" required>
                                        <span class="help-block with-errors"></span>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="alamat" class="col-lg-2 control-label text-end">Alamat</label>
                                    <div class="col-lg-6">
                                        <textarea name="alamat" class="form-control" id="alamat" rows="3" required>{{ $settingItem->alamat }}</textarea>
                                        <span class="help-block with-errors"></span>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="path_logo" class="col-lg-2 control-label text-end">Logo Perusahaan</label>
                                    <div class="col-lg-3">
                                        <input type="file" name="path_logo" class="form-control" id="path_logo"
                                            onchange="preview('.tampil-logo', this.files[0])">
                                        <span class="help-block with-errors"></span>
                                        <br>
                                        <div class="tampil-logo">
                                            <img src="{{ url('/') }}{{ $settingItem->path_logo }}" width="200">
                                        </div>
                                    </div>
                                </div>
                                <!-- Tambahkan bidang dan elemen formulir lainnya di sini -->
                            @endforeach
                        </div>
                        <div class="form-group row mb-3">
                            <div class="col-lg-6 offset-lg-2">
                                <button type="submit" class="btn btn-primary me-2 float-end ">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script>
        $(function() {
            showData();

            $('.form-setting').validator().on('submit', function(e) {
                if (!e.preventDefault()) {
                    $.ajax({
                            url: $('.form-setting').attr('action'),
                            type: $('.form-setting').attr('method'),
                            data: new FormData($('.form-setting')[0]),
                            async: false,
                            processData: false,
                            contentType: false
                        })
                        .done(response => {
                            showData();
                            $('.alert').fadeIn();

                            setTimeout(() => {
                                $('.alert').fadeOut();
                            }, 3000);
                        })
                        .fail(errors => {
                            alert('Tidak dapat menyimpan data');
                            return;
                        });
                }
            });
        });

        function showData() {
            $.get('{{ route('setting.show') }}')
                .done(response => {
                    $('[name=nama_perusahaan]').val(response.nama_perusahaan);
                    $('[name=telepon]').val(response.telepon);
                    $('[name=alamat]').val(response.alamat);
                    $('title').text(response.nama_perusahaan + ' | Pengaturan');

                    let words = response.nama_perusahaan.split(' ');
                    let word = '';
                    words.forEach(w => {
                        word += w.charAt(0);
                    });
                    $('.logo-mini').text(word);
                    $('.logo-lg').text(response.nama_perusahaan);

                    $('.tampil-logo').html(`<img src="{{ url('/') }}${response.path_logo}" width="200">`);
                    $('[rel=icon]').attr('href', `{{ url('/') }}/${response.path_logo}`);
                })
                .fail(errors => {
                    alert('Tidak dapat menampilkan data');
                    return;
                });
        }
    </script>
@endpush
