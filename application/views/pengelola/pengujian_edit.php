<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="rose">
                <i class="material-icons">description</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Edit Pengujian</h4>
                <div class="row">
                    <form class="form-horizontal" method="post" action="<?php echo base_url('pengelola/pengujian/update'); ?>">
                    <div class="col-md-6 col-sm-12">
                        <div class="row">
                            <input type="hidden" class="form-control" name="id_pengujian" value="<?php echo $data->id_pengujian; ?>" required>
                            <label class="col-md-3 label-on-left"></label>
                            <div class="col-md-9">
                                <h3>Data Pengujian</h3>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 label-on-left">Pilih Barang</label>
                            <div class="col-md-9">
                                <div class="form-group label-floating">
                                    <input type="text" class="form-control" value="<?php echo $data->barang->petani->id . " | " .$data->barang->petani->nama . " | " . $data->barang->nama_barang; ?>" disabled>
                                    <span class="material-input"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 label-on-left">Hasil Pengujian</label>
                            <div class="col-md-6">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <select class="selectpicker" data-style="select-with-transition" name="hsl_pengujian" required>
                                        <option disabled>Pilih Hasil Pengujian</option>
                                        <option value="Diterima" <?php ($data->hsl_pengujian == 'Diterima' ? 'selected' : '') ?>>Diterima (Lolos)</option>
                                        <option value="Ditolak" <?php ($data->hsl_pengujian == 'Ditolak' ? 'selected' : '') ?>>Ditolak (Tidak Lolos)</option>
                                    </select>
                                <span class="material-input"></span></div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 label-on-left"></label>
                            <div class="col-md-9">
                                <h3>Harga</h3>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 label-on-left">Satuan Barang</label>
                            <div class="col-md-6">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <select class="selectpicker" data-style="select-with-transition" name="satuan_barang" required>
                                        <option disabled>Pilih Satuan</option>
                                        <option value="kg" selected>Kilogram (kg)</option>
                                    </select>
                                <span class="material-input"></span></div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 label-on-left">Harga Barang (kg)</label>
                            <div class="col-md-6">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input class="form-control" type="text" name="harga_barang" value="<?php echo $data->harga->harga_barang ?>" required>
                                <span class="material-input"></span></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="row">
                            <label class="col-md-2 label-on-left"></label>
                            <div class="col-md-10">
                                <h3>Catatan Pengujian</h3>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2 label-on-left">Isi Catatan</label>
                            <div class="col-md-10">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <textarea class="form-control" name="isi_catatan" rows="5"><?php echo htmlspecialchars($data->catatan->isi_catatan); ?></textarea>
                                <span class="material-input"></span></div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2 label-on-left">Status Catatan</label>
                            <div class="col-md-6">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <select class="selectpicker" data-style="select-with-transition" name="status">
                                        <option disabled>Pilih Status</option>
                                        <option value="0" <?php ($data->catatan->status == 0 ? 'selected' : '') ?>>Pending </option>
                                        <option value="1" <?php ($data->catatan->status == 1 ? 'selected' : '') ?>>Published</option>
                                    </select>
                                <span class="material-input"></span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group form-button text-center">
                            <button type="submit" class="btn btn-fill btn-rose">Tambah</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
        <!--  end card  -->
    </div>
    <!-- end col-md-12 -->
</div>