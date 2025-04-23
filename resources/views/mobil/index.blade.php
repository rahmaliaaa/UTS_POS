@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <button onclick="modalAction('{{ url('mobil/create_ajax') }}')" class="btn btn-sm btn-success mt-1">Tambah Data</button>
            </div>
        </div>

        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <table class="table table-bordered table-striped table-hover table-sm" id="table_mobil">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Merk</th>
                    <th>Model</th>
                    <th>Tipe</th>
                    <th>Tahun</th>
                    <th>Harga</th>
                    <th>Stok</th>
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
            // Edit Button
            $(document).on('click', '.editBtn', function () {
                let id = $(this).data('id');
                modalAction(`/mobil/${id}/edit_ajax`);
            });
            
            // Tabel Data Mobil dengan Filter
            var dataMobil = $('#table_mobil').DataTable({
                serverSide: true,
                ajax: {
                    url: "{{ url('mobil/list') }}",
                    dataType: "json",
                    type: "POST",
                    data: function(d) {
                        d.model = $('#filter_model').val();  // Kirim filter model ke server
                    }
                },
                columns: [
                    { data: "DT_RowIndex", className: "text-center", orderable: false, searchable: false },
                    { data: "merk", orderable: true, searchable: true },
                    { data: "model", orderable: true, searchable: true },
                    { data: "tipe", orderable: true, searchable: true },
                    { data: "tahun", orderable: true, searchable: true },
                    { data: "harga", orderable: true, searchable: true },
                    { data: "stok", orderable: true, searchable: true },
                    { data: "aksi", orderable: false, searchable: false }
                ]
            });
            $(document).on('click', '.deleteBtn', function () {
                let id = $(this).data('id');
                modalAction(`/mobil/${id}/delete_ajax`);
            });

            // Filter Model
            $('#filter_model').on('keyup change', function() {
                dataMobil.ajax.reload(); // Reload data tabel
            });
        });
    </script>
@endpush
