<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="rose">
                <i class="material-icons">books</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Ubah Pengajuan Barang</h4>
                <form class="form-horizontal" method="post" action="<?php echo base_url('petani/barang/update'); ?>">
                    <input type="hidden" class="form-control" name="id_barang" value="<?php echo $barang->id_barang; ?>" required>
                    <div class="row">
                        <label class="col-md-2 label-on-left">Nama Barang</label>
                        <div class="col-md-10">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <input type="text" class="form-control" name="nama_barang" value="<?php echo $barang->nama_barang; ?>" required>
                            <span class="material-input"></span></div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2 label-on-left">Jenis Barang</label>
                        <div class="col-md-3">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <select class="selectpicker" data-style="select-with-transition" name="id_komoditi" required>
                                    <option disabled>Pilih Jenis Barang</option>
                                    <?php foreach ($komoditi as $komoditi) : ?>
                                        <option value="<?php echo $komoditi->id_komoditi; ?>" <?php ($barang->id_komoditi == $komoditi->id_komoditi ? 'selected' : '') ?>><?php echo $komoditi->nama_komoditi; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            <span class="material-input"></span></div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2 label-on-left">Berat Barang (kg)</label>
                        <div class="col-md-2">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <input type="number" class="form-control" name="berat_barang" min="1" max="150000" value="<?php echo $barang->berat_barang; ?>" required>
                            <span class="material-input"></span></div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2 label-on-left">Bulan Panen</label>
                        <div class="col-md-2">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <input type="text" class="form-control datepicker_month" name="bulan_panen" value="<?php echo $barang->bulan_panen; ?>" required>
                            <span class="material-input"></span></div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2 label-on-left">Tahun Panen</label>
                        <div class="col-md-2">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <input type="text" class="form-control datepicker_year" name="tahun_panen" value="<?php echo $barang->tahun_panen; ?>" required>
                            <span class="material-input"></span></div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2 label-on-left">Kemasan</label>
                        <div class="col-md-4">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <input type="text" class="form-control" name="kemasan" value="<?php echo $barang->kemasan; ?>" required>
                            <span class="material-input"></span></div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2 label-on-left">Pengangkut</label>
                        <div class="col-md-4">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <input type="text" class="form-control" name="pengangkut" value="<?php echo $barang->pengangkut; ?>" required>
                            <span class="material-input"></span></div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2 label-on-left">Gudang Tujuan</label>
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <select class="form-control select2" data-style="select-with-transition" id="plh_gudang" name="id_gudang" required="">
                                    <option disabled>Pilih Gudang</option>
                                    <?php foreach ($gudang as $gudang): ?>
                                        <option value="<?php echo $gudang->id_gudang ?>" <?php if($gudang->id_gudang == $barang->id_gudang) { echo 'selected'; }?>>
                                            <?php echo $gudang->id_gudang . " | " .$gudang->nama ;?>
                                        </option>
                                    <?php endforeach ;?>
                                </select>
                                <span class="material-input"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2 label-on-left">Alamat Gudang</label>
                        <div class="col-md-6">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <input type="text" class="form-control" id="alamat_gudang" value="" readonly>
                            <span class="material-input"></span></div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2 label-on-left">Rencana Penyimpanan</label>
                        <div class="col-md-2">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <input type="text" class="form-control datepicker" name="tgl_rencana" value="<?php echo date("m/d/Y", strtotime($barang->tgl_rencana)); ?>" required>
                            <span class="material-input"></span></div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2"></label>
                        <div class="col-md-10">
                            <div class="form-group form-button text-center">
                                <button type="submit" class="btn btn-fill btn-rose">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!--  end card  -->
    </div>
    <!-- end col-md-12 -->
</div>
