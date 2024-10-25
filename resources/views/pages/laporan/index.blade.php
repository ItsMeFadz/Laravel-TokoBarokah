@extends('layouts.main')
@php
    $active = 'Laporan';
@endphp

@section('title')
    Laporan Pendapatan {{ tanggal_indonesia($tanggalAwal, false) }} s/d {{ tanggal_indonesia($tanggalAkhir, false) }}
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-2">
                <span class="text-muted fw-light">Dashboard /</span> Laporan
            </h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="add-button-container">
                                    {{-- <button onclick="updatePeriode()" type="button"
                                        class="btn btn-primary add-button btn-sm datepicker" data-bs-toggle="modal"
                                        data-bs-target="#modal-form">
                                        <span class="tf-icons bx bxs-calendar-edit"></span>&nbsp; Ubah Periode
                                    </button>
                                    <button type="button" class="btn btn-primary add-button btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#exportPdfModal">
                                        <span class="tf-icons bx bxs-file-archive"></span>&nbsp; Export PDF
                                    </button> --}}
                                    <h4>Laporan</h4>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive text-nowrap">
                            <table id="userTable" class="table table-striped">
                                <thead class="table-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Detail Penjualan</th>
                                        <th>Penjualan</th>
                                        <th>Detail Pengeluaran</th>
                                        <th>Pengeluaran</th>
                                        <th>Pendapatan</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <?php $i = 1; ?>
                                    @if ($data)
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{ $item['DT_RowIndex'] }}</td>
                                                <td>{{ $item['tanggal'] }}</td>
                                                <td>{!! nl2br($item['detail_penjualan']) !!}</td>
                                                <td>{{ $item['transaksi'] }}</td>
                                                <td>{!! nl2br($item['detail_pengeluaran']) !!}</td>
                                                <td>{{ $item['gudang'] }}</td>
                                                <td>{{ $item['pendapatan'] }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="8">Data tidak tersedia.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Detail -->
    <div class="modal fade" id="largeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3">Detail Laporan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="createUserForm">
                    @csrf
                    <div class="modal-body">
                        <h6 class="fw-bold py-3 mb-2">
                            <span class="text-muted small fw-light"></span> Penjualan
                        </h6>
                        <div class="table-responsive text-nowrap">
                            <table id="userTable" class="table table-striped">
                                <thead class="table-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Detail</th>
                                </thead>
                                {{-- <tbody class="table-border-bottom-0">
                                    <?php $i = 1; ?>
                                    @if ($data)
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $item['tanggal'] }}</td>
                                                <td>
                                                    <?php
                                                    if ($item['detail_penjualan']) {
                                                        $detailPenjualan = rtrim($item['detail_penjualan'], ',');
                                                        echo $detailPenjualan;
                                                    } else {
                                                        echo '';
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="8">Data tidak tersedia.</td>
                                        </tr>
                                    @endif
                                </tbody> --}}
                            </table>
                        </div>
                        <h6 class="fw-bold py-3 mb-2">
                            <span class="text-muted small fw-light"></span> Pengeluaran
                        </h6>
                        <div class="table-responsive text-nowrap">
                            <table id="userTable" class="table table-striped">
                                <thead class="table-light">
                                    <tr>
                                        <th>no</th>
                                        <th>Deskripsi</th>
                                        <th>Nominal</th>
                                </thead>
                                {{-- <tbody class="table-border-bottom-0">
                                    <?php $i = 1; ?>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $item['detail_pengeluaran'] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody> --}}
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary add-button "
                                data-bs-dismiss="modal">Kembali</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Export PDF Modal -->
    <div class="modal
        fade" id="exportPdfModal" tabindex="-1" aria-labelledby="exportPdfModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exportPdfModalLabel">Export
                        PDF Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to export the PDF?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                    <a href="{{ route('laporan.export_pdf', ['awal' => $tanggalAwal, 'akhir' => $tanggalAkhir]) }}"
                        class="btn btn-primary">Export PDF</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Periode Laporan Modal -->
    <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="form-periode" method="POST" action="{{ route('laporan.update_periode') }}">
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class=" mb-3">
                                    <label for="tanggal_awal" class="form-label text-end">Tanggal
                                        Awal</label>
                                    <input type="date" name="tanggal_awal" id="startDate" class="form-control datepicker"
                                        required autofocus value="{{ request('tanggal_awal') }}"
                                        style="border-radius: 0 !important;" placeholder="">
                                </div>
                            </div>
                            <div class="row">
                                <div class=" mb-3">
                                    <label for="tanggal_akhir" class="form-label text-end">Tanggal
                                        Akhir</label>
                                    <input type="date" name="tanggal_akhir" id="endDate" class="form-control"
                                        class="form-control datepicker" required
                                        value="{{ request('tanggal_akhir') ?? date('Y-m-d') }}"
                                        style="border-radius: 0 !important;" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-save"></i>
                            Simpan</button>
                        <button type="button" class="btn btn-sm btn-flat btn-warning" data-dismiss="modal"><i
                                class="fa fa-arrow-circle-left"></i> Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    @if (!isset($tanggalAwal))
        @php
            $tanggalAwal = date('Y-m-d', mktime(0, 0, 0, date('m'), 1, date('Y')));
        @endphp
    @endif
    @includeIf('laporan.form')
@endsection

@push('scripts')
    <script src="{{ asset('template/assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="public/js/bootstrap-datepicker.min.js"></script>
    <script>
        $('.datepicker').datepicker();

        function updatePeriode(request) {
            $.ajax({
                url: '{{ route('laporan.update_periode') }}',
                type: 'POST',
                data: request,
                success: function(response) {
                    if (response.success) {
                        // handle successful update, e.g., update data table
                        console.log("Periode berhasil diperbarui ;" + response);
                        // ... reload data table here ...
                    } else {
                        console.error(response.message);
                        // display error message to the user
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error updating periode:", error);
                    // display error message to the user
                }
            });
        }


        // Inisialisasi Datepicker untuk tanggal awal dan tanggal akhir
        var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
        $('#startDate')
            .datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                startDate: today,
                endDate: $('#endDate').val() // Atur tanggal akhir yang tersedia saat ini
            });
        $('#endDate').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            startDate: today, // Pastikan tanggal awal yang tersedia saat ini
            endDate: new Date() // Atur batas maksimal menjadi hari ini
        });

        // Event click untuk membuka modal detail penjualan
        $('body').on('click', '.detail-pengeluaran', function() {
            var detailPengeluaran = $(this).data('detail');
            var tableBody = $('#detailPengeluaranTableBody');
            tableBody.empty();
            detailPengeluaran.forEach(function(item) {
                tableBody.append(`<tr><td>${item.deskripsi}</td><td>${item.nominal}</td></tr>`);
            });
            $('#pengeluaranModal').modal('show');
        });


        // Event click untuk membuka modal detail pengeluaran
        $('body').on('click', '.detail-pengeluaran', function() {
            var detailPengeluaran = $(this).data('detail');
            var tableBody = $('#detailPengeluaranTableBody');
            tableBody.empty();
            detailPengeluaran.forEach(function(item) {
                tableBody.append(`<tr><td>${item.deskripsi}</td><td>${item.nominal}</td></tr>`);
            });
            $('#pengeluaranModal').modal('show');
        });
    </script>
@endpush
