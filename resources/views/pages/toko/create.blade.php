@extends('layouts.main')
@section('content')
    @include('component.sweetAlert')

    <style>
        .tampil-bayar {
            font-size: 5em;
            text-align: center;
            height: 100px;
        }

        .tampil-terbilang {
            padding: 10px;
            background: #f0f0f0;
        }

        .table-penjualan tbody tr:last-child {
            display: none;
        }

        @media(max-width: 768px) {
            .tampil-bayar {
                font-size: 3em;
                height: 70px;
                padding-top: 5px;
            }
        }
    </style>

    <div class="content-wrapper">

        <div class="container-xxl flex-grow-1 container-p-y">

            <h4 class="fw-bold py-3 mb-2">
                <span class="text-muted fw-light">Dashboard / Produk /</span> {{ $title }}
            </h4>
            <div class="col-xxl">
                <div class="card mb-4">

                    <div class="card-body">
                        <form class="form-produk">
                            <div class="add-button-container">
                                <div class="form-group row">
                                    <label for="id_produk" class="form-label">Pilih Produk:</label>

                                    <div class="input-group">
                                        <input type="text" class="form-control"
                                            placeholder="klik tombol untuk menambahkan produk"
                                            aria-label="klik tombol untuk menambahkan produk"
                                            aria-describedby="button-addon2" />
                                        <button class="btn btn-outline-primary" type="button" data-bs-toggle="modal"
                                            data-bs-target="#produkList">
                                            <i class='bx bxs-right-arrow-circle'></i>
                                        </button>

                                    </div>
                                </div>
                                <a href="/transaksi" class="btn btn-primary add-button">
                                    <span class="tf-icons bx bx-left-arrow-circle"></span>&nbsp;Kembali
                                </a>
                            </div>
                        </form>

                        <br>
                        <div class="table-responsive text-nowrap">
                            <table id="userTable" class="table table-striped">
                                <thead class="table-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Produk</th>
                                        <th>Kategori</th>
                                        <th>Harga Jual</th>
                                        <th>QTY</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                </tbody>
                            </table>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-lg-8">
                                <div class="tampil-bayar bg-primary text-white"></div>
                                <div class="tampil-terbilang"></div>
                            </div>
                            <div class="col-lg-4">
                                @csrf
                                <div class="mb-3">
                                    <label for="totalrp" class="col-lg-6 control-label">Total</label>
                                    <div class="col-lg-12">
                                        <input type="text" id="totalrp" name="total_harga" class="form-control"
                                            readonly disabled>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="diskon" class="col-lg-6 control-label">Diskon</label>
                                    <div class="col-lg-12">
                                        <input type="text" name="diskon" id="diskon" class="form-control">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="bayar" class="col-lg-6 control-label">Bayar</label>
                                    <div class="col-lg-12">
                                        <input type="text" id="bayarrp" name="bayar" class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="diterima" class="col-lg-6 control-label">Diterima</label>
                                    <div class="col-lg-12">
                                        <input type="text" id="diterima" class="form-control" name="diterima">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="kembali" class="col-lg-6 control-label ">Kembali</label>
                                    <div class="col-lg-12">
                                        <input type="text" id="kembali" name="kembali" class="form-control" disabled>
                                    </div>
                                </div>

                                <div class="box-footer">
                                    <button type="button" class="btn btn-primary btn-sm btn-flat pull-right btn-simpan"
                                        onclick="simpanTransaksi()">
                                        <i class="fa fa-floppy-o"></i> Simpan Transaksi
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    {{-- Modal Produk --}}
    <div class="modal fade" id="produkList" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel4">Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped table-bordered table-produk">
                        <thead>
                            <th width="5%">No</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Harga Jual</th>
                            <th>
                                <i class='bx bxs-cog'></i>
                            </th>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($produk as $item)
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td>{{ $item->nama_produk }}</td>
                                    <td>{{ $item->kategori->nama_kategori }}</td>
                                    <td>{{ $item->harga_jual }}</td>
                                    <td>
                                        <a type="button" class="btn btn-primary btn-sm text-white"
                                            onclick="pilihProduk('{{ $item->id_produk }}', '{{ $item->nama_produk }}', '{{ $item->harga_jual }}', '{{ $item->kategori->nama_kategori }}')">
                                            <i class="fa fa-check-circle"></i>
                                            Pilih
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- End Modal Produk --}}

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Menangani perubahan pada input diskon
            document.getElementById('diskon').addEventListener('input', function() {
                // formatRupiahInput(this);
                calculateTotals();
            });

            // Menangani perubahan pada input diterima
            document.getElementById('diterima').addEventListener('input', function() {
                // formatRupiahInput(this);
                calculateTotals();
            });

            // Menangani klik pada tombol simpan
            document.querySelector('.btn-simpan').addEventListener('click', function() {
                console.log('Simpan button clicked');

                if (!this.classList.contains('clicked')) {
                    this.classList.add('clicked'); // Tandai tombol sebagai sudah diklik
                    simpanTransaksi();
                }
            });

        });

        function pilihProduk(id, nama, harga, kategori) {
            var newRow = document.createElement("tr");

            newRow.innerHTML = `
                <td></td>
                <td>${nama}</td>
                <td>${kategori}</td>
                <td>${harga}</td>
                <td><input type="number" class="form-control qty-input" value="1" min="1" onchange="updateQty()"></td>
                <td><button type="button" class="btn btn-danger btn-sm" onclick="hapusProduk(this)">X</button></td>
            `;

            document.getElementById('userTable').getElementsByTagName('tbody')[0].appendChild(newRow);

            updateNomorUrut();
            calculateTotals();

            // Mengubah format data dan menambahkannya ke dalam variabel details
            details.push({
                'id_produk': nama, // Menggunakan nama produk sebagai id_produk
                'harga': harga,
                'qty': 1,
                'kategori': kategori // Menyimpan informasi kategori
            });

            $('#produkList').modal('hide');
        }




        function updateNomorUrut() {
            var rows = document.getElementById('userTable').getElementsByTagName('tbody')[0].getElementsByTagName('tr');

            for (var i = 0; i < rows.length; i++) {
                rows[i].getElementsByTagName('td')[0].innerText = i + 1;
            }
        }

        function updateQty(input) {
            calculateTotals();
        }

        document.getElementById('diskon').addEventListener('input', function() {
            calculateTotals();
        });

        document.getElementById('diterima').addEventListener('input', function() {
            calculateTotals();
        });


        function hapusProduk(button) {
            // console.log('hapusProduk function called');
            var row = button.parentNode.parentNode;
            // console.log('Row to be removed:', row);
            row.parentNode.removeChild(row);
            updateNomorUrut();
            calculateTotals();
        }


        function calculateTotals() {
            var rows = document.getElementById('userTable').getElementsByTagName('tbody')[0].getElementsByTagName('tr');
            var total = 0;

            for (var i = 0; i < rows.length; i++) {
                var cells = rows[i].getElementsByTagName('td');
                var qty = parseInt(cells[4].getElementsByTagName('input')[0].value); // Merujuk ke kolom QTY
                var harga = parseFloat(cells[3].innerText.replace(/[^\d.-]/g, ''));
                total += qty * harga;
            }

            var diskonInput = document.getElementById('diskon').value;
            var bayarInput = document.getElementById('diterima').value;

            // Hilangkan karakter non-digit dari input dan konversi ke angka desimal
            var diskon = parseFloat(diskonInput.replace(/[^\d.-]/g, '')) || 0;
            var bayar = parseFloat(bayarInput.replace(/[^\d.-]/g, '')) || 0;

            var totalBayar = total - diskon;
            var kembali = bayar - totalBayar;

            // Set default value to 0 if calculation results in NaN
            totalBayar = isNaN(totalBayar) ? 0 : totalBayar;
            kembali = isNaN(kembali) ? 0 : kembali;

            document.getElementById('totalrp').value = total;
            document.getElementById('bayarrp').value = totalBayar;
            document.getElementById('kembali').value = kembali;

            document.querySelector('.tampil-bayar').innerText = 'Total: Rp ' + formatRupiah(totalBayar.toFixed(0));
            document.querySelector('.tampil-terbilang').innerText = 'Terbilang: ' + terbilang(totalBayar.toFixed(0)) +
                ' Rupiah';
        }


        function formatRupiah(input) {
            let value = input.replace(/[^\d.-]/g, '') || 0;

            if (value !== "") {
                // Pisahkan nilai dan desimal
                const parts = value.split('.');
                const intValue = parseInt(parts[0], 10).toLocaleString("id-ID");

                // Gabungkan kembali dengan nilai desimal jika ada
                value = parts.length > 1 ? intValue + "." + parts[1] : intValue;

                return value;
            } else {
                return "";
            }
        }

        function formatRupiahInput(input) {
            input.value = formatRupiah(input.value);
        }

        // Helper function to parse currency values
        function parseCurrencyValue(selector) {
            return parseFloat($(selector).val().replace(/[^\d.-]/g, '')) || 0;
        }


        function terbilang(n) {
            var bilangan = [
                '', 'Satu', 'Dua', 'Tiga', 'Empat', 'Lima', 'Enam', 'Tujuh', 'Delapan', 'Sembilan'
            ];

            var satuan = ['', ' Ribu', ' Juta', ' Miliar', 'Triliun'];
            var hasil = '';

            for (var i = 0; i < satuan.length; i++) {
                var ratusan = n % 1000;
                n = Math.floor(n / 1000);

                if (ratusan !== 0) {
                    var hasilRatusan = '';

                    if (ratusan >= 100) {
                        hasilRatusan += bilangan[Math.floor(ratusan / 100)] + ' Ratus ';
                        ratusan %= 100;
                    }

                    if (ratusan >= 10 && ratusan <= 19) {
                        hasilRatusan += bilangan[ratusan - 10] + ' Belas ';
                    } else if (ratusan >= 20 || ratusan <= 9) {
                        hasilRatusan += bilangan[Math.floor(ratusan / 10)] + ' Puluh ';
                        ratusan %= 10;
                    }

                    if (ratusan > 0) {
                        hasilRatusan += bilangan[ratusan];
                    }

                    hasil = hasilRatusan + satuan[i] + ' ' + hasil;
                }
            }

            return hasil.trim();
        }

        var details = []; // Deklarasi variabel details di luar fungsi

        // simpan
        function simpanTransaksi() {
            // Cegah klik ganda
            if ($(".btn-simpan").prop("disabled")) {
                return;
            }

            // Nonaktifkan tombol sebelum melakukan permintaan AJAX
            $(".btn-simpan").prop("disabled", true);

            var total_harga = parseCurrencyValue("#totalrp");
            var diskon = parseCurrencyValue("#diskon");
            var diterima = parseCurrencyValue("#diterima");
            var bayar = parseCurrencyValue("#bayarrp");
            var kembali = parseCurrencyValue("#kembali");

            // Menggunakan variabel details yang dideklarasikan di luar fungsi
            var data = {
                'total_harga': total_harga,
                'diskon': diskon,
                'bayar': bayar,
                'diterima': diterima,
                'kembali': kembali,
                'details': details // Menggunakan variabel details
            };

            $.ajax({
                type: 'POST',
                url: '/transaksi/store',
                contentType: 'application/json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: JSON.stringify(data),
                success: function(response) {
                    console.log(response.message);

                    // Show success alert
                    showAlert('success', 'Success!', 'Transaksi berhasil disimpan!');

                    // Reset form or perform other actions after success
                    $("#userTable tbody").empty();
                    $("#totalrp, #diskon, #diterima, #bayarrp, #diterima, #kembali").val('');
                    document.querySelector('.tampil-bayar').innerText = '';
                    document.querySelector('.tampil-terbilang').innerText = '';

                    updateStokProduk(); // Menggunakan variabel details
                    // window.location.href = '/transaksi';
                },
                error: function(xhr) {
                    console.error('Error:', xhr.responseText);

                    // Show error alert
                    showAlert('error', 'Error!', 'Transaksi gagal disimpan. Silakan coba lagi.');
                },
                complete: function() {
                    // Enable the button after the request is complete, regardless of success or failure
                    $(".btn-simpan").prop("disabled", false);
                }
            });
        }

        // Helper function to show SweetAlert2 alerts
        function showAlert(icon, title, text) {
            Swal.fire({
                icon: icon,
                title: title,
                text: text,
                showConfirmButton: true
            });
        }

        function updateStokProduk() {
            $.ajax({
                type: 'POST',
                url: '/produk/update-stok',
                contentType: 'application/json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: JSON.stringify({
                    'details': details
                }),
                success: function(response) {
                    console.log('Stok produk berhasil diperbarui.');
                },
                error: function(xhr) {
                    console.error('Error updating product stock:', xhr.responseText);
                }
            });
        }
    </script>
@endsection
