@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <button onclick="modalAction('{{ url('pelanggan/create_ajax') }}')" class="btn btn-sm btn-success mt-1">Tambah Pelanggan</button>
            </div>
        </div>

        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <table class="table table-bordered table-striped table-hover table-sm" id="table_pelanggan">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>No. Telp</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>

    <!-- Modal Placeholder -->
    <div id="myModal" class="modal fade animate shake" tabindex="-1" role="dialog" 
        data-backdrop="static" data-keyboard="false" data-width="75%" aria-hidden="true">
    </div>
@endsection

@push('css')
@endpush

@push('js')
    <script>
        // Fungsi untuk load modal
        function modalAction(url = '') {
            $('#myModal').load(url, function() {
                $('#myModal').modal('show');
            });
        }

        $(document).ready(function() {
            // Tabel Data Pelanggan
            var dataPelanggan = $('#table_pelanggan').DataTable({
                serverSide: true,
                ajax: {
                    url: "{{ url('pelanggan/list') }}",
                    dataType: "json",
                    type: "POST",
                    error: function(xhr, error, thrown) {
                        console.log(xhr.responseText); // Cek apakah ada error di response
                    }
                },
                columns: [
                    { data: "DT_RowIndex", className: "text-center", orderable: false, searchable: false },
                    { data: "nama", orderable: true, searchable: true },
                    { data: "no_telp", orderable: true, searchable: true },
                    { data: "alamat", orderable: true, searchable: true },
                    { data: "aksi", orderable: false, searchable: false }
                ]
            });

            // Edit Button
            $(document).on('click', '.editBtn', function () {
                let id = $(this).data('id');
                $('#myModal').load(`/pelanggan/edit_ajax/${id}`, function() {
                    $('#myModal').modal('show');
                });
            });

            // Delete Button
            $(document).on('click', '.deleteBtn', function () {
                let id = $(this).data('id');
                $('#myModal').load(`/pelanggan/confirm_ajax/${id}`, function() {
                    $('#myModal').modal('show');
                });
            });
        });
    </script>
@endpush
