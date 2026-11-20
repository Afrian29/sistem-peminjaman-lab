@extends('layout.master')

@section('header')
    <h2>Daftar Lab</h2>
@endsection

@section('title')

@section('card-header')
    <div class="d-flex align-items-center">
        <h6 class="p-1 flex-grow-1 mb-0">Daftar Laboratorium Komputer Jurusan Informatika</h6>

        <div class="p-2">
            <a href="#" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#TambahModal">
                <i class="bi bi-plus-circle"></i> Tambah</a>
        </div>
    </div>
@endsection

@section('card-body')
   
    <table class="table table-bordered text-center align-middle">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lab</th>
                <th>Lokasi</th>
                <th>Kapasitas</th>
                <th>Fasilitas</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($labs as $lab)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $lab->nama_lab }}</td>
                    <td>{{ $lab->lokasi }}</td>
                    <td>{{ $lab->kapasitas }}</td>
                    <td>{{ $lab->fasilitas }}</td>
                    <td class="align-items-center">
                        <form action="{{ route('aslab.labs.toggle', $lab) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn {{ $lab->status->color() }}" style="min-width: 120px;">
                                  {{ $lab->status->label() }}
                            </button>
                        </form>
                    </td>
                    <td class="align-items-center">
                        <button type="button"
                            class="btn btn-sm btn-outline-primary btn-edit"
                            data-bs-toggle="modal"
                            data-bs-target="#EditModal"
                            data-action="{{ route('aslab.lab.update', $lab) }}"
                            data-kode="{{ $lab->kode_lab }}"
                            data-nama="{{ $lab->nama_lab }}"
                            data-lokasi="{{ $lab->lokasi }}"
                            data-kapasitas="{{ $lab->kapasitas }}"
                            data-fasilitas="{{ $lab->fasilitas }}">
                            <i class="bi bi-pencil-square"></i>
                    </button>
                        <button type="button"
                            class="btn btn-sm btn-outline-danger"
                            data-bs-toggle="modal"
                            data-bs-target="#DeleteModal"
                            data-action="{{ route('aslab.lab.destroy', $lab) }}"
                            data-nama="{{ $lab->nama_lab }}">
                            <i class="bi bi-trash"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal untuk tambah data lab -->
    <div class="modal fade" id="TambahModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Lab</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-floating" action="{{ route('aslab.lab.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="kode_lab" class="form-label">Kode Lab</label>
                        <input type="text" class="form-control" id="kode_lab" name="kode_lab" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_lab" class="form-label">Nama Lab</label>
                        <input type="text" class="form-control" id="nama_lab" name="nama_lab" required>
                    </div>
                    <div class="mb-3">
                        <label for="lokasi" class="form-label">Lokasi</label>
                        <input type="text" class="form-control" id="lokasi" name="lokasi" required>
                    </div>
                    <div class="mb-3">
                        <label for="kapasitas" class="form-label">Kapasitas</label>
                        <input for="floatinginput" type="number" class="form-control" id="kapasitas" name="kapasitas" required>
                    </div>
                    <div class="mb-3">
                        <label for="fasilitas" class="form-label">Fasilitas</label>
                        <input type="text" class="form-control" id="fasilitas" name="fasilitas" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
                </form>

            </div>
        </div>
    </div>
    <!-- Akhir Modal untuk tambah data lab  -->

    <!-- Modal untuk edit data lab -->
    <div class="modal fade" id="EditModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog">
                <form id="editForm" action="" method="POST" class="modal-content">
                    @csrf
                    @method('PUT')

                    <div class="modal-header">
                        <h5 class="modal-title">Edit Data Lab</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="edit_kode_lab" class="form-label">Kode Lab</label>
                            <input type="text" class="form-control" id="edit_kode_lab" name="kode_lab" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_nama_lab" class="form-label">Nama Lab</label>
                            <input type="text" class="form-control" id="edit_nama_lab" name="nama_lab" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_lokasi" class="form-label">Lokasi</label>
                            <input type="text" class="form-control" id="edit_lokasi" name="lokasi" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_kapasitas" class="form-label">Kapasitas</label>
                            <input type="number" class="form-control" id="edit_kapasitas" name="kapasitas" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_fasilitas" class="form-label">Fasilitas</label>
                            <input type="text" class="form-control" id="edit_fasilitas" name="fasilitas" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-warning">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    <!-- Akhir Modal untuk edit data lab  -->

    <!-- Modal untuk hapus data lab  -->
    <div class="modal fade" id="DeleteModal" tabindex="-1" data-bs-backdrop="static">
        <div class="modal-dialog">
            <form id="deleteForm" action="" method="POST" class="modal-content">
                @csrf
                @method('DELETE')

                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <p class="mb-0">
                        Yakin ingin menghapus <strong id="deleteNama"></strong>?</br>
                        Data yang dihapus tidak dapat dikembalikan.
                    </p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
    
    <!-- Script untuk notif perubahan status -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: @json(session('success')),
                showConfirmButton: false,
                timer: 3000,
            });
        </script>
    @endif

    <script>
        document.getElementById('EditModal').addEventListener('show.bs.modal', function (event) {
        const btn = event.relatedTarget;
        if (!btn) return;

        document.getElementById('editForm').action = btn.dataset.action;
        document.getElementById('edit_kode_lab').value = btn.dataset.kode;
        document.getElementById('edit_nama_lab').value = btn.dataset.nama;
        document.getElementById('edit_lokasi').value = btn.dataset.lokasi;
        document.getElementById('edit_kapasitas').value = btn.dataset.kapasitas;
        document.getElementById('edit_fasilitas').value = btn.dataset.fasilitas;
    });
    </script>

    <script>
        document.getElementById('DeleteModal').addEventListener('show.bs.modal', function (event) {
            const btn = event.relatedTarget;
            if (!btn) return;

            document.getElementById('deleteForm').action = btn.dataset.action;
            document.getElementById('deleteNama').textContent = btn.dataset.nama;
        });
    </script>
@endsection