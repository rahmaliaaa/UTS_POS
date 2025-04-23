<div class="modal-dialog modal-lg" role="document">
    <form id="form-create" action="{{ url('pelanggan/store_ajax') }}" method="POST">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Pelanggan</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                    <small id="error-nama" class="text-danger error-text"></small>
                </div>
                <div class="form-group">
                    <label>No. Telp</label>
                    <input type="text" name="no_telp" class="form-control" required>
                    <small id="error-no_telp" class="text-danger error-text"></small>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control" required>
                    <small id="error-alamat" class="text-danger error-text"></small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </div>
    </form>
</div>

<script>
$('#form-create').on('submit', function(e) {
    e.preventDefault();
    let form = $(this);
    $.ajax({
        url: form.attr('action'),
        method: 'POST',
        data: form.serialize(),
        success: function(response) {
            if (response.status) {
                $('#myModal').modal('hide');
                Swal.fire('Berhasil', response.message, 'success');
                $('#table_pelanggan').DataTable().ajax.reload();
            } else {
                $('.error-text').text('');
                $.each(response.msgField, function(key, val) {
                    $('#error-' + key).text(val[0]);
                });
                Swal.fire('Gagal', response.message, 'error');
            }
        },
        error: function() {
            Swal.fire('Error', 'Terjadi kesalahan saat menyimpan data.', 'error');
        }
    });
});
</script>
