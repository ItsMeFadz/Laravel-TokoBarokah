@extends('layouts.main')
@section('content')
    @include('component.sweetAlert')
    {{-- @if (isset($title))
        <h3>{{ $title }}</h3>
    @endif --}}
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-2">
                <span class="text-muted fw-light">Dashboard /</span> Users
            </h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="add-button-container">
                                <button type="button" class="btn btn-primary add-button btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#largeModal">
                                    <span class="tf-icons bx bx-plus-circle"></span>&nbsp;Tambah
                                </button>
                            </div>
                        </div>
                        <div class="table-responsive text-nowrap">
                            <table id="userTable" class="table table-striped">
                                <thead class="table-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Role</th>
                                        <th>Nama Lengkap</th>
                                        <th>Email</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <?php $i = 1; ?>
                                    @foreach ($users as $item)
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td>{{ $item->role }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                        data-bs-toggle="dropdown">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a href="{{ route('users.edit', ['user' => $item->id]) }}"
                                                            class="dropdown-item">
                                                            <i class="bx bx-edit-alt me-1"></i> Edit
                                                        </a>
                                                        <form id="deleteForm{{ $item->id }}"
                                                            action="/users/delete/{{ $item->id }}" method="POST"
                                                            class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a class="dropdown-item"
                                                                onclick="confirmDelete({{ $item->id }})">
                                                                <i class="bx bx-trash me-1"></i>Delete
                                                            </a>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
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

    <!-- Modal Create -->
    <div class="modal fade" id="largeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3">Tambah User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="createUserForm">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="roleLarge" class="form-label">Role</label>
                                <select name="role" id="roleLarge" class="form-select">
                                    <option>--Role--</option>
                                    <option value="admin">Admin</option>
                                    <option value="owner">Owner</option>
                                    <option value="kasir">Kasir</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nameLarge" class="form-label">Nama Lengkap</label>
                                <input type="text" name="name" id="nameLarge" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="emailLarge" class="form-label">Email</label>
                                <input type="text" name="email" id="emailLarge" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="passwordLarge" class="form-label">Password</label>
                                <input type="password" name="password" id="passwordLarge" class="form-control"
                                    placeholder="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="confirmPasswordLarge" class="form-label">Konfirmasi Password</label>
                                <input type="password" name="confirm_password" id="confirmPasswordLarge"
                                    class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Kembali</button>
                        <button type="button" class="btn btn-primary" onclick="saveUser()">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.10/js/jquery.dataTables.js"></script>

    <script>
        $(document).ready(function() {
            $('#userTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('user.data') }}',
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'role',
                        name: 'role'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'aksi',
                        name: 'aksi',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
        });

        function saveUser() {
            var formData = $('#createUserForm').serialize() + "&_token={{ csrf_token() }}";

            $.ajax({
                type: 'POST',
                url: '{{ route('users.store') }}',
                data: formData,
                success: function(response) {
                    console.log(response);

                    if (response.message) {
                        Swal.fire({
                            title: 'Sukses!',
                            text: response.message,
                            icon: 'success',
                            confirmButtonText: 'Ok',
                            backdrop: true, // Menetapkan backdrop agar SweetAlert muncul di depan modal
                            zIndex: 1060 // Menetapkan z-index agar SweetAlert muncul di depan modal
                        });
                    } else {
                        console.error('Tidak dapat menemukan properti pesan dalam respons.');
                    }

                    $('#userTable').DataTable().ajax.reload();
                    $('#largeModal').modal('hide');

                    setTimeout(function() {
                        window.location.href = '{{ route('users.index') }}';
                    }, 500);
                },
                error: function(xhr, status, error) {
                    console.error('Terjadi kesalahan AJAX:', error);

                    Swal.fire({
                        title: 'Error!',
                        text: 'Terjadi kesalahan saat menyimpan data.',
                        icon: 'error',
                        confirmButtonText: 'Ok',
                        backdrop: true, // Menetapkan backdrop agar SweetAlert muncul di depan modal
                        zIndex: 1060 // Menetapkan z-index agar SweetAlert muncul di depan modal
                    });
                }
            });
        }
    </script>
@endsection
