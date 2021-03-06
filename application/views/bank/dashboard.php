<div class="row">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card card-stats">
                <div class="card-header" data-background-color="blue">
                    <i class="material-icons">assignment</i>
                </div>
                <div class="card-content">
                    <p class="category">Resi Gudang</p>
                    <h3 class="card-title"><?php echo $resi; ?></h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="blue">
                    <i class="material-icons">assignment</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Data Harga Beras</h4>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <tr>
                                    <th>Sebelumnya</th>
                                    <th>Sekarang</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php $harga = []; foreach ($beras as $beras):
                                        $harga[] = $beras->harga; ?>
                                        <td><?php echo '<small>'.shortdate_indo($beras->tanggal).'</small> : <strong>'.$beras->harga.'</strong>'; ?></td>
                                    <?php endforeach;?>
                                    <td>
                                    <?php
                                        if ($harga[1] > $harga[0]) {
                                            echo "<i class='fa fa-caret-up text-danger' aria-hidden='true'></i> <strong class='text-danger'>Naik</strong>";
                                        } elseif($harga[1] < $harga[0]) {
                                            echo "<i class='fa fa-caret-down text-success' aria-hidden='true'></i> <strong class='text-success'>Turun</strong>";
                                        } else {
                                            echo "<i class='fa fa-minus text-default' aria-hidden='true'></i> <strong class='text-default'>Sama</strong>";
                                        }
                                    ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="blue">
                    <i class="material-icons">assignment</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Data Harga Jagung</h4>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <tr>
                                    <th>Sebelumnya</th>
                                    <th>Sekarang</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <tr>
                                        <?php $harga = []; foreach ($jagung as $jagung):
                                            $harga[] = $jagung->harga; ?>
                                            <td><?php echo '<small>'.shortdate_indo($jagung->tanggal).'</small> : <strong>'.$jagung->harga.'</strong>'; ?></td>
                                        <?php endforeach;?>
                                        <td>
                                        <?php
                                            if ($harga[1] > $harga[0]) {
                                                echo "<i class='fa fa-caret-up text-danger' aria-hidden='true'></i> <strong class='text-danger'>Naik</strong>";
                                            } elseif($harga[1] < $harga[0]) {
                                                echo "<i class='fa fa-caret-down text-success' aria-hidden='true'></i> <strong class='text-success'>Turun</strong>";
                                            } else {
                                                echo "<i class='fa fa-minus text-default' aria-hidden='true'></i> <strong class='text-default'>Sama</strong>";
                                            }
                                        ?>
                                        </td>
                                    </tr>
                                </tr>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="blue">
                    <i class="material-icons">assignment</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Data Harga Gabah</h4>
                    <!-- <p class="card-category">Diperbarui pada : </p> -->
                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <tr>
                                    <th>Sebelumnya</th>
                                    <th>Sekarang</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <tr>
                                        <?php $harga = []; foreach ($gabah as $gabah):
                                            $harga[] = $gabah->harga; ?>
                                            <td><?php echo '<small>'.shortdate_indo($gabah->tanggal).'</small> : <strong>'.$gabah->harga.'</strong>'; ?></td>
                                        <?php endforeach;?>
                                        <td>
                                        <?php
                                            if ($harga[1] > $harga[0]) {
                                                echo "<i class='fa fa-caret-up text-danger' aria-hidden='true'></i> <strong class='text-danger'>Naik</strong>";
                                            } elseif($harga[1] < $harga[0]) {
                                                echo "<i class='fa fa-caret-down text-success' aria-hidden='true'></i> <strong class='text-success'>Turun</strong>";
                                            } else {
                                                echo "<i class='fa fa-minus text-default' aria-hidden='true'></i> <strong class='text-default'>Sama</strong>";
                                            }
                                        ?>
                                        </td>
                                    </tr>
                                </tr>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="blue">
                    <i class="material-icons">timeline</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Data Harga Beras</h4>
                </div>
                <div id="chartBeras" class="ct-chart"></div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="blue">
                    <i class="material-icons">timeline</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Data Harga Jagung</h4>
                </div>
                <div id="chartJagung" class="ct-chart"></div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="blue">
                    <i class="material-icons">timeline</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Data Harga Gabah</h4>
                </div>
                <div id="chartGabah" class="ct-chart"></div>
            </div>
        </div>
    </div>
</div>
