<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="purple">
                <i class="material-icons">description</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Daftar Resi Gudang</h4>
                <div class="toolbar">
                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                </div>
                <div class="material-datatables">
                    <table class="table table-striped table-no-bordered table-hover datatables" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Resi</th>
                                <th>Barang</th>
                                <th>Gudang</th>
                                <th>Masa Aktif</th>
                                <th>Status</th>
                                <th class="disabled-sorting text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                foreach ($data as $resi): ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $resi->no_resi ?></td>
                                        <td><?php echo $resi->pengujian->barang->nama_barang ?></td>
                                        <td><?php echo $resi->pengujian->gudang->nama ?></td>
                                        <td><?php echo date("d F Y", strtotime($resi->tgl_penerbitan)). ' - '.date("d F Y", strtotime($resi->jatuh_tempo)) ?></td>
                                        <td>
                                            <span class="label label-<?php if($resi->jatuh_tempo >= date("Y-m-d")){ echo 'success';} else { echo 'danger';} ?>">
                                                <?php 
                                                    if($resi->jatuh_tempo >= date("Y-m-d")){ 
                                                        echo 'Aktif';
                                                    } else { 
                                                        echo 'Tidak Aktif';
                                                    }
                                                ?>
                                            </span>
                                        </td>
                                        <td class="td-actions text-right">
                                            <button class="btn btn-info" onclick="belumAda()"><i class="material-icons">assignment</i> Cetak Resi</button>
                                            <!-- <a class="btn btn-info" href="<?php echo base_url('pengelola/resi/print/'.$resi->no_resi); ?>"><i class="material-icons">assignment</i> Cetak Resi</a> -->
                                            <!-- <a class="btn btn-success" href="<?php echo base_url('pengelola/pengujian/edit/'.$resi->no_resi); ?>"><i class="material-icons">mode_edit</i> Ubah</a> -->
                                            <!-- <a class="btn btn-danger" href="<?php echo base_url('pengelola/pengujian/delete/'.$resi->id_resi); ?>"><i class="material-icons">close</i> Hapus</a> -->
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