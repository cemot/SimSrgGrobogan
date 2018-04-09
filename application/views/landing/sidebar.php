<div class="col-md-4">
  <!-- Side Widget -->
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
                      <?php $harga = []; $i=1; foreach ($beras as $beras):
                          $harga[] = $beras->harga; ?>
                          <td>
                            <?php echo '<small>'.$beras->tanggal.'</small> : <strong>'.$beras->harga.'</strong>'; ?>
                            <?php
                            if ($i==2) {
                                if($harga[1] > $harga[0]) {
                                    echo "<i class='fa fa-caret-up text-danger' aria-hidden='true'></i>";
                                } elseif($harga[1] < $harga[0]) {
                                    echo "<i class='fa fa-caret-down text-success' aria-hidden='true'></i>";
                                } else {
                                    echo "<i class='fa fa-minus text-default' aria-hidden='true'></i>";
                                }
                            }
                            $i++;
                            ?>
                          </td>
                      <?php endforeach;?>

                    </tr>
                    <tr>
                        <th scope="row">Jagung</th>
                        <?php $harga = []; $i=1; foreach ($jagung as $jagung):
                            $harga[] = $jagung->harga; ?>
                            <td>
                                <?php echo '<small>'.$jagung->tanggal.'</small> : <strong>'.$jagung->harga.'</strong>'; ?>
                                <?php
                                if ($i==2) {
                                    if($harga[1] > $harga[0]) {
                                        echo "<i class='fa fa-caret-up text-danger' aria-hidden='true'></i>";
                                    } elseif($harga[1] < $harga[0]) {
                                        echo "<i class='fa fa-caret-down text-success' aria-hidden='true'></i>";
                                    } else {
                                        echo "<i class='fa fa-minus text-default' aria-hidden='true'></i>";
                                    }
                                }
                                $i++;
                                ?>
                            </td>
                        <?php endforeach;?>
                    </tr>
                    <tr>
                        <th scope="row">Beras</th>
                        <?php $harga = []; $i =1; foreach ($gabah as $gabah):
                            $harga[] = $gabah->harga; ?>
                            <td>
                                <?php echo '<small>'.$gabah->tanggal.'</small> : <strong>'.$gabah->harga.'</strong>'; ?>
                                <?php
                                if ($i==2) {
                                    if($harga[1] > $harga[0]) {
                                        echo "<i class='fa fa-caret-up text-danger' aria-hidden='true'></i>";
                                    } elseif($harga[1] < $harga[0]) {
                                        echo "<i class='fa fa-caret-down text-success' aria-hidden='true'></i>";
                                    } else {
                                        echo "<i class='fa fa-minus text-default' aria-hidden='true'></i>";
                                    }
                                }
                                $i++;
                                ?>
                            </td>
                        <?php endforeach;?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
  </div>

</div>
