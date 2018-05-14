<!DOCTYPE html>
<html lang="en">

  <head>
    <?php $this->load->view('landing/head'); ?>
  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <?php $this->load->view('landing/navbar'); ?>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <?php if($this->session->flashdata('class') && $this->session->flashdata('message')) : ?>
                <div class="alert alert-<?php echo $this->session->flashdata('class');?> alert-dismissible fade show" role="alert">
                    <strong><?php echo $this->session->flashdata('message');?></strong> Silakan Login.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <h1 class="my-4">
                Berita
                <!-- <small>Sitem Resi Gudang Kab. Grobogan</small> -->
            </h1>

          <!-- Blog Post -->
          <?php foreach($data as $artikel):?>
          <div class="card mb-4">
            <img class="card-img-top" src="<?php echo base_url('assets/img/uploads/').$artikel->gambar; ?>">
            <div class="card-body">
              <h2 class="card-title"><?php echo $artikel->judul; ?></h2>
              <p class="card-text">
                  <?php
                      // strip tags to avoid breaking any html
                      $string = strip_tags($artikel->isi);
                      $endPoint = false;
                      $limit = 275;
                      if (strlen($string) > $limit) {

                          // truncate string
                          $stringCut = substr($string, 0, $limit);
                          $endPoint = strrpos($stringCut, ' ');

                          //if the string doesn't contain any space then it will cut without word basis.
                          $string = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);
                          $string .= '...';
                      }
                      echo $string;
                     ?>
              </p>
              <?php if ($endPoint) : ?>
              <p class="category">
                  <a href="<?php echo base_url('artikel/'.$artikel->id_artikel); ?>" class="btn btn-primary">Selanjutnya &rarr;</a>
              </p>
              <?php endif; ?>

            </div>
            <div class="card-footer text-muted">
              Ditulis pada <?php echo longdate_indo($artikel->tanggal); ?>
              oleh <strong><?php echo $artikel->penulis->nama; ?></strong>
            </div>
          </div>
          <?php endforeach; ?>

          <!-- Pagination -->
          <?php if (isset($links)) { ?>
                <?php echo $links ?>
            <?php } ?>

        </div>

        <!-- Sidebar Widgets Column -->
        <?php $this->load->view('landing/sidebar'); ?>


      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php $this->load->view('landing/footer'); ?>


  </body>

</html>
