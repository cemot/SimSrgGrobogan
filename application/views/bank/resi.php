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
                                <th>Cetak</th>
                                <th class="disabled-sorting text-right">Aksi Peminjaman</th>
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
                                        <td><?php echo date_indo($resi->tgl_penerbitan). ' - '.date_indo($resi->jatuh_tempo) ?></td>
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
                                        <td class="td-actions text-center">
                                            <a class="btn btn-info" target="_blank" href="<?php echo base_url('bank/resi/cetak/'.$resi->id_resi); ?>"><i class="material-icons">assignment</i> Cetak Resi</a>
                                        </td>
                                        <td class="td-actions text-right">
                                            <?php if(!$resi->gadai) : ?>
                                                <button class="btn btn-default"><i class="material-icons">warning</i> Peminjaman : Belum ada</button>
                                            <?php elseif($resi->gadai->status == 0) : ?>
                                                <a class="btn btn-danger" href="<?php echo base_url('bank/resi/gadai/'.$resi->gadai->id_gadai.'/tolak'); ?>"><i class="material-icons">money</i> Tolak</a>
                                                <a class="btn btn-success" href="<?php echo base_url('bank/resi/gadai/'.$resi->gadai->id_gadai.'/terima'); ?>"><i class="material-icons">money</i> Terima</a>
                                            <?php elseif($resi->gadai->status == 1) : ?>
                                                <button class="btn btn-danger"><i class="material-icons">clear</i> Peminjaman : Ditolak</button>
                                            <?php else : ?>
                                                <button class="btn btn-success"><i class="material-icons">check</i> Peminjaman : Diterima</button>
                                            <?php endif; ?>
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
