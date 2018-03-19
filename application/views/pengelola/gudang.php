<div class="row">
    <div class="col-md-7">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="purple">
                <i class="material-icons">book</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Daftar Gudang Saya</h4>
                <div class="toolbar">
                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                </div>
                <div class="material-datatables">
                    <table class="table table-striped table-no-bordered table-hover datatables" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Gudang</th>
                                <th>Kapasitas</th>
                                <th class="disabled-sorting text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                foreach ($data_saya as $gudang): ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $gudang->nama ?></td>
                                        <td><?php echo $gudang->kapasitas ?></td>
                                        <td class="text-right">
                                            <!-- <a href="#" class="btn btn-simple btn-info btn-icon like"><i class="material-icons">favorite</i></a> -->
                                            <a href="<?php echo base_url('pengelola/gudang/edit/'.$gudang->id_gudang); ?>" class="btn btn-simple btn-warning btn-icon edit"><i class="material-icons">mode_edit</i></a>
                                            <a href="<?php echo base_url('pengelola/gudang/delete/'.$gudang->id_gudang); ?>" class="btn btn-simple btn-danger btn-icon remove"><i class="material-icons">close</i></a>
                                        </td>
                                    </tr>
                            <?php endforeach ;?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end content-->
        </div>
        <!--  end card  -->
    </div>
    <!-- end col-md-7 -->
    <div class="col-md-5">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="purple">
                <i class="material-icons">book</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Daftar Gudang Lain</h4>
                <div class="toolbar">
                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                </div>
                <div class="material-datatables">
                    <table class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Gudang</th>
                                <th>Pengelola</th>
                                <th>Kapasitas</th>
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