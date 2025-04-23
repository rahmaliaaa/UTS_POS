<form action="{{ url('/mobil/store_ajax') }}" method="POST" id="form-create">
    @csrf
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Mobil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label>Merk Mobil</label>
                    <input type="text" name="merk" class="form-control" required>
                    <small id="error-merk" class="text-danger error-text"></small>
                </div>
                <div class="form-group">
                    <label>Model Mobil</label>
                    <input type="text" name="model" class="form-control" required>
                    <small id="error-model" class="text-danger error-text"></small>
                </div>
                <div class="form-group">
                    <label>Tipe Mobil</label>
                    <input type="text" name="tipe" class="form-control" required>
                    <small id="error-tipe" class="text-danger error-text"></small>
                </div>                
                <div class="form-group">
                    <label>Tahun</label>
                    <input type="number" name="tahun" class="form-control" required>
                    <small id="error-tahun" class="text-danger error-text"></small>
                </div>
                <div class="form-group">
                    <label>Harga</label>
                    <input type="number" name="harga" class="form-control" required>
                    <small id="error-harga" class="text-danger error-text"></small>
                </div>
                <div class="form-group">
                    <label>Stok</label>
                    <input type="number" name="stok" class="form-control" required>
                    <small id="error-stok" class="text-danger error-text"></small>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </div>
    </div>
</form>

<script>
$(document).ready(function () {
    $('#form-create').on('submit', function (e) {
        e.preventDefault();
        let form = $(this);

        $.ajax({
            url: form.attr('action'),
            method: 'POST',
            data: form.serialize(),
            success: function (response) {
                if (response.status) {
                    $('#myModal').modal('hide');
                    Swal.fire('Berhasil', response.message, 'success');
                    $('#table_mobil').DataTable().ajax.reload();
                } else {
                    $('.error-text').text('');
                    $.each(response.msgField, function (key, val) {
                        $('#error-' + key).text(val[0]);
                    });
                    Swal.fire('Gagal', response.message, 'error');
                }
            },
            error: function () {
                Swal.fire('Error', 'Terjadi kesalahan saat menyimpan data.', 'error');
            }
        });
    });
});
</script>
