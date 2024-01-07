<div class="col-md-12">
<div class="card card-primary">
    <div class="card-header">
    <h3 class="card-title">Add Gambar Barang : <?= $barang->nama_barang ?></h3>
    <div class="card-tools">
    </div>
    <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">

    <?php 
        if ($this->session->flashdata('pesan')) {
            echo '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i>';
            echo $this->session->flashdata('pesan');
            echo '</h5></div>';
        }
    ?>
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

    echo form_open_multipart('gambarbarang/add/'.$barang->id_barang) ?>

    <div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label>Keterangan gambar</label>
            <input name="ket" class="form-control" placeholder="Keterangan gambar" value="<?= set_value('ket') ?>">
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group">
            <label>Gambar Barang</label>
            <input name="gambar" type="file" class="form-control" id="preview_gambar" required>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group">
            <img src="<?= base_url('assets/gambar/noimage.jpg') ?>" id="gambar_load" width="200px">
        </div>
    </div>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
        <a href="<?= base_url('gambarbarang') ?>" class="btn btn-success btn-sm">Kembali</a>
    </div>

    <?php echo form_close() ?>

    <hr>
    <div class="row">
        <?php foreach ($gambar as $key => $value) { ?>
            <div class="col-sm-2" style="margin: 10px;" align="center">
            <div class="form-group" align="center">
                <img src="<?= base_url('assets/gambarbarang/'.$value->gambar) ?>" id="gambar_load" width="190px" height="190px">
            </div>
            <p for="" align="center">Keterangan : <?= $value->ket ?></p>
            <button data-toggle="modal" data-target="#delete<?= $value->id_gambar ?>" class="btn btn-danger btn-block"><i class="fas fa-trash"></i> Hapus</button>
        </div>
        <?php } ?>
    </div>
        
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
</div>

<!-- /.modal delete -->
<?php foreach ($gambar as $key => $value) { ?>
<div class="modal fade" id="delete<?= $value->id_gambar ?>">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Delete <?= $value->ket ?> ?</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">

    <div class="form-group" align="center">
        <img src="<?= base_url('assets/gambarbarang/'.$value->gambar) ?>" id="gambar_load" width="190px" height="190px">
    </div>
    <h5>Apakah yakin menghapus gambar ini ?</h5>
        
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <a href="<?= base_url('gambarbarang/delete/'.$value->id_barang.'/'.$value->id_gambar) ?>" class="btn btn-danger">Delete</a>
    </div>

    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php } ?>

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