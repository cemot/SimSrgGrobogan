<div class="col-md-4">

  <!-- Search Widget -->
  <div class="card my-4">
    <h5 class="card-header">Search</h5>
    <div class="card-body">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for...">
        <span class="input-group-btn">
          <button class="btn btn-secondary" type="button">Go!</button>
        </span>
      </div>
    </div>
  </div>

  <!-- Categories Widget -->
  <div class="card my-4">
    <h5 class="card-header">Categories</h5>
    <div class="card-body">
      <div class="row">
        <div class="col-lg-6">
          <ul class="list-unstyled mb-0">
            <li>
              <a href="#">Web Design</a>
            </li>
            <li>
              <a href="#">HTML</a>
            </li>
            <li>
              <a href="#">Freebies</a>
            </li>
          </ul>
        </div>
        <div class="col-lg-6">
          <ul class="list-unstyled mb-0">
            <li>
              <a href="#">JavaScript</a>
            </li>
            <li>
              <a href="#">CSS</a>
            </li>
            <li>
              <a href="#">Tutorials</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <!-- Side Widget -->
  <div class="card my-4">
    <h5 class="card-header">Side Widget</h5>
    <div class="card-body">
      You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
    </div>
  </div>

  <div class="card my-4">
    <h5 class="card-header">Harga Komoditi</h5>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table responsive">
                <thead>
                    <tr>
                      <th scope="col">Komoditi</th>
                      <th scope="col">Sebelumnya</th>
                      <th scope="col">Sekarang</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                      <th scope="row">Beras</th>
                      <?php $harga = []; foreach ($beras as $beras):
                          $harga[] = $beras->harga; ?>
                          <td><?php echo '<small>'.$beras->tanggal.'</small> : <strong>'.$beras->harga.'</strong>'; ?></td>
                      <?php endforeach;?>
                      <?php
                      if ($harga[1] > $harga[0]) {
                          echo "<i class='fa fa-caret-up' aria-hidden='true'></i> <strong>Naik</strong>";
                      } elseif($harga[1] < $harga[0]) {
                          echo "<i class='fa fa-caret-down' aria-hidden='true'></i> <strong>Turun</strong>";
                      } else {
                          echo "<i class='fa fa-minus' aria-hidden='true'></i> <strong>Sama</strong>";
                      }
                      ?>
                    </tr>
                    <tr>
                        <th scope="row">Jagung</th>
                        <?php $harga = []; foreach ($jagung as $jagung):
                            $harga[] = $jagung->harga; ?>
                            <td><?php echo '<small>'.$jagung->tanggal.'</small> : <strong>'.$jagung->harga.'</strong>'; ?></td>
                        <?php endforeach;?>
                        <?php
                        if ($harga[1] > $harga[0]) {
                            echo "<i class='fa fa-caret-up' aria-hidden='true'></i> <strong>Naik</strong>";
                        } elseif($harga[1] < $harga[0]) {
                            echo "<i class='fa fa-caret-down' aria-hidden='true'></i> <strong>Turun</strong>";
                        } else {
                            echo "<i class='fa fa-minus' aria-hidden='true'></i> <strong>Sama</strong>";
                        }
                        ?>
                    </tr>
                    <tr>
                        <th scope="row">Beras</th>
                        <?php $harga = []; foreach ($gabah as $gabah):
                            $harga[] = $gabah->harga; ?>
                            <td><?php echo '<small>'.$gabah->tanggal.'</small> : <strong>'.$gabah->harga.'</strong>'; ?></td>
                        <?php endforeach;?>
                        <?php
                        if ($harga[1] > $harga[0]) {
                            echo "<i class='fa fa-caret-up' aria-hidden='true'></i> <strong>Naik</strong>";
                        } elseif($harga[1] < $harga[0]) {
                            echo "<i class='fa fa-caret-down' aria-hidden='true'></i> <strong>Turun</strong>";
                        } else {
                            echo "<i class='fa fa-minus' aria-hidden='true'></i> <strong>Sama</strong>";
                        }
                        ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
  </div>

</div>
