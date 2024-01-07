<div class="col-sm-12">
            <?php 
                if ($this->session->flashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i>';
                echo $this->session->flashdata('pesan');
                echo '</h5></div>';
                }
            ?>
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Order</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Diproses</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Dikirim</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Selesai</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                  <table class="table">
                        <tr>
                            <th>No Order</th>
                            <th>Tanggal</th>
                            <th>Ekspedisi</th>
                            <th>Total Bayar</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach ($belum_bayar as $key => $value) { ?>
                        <tr>
                            <td><?= $value->no_order ?></td>
                            <td><?= $value->tgl_order ?></td>
                            <td>
                                <b><?= $value->ekspedisi ?></b><br>
                                Paket : <?= $value->paket ?><br>
                                Ongkir : <?= number_format($value->ongkir,0) ?>
                        </td>
                        <td>
                            <b>Rp.<?=number_format($value->total_bayar,0) ?></b><br>
                            <?php if ($value->status_bayar==0) { ?>
                                <span class="badge badge-warning">Belum Bayar</span>
                            <?php }else { ?>
                                <span class="badge badge-success">Sudah Bayar</span><br>
                                <span class="badge badge-primary">Menunggu Verifikasi</span>
                            <?php } ?>
                        </td>
                        <td>
                        <?php if ($value->status_bayar==0) { ?>
                            <a href="<?= base_url('pesanan_saya/bayar/'. $value->id_transaksi) ?>" class="btn btn-sm btn-flat btn-primary">Bayar</a>
                            <?php } ?>
                        </td>
                        </tr>
                        <?php } ?>
                     </table>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                  <table class="table">
                        <tr>
                            <th>No Order</th>
                            <th>Tanggal</th>
                            <th>Ekspedisi</th>
                            <th>Total Bayar</th>
                        </tr>
                        <?php foreach ($diproses as $key => $value) { ?>
                        <tr>
                            <td><?= $value->no_order ?></td>
                            <td><?= $value->tgl_order ?></td>
                            <td>
                                <b><?= $value->ekspedisi ?></b><br>
                                Paket : <?= $value->paket ?><br>
                                Ongkir : <?= number_format($value->ongkir,0) ?>
                        </td>
                        <td>
                            <b>Rp.<?=number_format($value->total_bayar,0) ?></b><br>
                            
                                <span class="badge badge-success">Terverifikasi</span><br>
                                <span class="badge badge-primary">Sedang Dikemas</span>
                        </td>
                        </tr>
                        <?php } ?>
                     </table> 
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                  <table class="table">
                    <tr>
                        <th>No Order</th>
                        <th>Tanggal</th>
                        <th>Ekspedisi</th>
                        <th>Total Bayar</th>
                        <th>No Resi</th>
                    </tr>
                    <?php foreach ($dikirim as $key => $value) { ?>
                    <tr>
                        <td><?= $value->no_order ?></td>
                        <td><?= $value->tgl_order ?></td>
                        <td>
                            <b><?= $value->ekspedisi ?></b><br>
                            Paket : <?= $value->paket ?><br>
                            Ongkir : <?= number_format($value->ongkir,0) ?>
                        </td>
                        <td><b>Rp.<?=number_format($value->total_bayar,0) ?></b><br><span class="badge badge-success">Dikirim</span></td>
                        <td><h4><?= $value->no_resi ?><br><button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#diterima<?= $value->id_transaksi ?>">Diterima</button></h4></td>
                    </tr>
                    <?php } ?>
                  </table>  
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">
                  <table class="table">
                    <tr>
                      <th>No Order</th>
                      <th>Tanggal</th>
                      <th>Ekspedisi</th>
                      <th>Total Bayar</th>
                      <th>No Resi</th>
                    </tr>
                    <?php foreach ($selesai as $key => $value) { ?>
                    <tr>
                      <td><?= $value->no_order ?></td>
                      <td><?= $value->tgl_order ?></td>
                      <td>
                          <b><?= $value->ekspedisi ?></b><br>
                          Paket : <?= $value->paket ?><br>
                          Ongkir : <?= number_format($value->ongkir,0) ?>
                      </td>
                      <td><b>Rp.<?=number_format($value->total_bayar,0) ?></b><br><span class="badge badge-success">Selesai</span></td>
                      <td><h4><?= $value->no_resi ?><br></h4></td>
                    </tr>
                    <?php } ?>
                  </table>
                  </div>
                  </div>

                  <?php foreach ($dikirim as $key => $value) { ?>
      <div class="modal fade" id="diterima<?= $value->id_transaksi ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Pesanan Diterima</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Apakah yakin pesanan diterima ?
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <a href="<?= base_url('pesanan_saya/diterima/'.$value->id_transaksi) ?>" type="button" class="btn btn-primary">Yakin</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <?php } ?>