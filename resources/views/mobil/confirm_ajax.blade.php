<div class="modal-dialog" role="document">
    <form id="form-delete" method="POST">
        @csrf
        @method('DELETE')
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Hapus</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah kamu yakin ingin menghapus mobil <strong>{{ $mobil->merk }} {{ $mobil->model }}</strong>?</p>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-secondary">Batal</button>
                <button type="submit" class="btn btn-danger">Ya, Hapus</button>
            </div>
        </div>
    </form>
</div>

<script>
    $('#form-delete').on('submit', function(e) {
        e.preventDefault();
        let form = $(this);

        $.ajax({
            url: "{{ url('/mobil/' . $mobil->id . '/delete_ajax') }}",
            type: 'DELETE',
            data: form.serialize(),
            success: function (response) {
                if (response.status) {
                    $('#myModal').modal('hide');
                    Swal.fire('Berhasil', response.message, 'success');
                    $('#table_mobil').DataTable().ajax.reload();
                } else {
                    Swal.fire('Gagal', response.message, 'error');
                }
            },
            error: function () {
                Swal.fire('Error', 'Terjadi kesalahan saat menghapus data.', 'error');
            }
        });
    });
</script>
