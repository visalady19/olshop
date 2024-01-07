<div class="col-md-12">
<div class="card card-primary">
    <div class="card-header">
    <h3 class="card-title">Data Barang</h3>
    <div class="card-tools">
        <a href="<?= base_url('barang/add') ?>" type="button" class="btn btn-primary btn-sm"><i class="fas fa-plus"> Add</i>
        </a>
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

    <table class="table table-bordered" id="example1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Berat</th>
                <th>Gambar</th>
                <th>Stok</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; 
            foreach ($barang as $key => $value) { ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $value->nama_barang ?></td>
                <td><?= $value->nama_kategori ?></td>
                <td>Rp. <?= number_format($value->harga, 0) ?></td>
                <td><?= number_format($value->berat, 0) ?> gram</td>
                <td><img src="<?= base_url('assets/gambar/' .$value->gambar) ?>" width="150px"></td>
                <td><?= $value->stok ?></td>
                <td class="text-center">
                    <a href="<?= base_url('barang/edit/'.$value->id_barang) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value->id_barang ?>"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
</div>

<!-- /.modal delete -->
<?php foreach ($barang as $key => $value) { ?>
<div class="modal fade" id="delete<?= $value->id_barang ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Delete <?= $value->nama_barang ?> ?</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

            <h5>Apakah yakin menghapus data ini ?</h5>
              
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <a href="<?= base_url('barang/delete/'.$value->id_barang) ?>" class="btn btn-primary">Save</a>
            </div>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
<?php } ?>