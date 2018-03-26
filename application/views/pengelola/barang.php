<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="purple">
                <i class="material-icons">book</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Daftar Pengajuan Barang</h4>
                <div class="toolbar">
                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                </div>
                <div class="material-datatables">
                    <table class="table table-striped table-no-bordered table-hover datatables" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Berat (kg)</th>
                                <th>Jenis</th>
                                <th>Petani</th>
                                <th>Tanggal Pengajuan</th>
                                <th class="disabled-sorting text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                foreach ($data_saya as $barang): ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $barang->nama_barang ?></td>
                                        <td><?php echo $barang->berat_barang ?></td>
                                        <td><?php echo $barang->jenis->nama_komoditi ?></td>
                                        <td><?php echo $barang->petani->nama ?></td>
                                        <td><?php echo $barang->tgl_pengajuan ?></td>
                                        <td class="td-actions text-right">
                                            <!-- <a class="btn btn-info" href="<?php echo base_url('pengelola/pengajuan/show/'.$barang->id_gudang); ?>"><i class="material-icons">assignment</i> Detail</a> -->
                                            <a class="btn btn-success" href="<?php echo base_url('pengelola/pengajuan/edit/'.$barang->id_barang); ?>"><i class="material-icons">mode_edit</i> Ubah</a>
                                            <a class="btn btn-danger" href="<?php echo base_url('pengelola/pengajuan/delete/'.$barang->id_barang); ?>"><i class="material-icons">close</i> Hapus</a>
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
    <!-- end col-md-12 -->
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="purple">
                <i class="material-icons">book</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Daftar Pengajuan Barang Lainnya</h4>
                <div class="toolbar">
                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                </div>
                <div class="material-datatables">
                    <table class="table table-striped table-no-bordered table-hover datatables" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Berat (kg)</th>
                                <th>Jenis</th>
                                <th>Petani</th>
                                <th>Pengelola</th>
                                <th>Tanggal Pengajuan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                foreach ($data as $barang): ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $barang->nama_barang ?></td>
                                        <td><?php echo $barang->berat_barang ?></td>
                                        <td><?php echo $barang->jenis->nama_komoditi ?></td>
                                        <td><?php echo $barang->petani->nama ?></td>
                                        <td><?php echo $barang->pengelola->nama ?></td>
                                        <td><?php echo $barang->tgl_pengajuan ?></td>
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