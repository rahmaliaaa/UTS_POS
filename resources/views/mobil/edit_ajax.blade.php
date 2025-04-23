<form action="{{ url('/mobil/' . $mobil->id . '/update_ajax') }}" method="POST" id="form-edit">
    @csrf
    @method('PUT')
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Mobil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label>Merk Mobil</label>
                    <input type="text" name="merk" class="form-control" value="{{ $mobil->merk }}" required>
                    <small id="error-merk" class="text-danger error-text"></small>
                </div>

                <div class="form-group">
                    <label>Model Mobil</label>
                    <input type="text" name="model" class="form-control" value="{{ $mobil->model }}" required>
                    <small id="error-model" class="text-danger error-text"></small>
                </div>

                <div class="form-group">
                    <label>Tahun</label>
                    <input type="number" name="tahun" class="form-control" value="{{ $mobil->tahun }}" required>
                    <small id="error-tahun" class="text-danger error-text"></small>
                </div>

                <div class="form-group">
                    <label>Harga</label>
                    <input type="number" name="harga" class="form-control" value="{{ $mobil->harga }}" required>
                    <small id="error-harga" class="text-danger error-text"></small>
                </div>

                <div class="form-group">
                    <label>Stok</label>
                    <input type="number" name="stok" class="form-control" value="{{ $mobil->stok }}" required>
                    <small id="error-stok" class="text-danger error-text"></small>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-secondary">Batal</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
</form>

<script>
$(document).ready(function () {
    $('#form-edit').on('submit', function (e) {
        e.preventDefault();
        let form = $(this);
        let url = form.attr('action');
        let method = form.find('input[name="_method"]').val();

        $.ajax({
            url: url,
            method: method,
            data: form.serialize(),
            success: function (response) {
                if (response.status) {
                    $('#modal-ajax').modal('hide');
                    Swal.fire('Berhasil', response.message, 'success');
                    $('#tabel-mobil').DataTable().ajax.reload();
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
