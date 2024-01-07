<div class="col-md-12">
<!-- general form elements disabled -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Form Edit Barang</h3>
        </div>
    <!-- /.card-header -->
        <div class="card-body">
            <?php 
            // notif form kosong
            echo validation_errors('<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h6><i class="icon fas fa-info"></i>', '</h6></div>');
            // notif gagal upload
            if (isset($error_upload)) {
                echo ('<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h6><i class="icon fas fa-info"></i>'.$error_upload.'</h6></div>');
            }
            echo form_open_multipart('barang/edit/'.$barang->id_barang) ?>
            <div class="form-group">
                <label>Nama Barang</label>
                <input name="nama_barang" class="form-control" placeholder="Nama Barang" value="<?= $barang->nama_barang ?>">
                </div>
            <div class="row">

            <div class="col-sm-4">
            <div class="form-group">
                <label>Kategori</label>
                <select name="id_kategori" class="form-control">
                    <option value="">-- Pilih Kategori --</option>
                    <?php foreach ($kategori as $key => $value) { ?>
                        <option value="<?= $value->id_kategori ?>"><?= $value->nama_kategori ?></option>
                    <?php } ?>
                </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                <label>Harga Barang</label>
                <input name="harga" class="form-control" placeholder="Harga Barang" value="<?= $barang->harga ?>">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                <label>Berat Barang (gram)</label>
                <input type="number" name="berat" min="0" class="form-control" placeholder="Berat Satuan Gram" value="<?= $barang->berat ?>">
                </div>
            </div>
            </div>

            <div class="form-group">
                <label>Deskripsi Barang</label>
                <textarea name="deskripsi" class="form-control" rows="7" placeholder="Deskripsi Barang"><?= $barang->deskripsi ?></textarea>
            </div>
            
            <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Foto Barang</label>
                    <input name="gambar" type="file" class="form-control" id="preview_gambar"><br>
                    <label>Stok Barang</label>
                    <input type="number" name="stok" min="0" class="form-control" placeholder="Stok Barang" value="<?= $barang->stok ?>">
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <img src="<?= base_url('assets/gambar/'.$barang->gambar) ?>" id="gambar_load" width="200px">
                </div>
            </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                <a href="<?= base_url('barang') ?>" class="btn btn-success btn-sm">Kembali</a>
            </div>
            <?php form_close() ?>
        </div>
    </div>
</div>

<script>
    function bacaGambar(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#gambar_load').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#preview_gambar").change(function(){
        bacaGambar(this);
    })
</script>