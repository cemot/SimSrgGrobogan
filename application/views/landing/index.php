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

          <h1 class="my-4">Berita
            <!-- <small>Sitem Resi Gudang Kab. Grobogan</small> -->
          </h1>

          <!-- Blog Post -->
          <?php foreach($data as $artikel):?>
          <div class="card mb-4">
            <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
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
                  <a href="<?php echo base_url('artikel/'.$artikel->id_artikel); ?>" class="btn btn-primary">Read More &rarr;</a>
              </p>
              <?php endif; ?>

            </div>
            <div class="card-footer text-muted">
              Ditulis pada <?php echo date('d F Y',strtotime($artikel->tanggal)); ?>
              oleh <strong><?php echo $artikel->penulis->nama; ?></strong>
            </div>
          </div>
          <?php endforeach; ?>

          <!-- Pagination -->
          <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
              <a class="page-link" href="#">&larr; Older</a>
            </li>
            <li class="page-item disabled">
              <a class="page-link" href="#">Newer &rarr;</a>
            </li>
          </ul>

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
