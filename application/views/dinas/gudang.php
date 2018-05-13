<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="purple">
                <i class="material-icons">book</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Data Gudang</h4>
                <div class="toolbar">
                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                </div>
                <div class="material-datatables">
                    <table class="table table-striped table-no-bordered table-hover datatables" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Gudang</th>
                                <th>Pengelola</th>
                                <th>Kapasitas Total (kg)</th>
                                <!-- <th>Kapasitas Isi (kg)</th> -->
                                <!-- <th>Kapasitas Sisa (kg)</th> -->
                                <th class="disabled-sorting text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                foreach ($data as $gudang): ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $gudang->nama ?></td>
                                        <td><?php echo $gudang->pengelola->nama ?></td>
                                        <td><?php echo $gudang->kapasitas ?></td>
                                        <?php
                                            // foreach ($isi_sisa as $isi_sisa):
                                            //     if ($gudang->id_gudang == $isi_sisa->id_gudang) {
                                            //         echo '<td>'.$isi_sisa->isi.'</td>';
                                            //         echo '<td>'.$isi_sisa->sisa.'</td>';
                                            //         break;
                                            //     }
                                            // endforeach;
                                        ?>
                                        <td class="td-actions text-right">
                                            <a class="btn btn-info" href="<?php echo base_url('dinas/gudang/detail/'.$gudang->id_gudang); ?>"><i class="material-icons">assignment</i> Detail Gudang</a>
                                        </td>
                                    </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end content-->
        </div>
        <!--  end card  -->
    </div>
    <!-- end col-md-12 -->
</div>
