<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">assignment</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Detail Gudang</h4>
                    <div class="row">
                        <table class="table table-hover table-responsive">
                            <tbody>
                                <tr>
                                    <td class="text-right">Nama Gudang </td>
                                    <td class="text-center">:</td>
                                    <td class="text-left"><?php echo $gudang->nama; ?></td>
                                </tr>
                                <tr>
                                    <td class="text-right">Pengelola </td>
                                    <td class="text-center">:</td>
                                    <td class="text-left"><?php echo $gudang->id_pengelola.' | '.$gudang->pengelola->nama; ?></td>
                                </tr>
                                <tr>
                                    <td class="text-right">Kapasitas total </td>
                                    <td class="text-center">:</td>
                                    <td class="text-left"><?php echo $gudang->kapasitas; ?> Kg</td>
                                </tr>
                                <tr>
                                    <td class="text-right">Kapasitas isi</td>
                                    <td class="text-center">:</td>
                                    <td class="text-left">[yang tidak terisi]</td>
                                </tr>
                                <tr>
                                    <td class="text-right">Kapasitas sisa</td>
                                    <td class="text-center">:</td>
                                    <td class="text-left">[kapasitas sisa]</td>
                                </tr>
                                 <tr>
                                    <td class="text-right"> Status</td>
                                    <td class="text-center">:</td>
                                    <td class="text-left">
                                        <span class="label label-info">[tersisa]</span>
                                        <span class="label label-danger">[penuh]</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    <div class="col-md-3"></div>
    </div>
</div>
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <div class="card">
           <div class="card-header card-header-icon" data-background-color="rose">
                <i class="material-icons">assignment</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Tabel Detail Gudang</h4>
            </div>
            <div class="card-content">
                     <div class="material-datatables">
                        <table class="table table-striped table-no-bordered table-hover datatables" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Berat (kg)</th>
                                    <th>Petani</th>
                                    <th>Tgl Pengujian</th>
                                    <th>No Resi</th>
                                    <th>Masa Akhir Resi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    foreach ($gudang->pengujian as $pengujian): ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $pengujian->barang->nama_barang ?></td>
                                            <td><?php echo $pengujian->barang->berat_barang ?></td>
                                            <td><?php echo $pengujian->barang->petani->nama ?></td>
                                            <td><?php echo $pengujian->tgl_pengujian ?></td>
                                            <td><?php echo $pengujian->resi->first()->no_resi ?></td>
                                            <td><?php echo $pengujian->resi->first()->jatuh_tempo ?></td>
                                        </tr>
                                <?php endforeach ;?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <button class="btn btn-primary btn-round" onclick="belumAda()">Cetak Laporan</button>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <div class="col-md-1"></div>
</div>
