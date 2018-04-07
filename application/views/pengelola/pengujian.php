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
                                <th>Hasil</th>
                                <th>Gudang</th>
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
                                        <td><span class="label label-<?php if($pengujian->hsl_pengujian == 'Diterima'){ echo 'success';} else { echo 'danger';} ?>"><?php echo $pengujian->hsl_pengujian ?></span>
                                        </td>
                                        <!-- <td><span class="label label-<?php if($pengujian->catatan->status == 0){ echo 'default';} else { echo 'success';} ?>"><?php if($pengujian->catatan->status == 0){ echo 'Pending';} else { echo 'Published';} ?></span>
                                        </td> -->
                                        <td><?php if($pengujian->gudang){ echo $pengujian->gudang->nama;} ?></td>
                                        <td class="td-actions text-right">
                                            <a class="btn btn-info" href="<?php echo base_url('pengelola/pengujian/detail/'.$pengujian->id_pengujian); ?>"><i class="material-icons">assignment</i> Detail Pengujian</a>
                                            <a class="btn btn-success" href="<?php echo base_url('pengelola/pengujian/edit/'.$pengujian->id_pengujian); ?>"><i class="material-icons">mode_edit</i> Ubah</a>
                                            <a class="btn btn-danger" href="<?php echo base_url('pengelola/pengujian/delete/'.$pengujian->id_pengujian); ?>"><i class="material-icons">close</i> Hapus</a>
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
                                        <td><span class="label label-<?php if($pengujian->hsl_pengujian == 'Diterima'){ echo 'success';} else { echo 'danger';} ?>"><?php echo $pengujian->hsl_pengujian ?></td>
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
