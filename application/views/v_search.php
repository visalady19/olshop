<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hasil Pencarian</title>
</head>
<body>
    <h1>Hasil Pencarian</h1>
    
    <div class="row">
        <?php
        if (!empty($barang)) {
            $count = 0;
            foreach ($barang as $result) {
                // Start a new row if we've displayed three products
                if ($count % 3 == 0) {
                    echo '</div><div class="row">';
                }
                echo '<div class="col-4">'; // Divide each row into 3 columns
                echo '<div class="card bg-light">';
                echo '<div class="card-header text-muted border-bottom-0">';
                echo '<h2 class="lead"><b>' . $result->nama_barang . '</b></h2>';
                echo '<p class="text-muted text-sm"><b>Kategori : </b>' . $result->nama_kategori . '</p>';
                echo '</div>';
                echo '<div class="card-body pt-0">';
                echo '<div class="row">';
                echo '<div class="col-12 text-center">';
                echo '<a href="' . base_url('home/detail_barang/' . $result->id_barang) . '">';
                echo '<img src="' . base_url('assets/gambar/' . $result->gambar) . '" width="300px" height="250px">';
                echo '</a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '<div class="card-footer">';
                echo '<div class="row">';
                echo '<div class="col-sm-6">';
                echo '<div class="text-left">';
                echo '<h5><span class="badge bg-primary">Rp. ' . number_format($result->harga, 0) . '</span></h5>';
                echo '</div>';
                echo '</div>';
                echo '<div class="col-sm-6">';
                echo '<div class="text-right">';
                $averageRating = $this->m_home->get_average_rating($result->id_barang);
                if ($averageRating !== null) {
                    echo '<span>Rating: ' . number_format($averageRating, 1) . '</span>';
                } else {
                    echo '<span>Belum ada rating</span>';
                }
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                $count++;
            }
        } else {
            echo "<p>Tidak ada hasil pencarian yang ditemukan.</p>";
        }
        ?>
    </div>

    <!-- Tautan kembali ke halaman sebelumnya -->
    <p><a href="javascript:history.back()">Kembali</a></p>
</body>
</html>
