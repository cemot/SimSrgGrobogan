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

        <!-- Post Content Column -->
        <div class="col-lg-8">

          <!-- Title -->
          <h1 class="mt-4"><?php echo $artikel->judul; ?></h1>

          <!-- Author -->
          <p class="lead">
            oleh
            <strong><?php echo $artikel->penulis->nama; ?></strong>
          </p>

          <hr>

          <!-- Date/Time -->
          <p>Ditulis pada <?php echo date('d F Y h:m A',strtotime($artikel->tanggal)); ?></p>

          <hr>

          <!-- Preview Image -->
          <img class="img-fluid rounded" src="http://placehold.it/900x300" alt="">

          <hr>

          <!-- Post Content -->
          <?php echo $artikel->isi; ?>

          <hr>

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
