<!-- Default box -->
<div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none"><?= $barang->nama_barang ?></h3>
              <div class="col-12">
                <img src="<?= base_url('assets/gambar/'. $barang->gambar) ?>" class="product-image" alt="Product Image">
                <h5 class="my-3"><?= "Stok : ".$barang->stok ?></h5>
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3"><?= $barang->nama_barang ?></h3>
              <hr>
              <h5><?= $barang->nama_kategori ?></h5>
              <hr>
              <p><?= nl2br($barang->deskripsi) ?></p>
              <hr>
              <div class="bg-gray py-2 px-3 mt-4">
                <h2 class="mb-0">
                  Rp. <?= number_format($barang->harga, 0) ?>
                </h2>
              </div>
              <?php 
              echo form_open('belanja/add');
              echo form_hidden('id',$barang->id_barang);
              echo form_hidden('price',$barang->harga);
              echo form_hidden('name',$barang->nama_barang);
              echo form_hidden('stok',$barang->stok);
              echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
              ?>
              <div class="mt-4">
                <div class="row">
                  <div class="col-sm-2">
                    <input type="number" name="qty" class="form-control" value="1" min="1">
                  </div>
                  <div class="col-sm-8">
                  <button type="submit" class="btn btn-primary btn-flat swalDefaultSuccess">
                  <i class="fas fa-cart-plus fa-lg mr-2"></i>Add to Cart</button>
                  </div>
                </div>
                <?php 
                echo form_close();
                ?>
            </div>
            </div>
          </div> 
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

      <!-- Add this section to display reviews -->
      <div class="mt-4">
          <h4>Customer Reviews</h4>
          <ul>
              <?php foreach ($reviews as $review): ?>
                  <li>
                      <strong>Rating: <?= $review->rating ?></strong><br>
                      <?= $review->review_text ?><br>
                      <small><?= $review->created_at ?></small>
                  </li>
              <?php endforeach; ?>
          </ul>
      </div>

      <!-- Add this section for adding a new review -->
      <div class="mt-4">
          <h4>Add Your Review</h4>
          <?php
              echo form_open('home/add_review');
              echo form_hidden('id_barang', $barang->id_barang);
          ?>
          <label for="rating">Rating:</label>
          <input type="number" name="rating" class="form-control" min="1" max="5" required>
          <label for="review_text">Your Review:</label>
          <textarea name="review_text" class="form-control" required></textarea>
          <button type="submit" class="btn btn-primary mt-2">Submit Review</button>
          <?php echo form_close(); ?>
      </div>

<script src="<?= base_url() ?>template/plugins/sweetalert2/sweetalert2.min.js"></script>

<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $('.swalDefaultSuccess').click(function() {
      Toast.fire({
        icon: 'success',
        title: 'Pesanan Berhasil Ditambahkan'
      })
    });
  });
</script>