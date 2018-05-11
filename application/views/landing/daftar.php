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

          <h1 class="my-4">Daftar Akun
            <!-- <small>Sitem Resi Gudang Kab. Grobogan</small> -->
          </h1>

          <!-- Formulir -->
          <form method="post" action="<?php echo base_url('register'); ?>">
              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label class="control-label">Username</label>
                          <input type="text" class="form-control error" name="username" value="<?php echo set_value('username'); ?>" required>
                      <span class="material-input"></span></div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label class="control-label">Email address</label>
                          <input type="email" class="form-control" name="email" value="<?php echo set_value('email'); ?>" required>
                      <span class="material-input"></span></div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-4">
                      <div class="form-group">
                          <label class="control-label">Password</label>
                          <input type="password" class="form-control" name="password" required>
                      <span class="material-input"></span></div>
                  </div>
                  <div class="col-md-4">
                      <div class="form-group">
                          <label class="control-label">Konfirmasi Password</label>
                          <input type="password" class="form-control" name="password_confirm" required>
                      <span class="material-input"></span></div>
                  </div>
                  <div class="col-md-4">
                      <div class="form-group">
                          <label class="control-label">No KTP</label>
                          <input type="number" class="form-control" name="no_ktp" value="<?php echo set_value('no_ktp'); ?>" required>
                      <span class="material-input"></span></div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label class="control-label">Nama</label>
                          <input type="text" class="form-control" name="nama" value="<?php echo set_value('nama'); ?>" required>
                      <span class="material-input"></span></div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label class="control-label">Tempat Lahir</label>
                          <input type="text" class="form-control" name="tmpt_lahir" value="<?php echo set_value('tmpt_lahir'); ?>" required>
                      <span class="material-input"></span></div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label class="control-label">Tanggal Lahir</label>
                          <input type="text" class="form-control" id="datepicker" name="tgl_lahir" value="<?php echo set_value('tgl_lahir'); ?>" required>
                      <span class="material-input"></span></div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-4">
                      <div class="form-group">
                          <label class="control-label">No Telepon</label>
                          <input type="text" class="form-control" name="no_tlp" value="<?php echo set_value('no_tlp'); ?>" required>
                      <span class="material-input"></span></div>
                  </div>
                  <div class="col-md-8">
                      <div class="form-group">
                          <label class="control-label">Alamat</label>
                          <input type="text" class="form-control" name="alamat" required>
                      <span class="material-input"></span></div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-8">
                      <div class="form-group">
                          <label class="control-label">Kecamatan</label>
                          <select class="select2 form-control" data-style="select-with-transition" name="kecamatan" required>
                              <option disabled>Pilih Kecamatan</option>
                              <?php
                                  $kecamatan = [
                                      'Kedungjati', 'Karanganyar', 'Toroh', 'Penawangan', 'Geyer',
                                      'Pulokulon', 'Kradenan', 'Gabus', 'Ngaringan', 'Wirosari',
                                      'Tawangharjo', 'Grobogan', 'Purwodadi', 'Brati', 'Klambu',
                                      'Godong', 'Gubug', 'Tegowanu', 'Tanggungharjo'
                                  ];
                                  foreach ($kecamatan as $kecamatan) :
                                  ?>
                                  <option value="<?php echo $kecamatan ?>">
                                      <?php echo 'Kecamatan '.$kecamatan ?>
                                  </option>
                                  <?php endforeach; ?>
                          </select>
                      <span class="material-input"></span></div>
                  </div>
                  <div class="col-md-4">
                      <div class="form-group">
                          <label class="control-label">Role</label>
                          <select class="form-control" data-style="btn btn-primary" name="role" required>
                              <option selected disabled>Pilih Role</option>
                              <option value="4" selected>Petani</option>
                          </select>
                      <span class="material-input"></span></div>
                  </div>
              </div>
              <div class="clearfix"></div>
              <button type="submit" class="btn btn-primary pull-center">Daftar Akun</button>
              <div class="clearfix"></div>
          </form>

        </div>

        <!-- Sidebar Widgets Column -->
        <?php $this->load->view('landing/sidebar'); ?>


      </div>
      <!-- /.row -->
      <br><br><br>
    </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php $this->load->view('landing/footer'); ?>


  </body>

</html>
