<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="purple">
                <i class="material-icons">description</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Daftar Pengujian Saya</h4>
                <div class="toolbar">
                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                </div>
                <div class="material-datatables">
                    <table class="table table-striped table-no-bordered table-hover datatables" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Barang</th>
                                <th>Petani</th>
                                <th>Tanggal</th>
                                <th>Hasil Pengujian</th>
                                <th>Catatan</th>
                                <th>Status</th>
                                <th class="disabled-sorting text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                foreach ($data_saya as $pengujian): ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $pengujian->barang->nama_barang ?></td>
                                        <td><?php echo $pengujian->barang->petani->nama ?></td>
                                        <td><?php echo $pengujian->tgl_pengujian ?></td>
                                        <td><?php echo $pengujian->hsl_pengujian ?></td>
                                        <td><?php echo $pengujian->catatan->isi_catatan ?></td>
                                        <td><?php echo $pengujian->catatan->status ?></td>
                                        <td class="text-right">
                                            <!-- <a href="#" class="btn btn-simple btn-info btn-icon like"><i class="material-icons">favorite</i></a> -->
                                            <a href="<?php echo base_url('pengelola/pengujian/edit/'.$pengujian->id_pengujian); ?>" class="btn btn-simple btn-warning btn-icon edit"><i class="material-icons">mode_edit</i></a>
                                            <a href="<?php echo base_url('pengelola/pengujian/delete/'.$pengujian->id_pengujian); ?>" class="btn btn-simple btn-danger btn-icon remove"><i class="material-icons">close</i></a>
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
                <i class="material-icons">description</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Daftar Pengujian Lain</h4>
                <div class="toolbar">
                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                </div>
                <div class="material-datatables">
                    <table class="table table-striped table-no-bordered table-hover datatables" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Pengelola</th>
                                <th>Barang</th>
                                <th>Petani</th>
                                <th>Tanggal</th>
                                <th>Hasil Pengujian</th>
                                <th>Catatan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                foreach ($data as $pengujian): ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $pengujian->pengelola->nama ?></td>
                                        <td><?php echo $pengujian->barang->nama_barang ?></td>
                                        <td><?php echo $pengujian->barang->petani->nama ?></td>
                                        <td><?php echo $pengujian->tgl_pengujian ?></td>
                                        <td><?php echo $pengujian->hsl_pengujian ?></td>
                                        <td><?php echo $pengujian->catatan->isi_catatan ?></td>
                                        <td><?php echo $pengujian->catatan->status ?></td>
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