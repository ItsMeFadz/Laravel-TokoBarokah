@extends('layouts.main')
@section('content')
    @include('component.sweetAlert')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-2">
                <span class="text-muted fw-light">Dashboard /</span> {{ $title }}
            </h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="add-button-container">
                                <h4>Data Transaksi</h4>
                                <a href="{{ route('transaksi.create') }}" class="btn btn-primary add-button btn-sm">
                                    <span class="tf-icons bx bx-plus-circle"></span>&nbsp;Transaksi Baru
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive text-nowrap">
                            <table id="userTable" class="table table-striped">
                                <thead class="table-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Jumlah Item</th>
                                        <th>Total Harga</th>
                                        <th>Diskon</th>
                                        <th>Bayar</th>
                                        <th>Diterima</th>
                                        <th>Kembali</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <?php $i = 1; ?>
                                    @foreach ($transaksi as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->jumlah_item }} Item</td>
                                            <td>Rp. {{ number_format($item->total_harga, 0, ',', ',') }}</td>
                                            <td>Rp. {{ number_format($item->diskon, 0, ',', ',') }}</td>
                                            <td>Rp. {{ number_format($item->bayar, 0, ',', ',') }}</td>
                                            <td>Rp. {{ number_format($item->diterima, 0, ',', ',') }}</td>
                                            <td>Rp. {{ number_format($item->kembali, 0, ',', ',') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
