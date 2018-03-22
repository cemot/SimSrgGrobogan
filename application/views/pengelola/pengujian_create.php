<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="rose">
                <i class="material-icons">description</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Tambah Pengujian</h4>
                <form class="form-horizontal" method="post" action="<?php echo base_url('pengelola/gudang/store'); ?>">
                    <div class="row">
                        <label class="col-md-2 label-on-left"></label>
                        <div class="col-md-10">
                            <h3>Data Pengujian</h3>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2 label-on-left">Barang</label>
                        <div class="col-md-10">
                            <div class="form-group label-floating">
                                <select class="form-control select2" data-style="select-with-transition" name="id_barang" required>
                                    <option disabled selected>Pilih Barang</option>
                                    <?php foreach ($data as $barang): ?>
                                        <option value="<?php echo $barang->id_barang ?>">
                                            <?php echo $barang->petani->id . " | " .$barang->petani->nama . " | " . $barang->nama_barang; ?>        
                                        </option>
                                    <?php endforeach ;?>
                                </select>
                                <span class="material-input"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2 label-on-left">Hasil Pengujian</label>
                        <div class="col-md-10">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <textarea class="form-control" name="hsl_pengujian" rows="10" required></textarea>
                                <span class="material-input"></span>
                            </div>
                        </div>
                    </div>
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
                                <textarea class="form-control" name="isi_catatan" rows="10" required></textarea>
                            <span class="material-input"></span></div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2 label-on-left">Status Catatan</label>
                        <div class="col-md-3">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <select class="selectpicker" data-style="select-with-transition">
                                    <option selected disabled>Pilih Status</option>
                                    <option value="2">Pending </option>
                                    <option value="3">Published</option>
                                </select>
                            <span class="material-input"></span></div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2 label-on-left"></label>
                        <div class="col-md-10">
                            <h3>Harga</h3>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2 label-on-left">Satuan Barang</label>
                        <div class="col-md-3">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <select class="selectpicker" data-style="select-with-transition" required>
                                    <option selected disabled>Pilih Satuan</option>
                                    <option value="kg">Kilogram (kg)</option>
                                </select>
                            <span class="material-input"></span></div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2 label-on-left">Jenis Barang</label>
                        <div class="col-md-3">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <select class="selectpicker" data-style="select-with-transition" name="jenis_barang" required>
                                    <option selected disabled>Pilih Jenis Barang</option>
                                    <option value="Beras">Beras</option>
                                    <option value="Jagung">Jagung</option>
                                    <option value="Gabah">Gabah</option>
                                </select>
                            <span class="material-input"></span></div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2 label-on-left">Harga Barang</label>
                        <div class="col-md-3">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <input class="form-control" type="number" name="harga_barang" placeholder="8000" required>
                            <span class="material-input"></span></div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2"></label>
                        <div class="col-md-10">
                            <div class="form-group form-button text-center">
                                <button type="submit" class="btn btn-fill btn-rose">Tambah</button>
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