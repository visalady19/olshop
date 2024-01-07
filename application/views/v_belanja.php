<div class="card card-solid">
    <div class="card-body pb-0">
        <div class="row">
        <div class="col-sm-12">
        <?php 
            if ($this->session->flashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fas fa-check"></i>';
                echo $this->session->flashdata('pesan');
                echo '</h5></div>';
            }
        ?>
                <?php echo form_open('belanja/update'); ?>
        <table class="table" cellpadding="6" cellspacing="1" style="width:100%">
        <tr>
                <th width="100px">QTY</th>
                <th>Nama Barang</th>
                <th style="text-align:center">Harga</th>
                <th style="text-align:center">Sub-Total</th>
                <th style="text-align:center">Berat</th>
                <th class="text-center">Action</th>
        </tr>

        <?php $i = 1; ?>
        <?php 
        $tot_berat = 0;
        foreach ($this->cart->contents() as $items) {
                $barang = $this->m_home->detail_barang($items['id']);
                $berat = $items['qty']*$barang->berat;
                $tot_berat = $tot_berat + $berat;
        ?>
        <tr>
                <td>
                <?php echo form_input(array('name' => $i.'[qty]', 
                'value' => $items['qty'], 
                'maxlength' => '3',
                'min' => '0',
                'max' => $barang->stok,
                'size' => '5', 
                'type'=>'number', 
                'class'=>'form-control')); ?>
                </td>
                <td>
                    <?php echo $items['name']; ?>
                </td>
                <td style="text-align:center">Rp. <?php echo number_format($items['price'], 0); ?></td>
                <td style="text-align:center">Rp. <?php echo number_format($items['subtotal'], 0); ?></td>
                <td style="text-align:center"><?= $berat ?></td>
                <td class="text-center">
                    <a href="<?= base_url('belanja/delete/'.$items['rowid']) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                </td>
        </tr>
<?php $i++; ?>
<?php } ?>
<tr>
        <td class="right"><strong>Total : </strong></td>
        <td class="right"><strong>Rp. <?php echo number_format($this->cart->total(), 0); ?></strong></td>
        <th></th><th></th>
        <th>Total Berat : <?= $tot_berat ?></th>
        <th></th>
</tr>
</table>

<div class="row">
    <div class="col-sm-5">
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update Cart </button>
        <a href="<?= base_url('belanja/clear') ?>" class="btn btn-danger"><i class="fa fa-recycle"></i> Clear Cart </a>
        <a href="<?= base_url('belanja/checkout') ?>" class="btn btn-success"><i class="fa fa-check-square"></i> Check Out </a>
    </div>
</div>
<?php echo form_close(); ?>
<br>
        </div>
        </div>
    </div>
</div>