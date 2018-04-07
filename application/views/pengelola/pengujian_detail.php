<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">assignment</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Detail Catatan Pengujian Barang</h4>
                    <div class="row">
                        <div class="card-content">
                            <table class="table table-hover table-responsive">
                                <tbody>
                                    <tr>
                                        <td class="text-right">ID Barang </td>
                                        <td class="text-center">:</td>
                                        <td class="text-left"><?php echo $pengujian->id_barang; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">Nama</td>
                                        <td class="text-center">:</td>
                                        <td class="text-left"><?php echo $pengujian->barang->nama_barang; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">Petani </td>
                                        <td class="text-center">:</td>
                                        <td class="text-left"><?php echo $pengujian->barang->petani->nama; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">Pengelola / Penguji</td>
                                        <td class="text-center">:</td>
                                        <td class="text-left"><?php echo $pengujian->id_pengelola.' | '.$pengujian->pengelola->nama; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">Tanggal Pengujian</td>
                                        <td class="text-center">:</td>
                                        <td class="text-left"><?php echo $pengujian->tgl_pengujian; ?></td>
                                    </tr>
                                     <tr>
                                        <td class="text-right">Hasil Pengujian</td>
                                        <td class="text-center">:</td>
                                        <td class="text-left"><span class="label label-<?php if($pengujian->hsl_pengujian == 'Diterima'){ echo 'success';} else { echo 'danger';} ?>"><?php echo $pengujian->hsl_pengujian ?></span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        </div>
    <div class="col-md-3"></div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
           <div class="card-header card-header-icon" data-background-color="rose">
                <i class="material-icons">assignment</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Data Hasil Pengujian Barang</h4>
            </div>
            <div class="card-content">
                <div class="row">
                    <div class="col-md-6">
                        <h6><b>Gudang</b></h6>
                        <table class="table table-hover table-responsive">
                            <tbody>
                                <tr>
                                    <td class="text-right">Gudang </td>
                                    <td class="text-center">:</td>
                                    <td class="text-left"><?php if($pengujian->gudang){ echo $pengujian->gudang->id_gudang.' | '.$pengujian->gudang->nama;} ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <h6><b>No. Resi</b></h6>
                        <table class="table table-hover table-responsive">
                            <tbody>
                                    <tr>
                                        <td class="text-right">Nomor Resi</td>
                                        <td class="text-center">:</td>
                                        <td class="text-left"><?php if($pengujian->resi){ echo $pengujian->resi->first()->no_resi; } ?></td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h6><b>Harga</b></h6>
                        <table class="table table-hover table-responsive">
                            <tbody>
                                <tr>
                                    <td class="text-right">Satuan</td>
                                    <td class="text-center">:</td>
                                    <td class="text-left"><?php if($pengujian->harga){ echo $pengujian->harga->satuan_barang; } ?></td>
                                </tr>
                                <tr>
                                    <td class="text-right">Harga</td>
                                    <td class="text-center">:</td>
                                    <td class="text-left"><?php if($pengujian->harga){ echo $pengujian->harga->harga_barang; } ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-hover table-responsive">
                            <h6><b>Catatan</b></h6>
                            <tbody>
                                <tr>
                                    <td class="text-right">Isi catatan </td>
                                    <td class="text-center">:</td>
                                    <td class="text-left"><?php if($pengujian->catatan){ echo $pengujian->catatan->isi_catatan; } ?></td>
                                </tr>
                                <tr>
                                    <td class="text-right">Status</td>
                                    <td class="text-center">:</td>
                                    <td class="text-left"><span class="label label-<?php if($pengujian->catatan->status == 1){ echo 'success';} else { echo 'danger';} ?>">
                                        <?php if($pengujian->catatan->status == 0){ echo 'Pending';} else { echo 'Published';} ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <button class="btn btn-primary btn-round" onclick="belumAda()">Cetak Laporan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
