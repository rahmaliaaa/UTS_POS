<div class="modal-dialog" role="document">
    <form id="form-delete" method="POST" action="{{ url('pelanggan/delete_ajax/' . $pelanggan->id) }}">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Hapus</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah yakin menghapus pelanggan <strong>{{ $pelanggan->nama }}</strong>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger">Ya, Hapus</button>
            </div>
        </div>
    </form>
</div>

<script>
$('#form-delete').submit(function(e) {
    e.preventDefault();
    $.post($(this).attr('action'), $(this).serialize(), function(response) {
        $('#myModal').modal('hide');
        if (response.status) {
            Swal.fire('Berhasil', response.message, 'success');
        } else {
            Swal.fire('Gagal', response.message, 'error');
        }
        $('#table_pelanggan').DataTable().ajax.reload();
    });
});
</script>
