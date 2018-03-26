<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="rose">
                <i class="material-icons">books</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Tambah Pengajuan Barang</h4>
                <form class="form-horizontal" method="post" action="<?php echo base_url('pengelola/barang/store'); ?>">
                    <div class="row">
                        <label class="col-md-2 label-on-left">Nama Barang</label>
                        <div class="col-md-10">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <input type="text" class="form-control" name="nama_barang" value="<?php echo set_value('_barang'); ?>" required>
                            <span class="material-input"></span></div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2 label-on-left">Jenis Barang</label>
                        <div class="col-md-3">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <select class="selectpicker" data-style="select-with-transition" name="id_komoditi" required>
                                    <option selected disabled>Pilih Jenis Barang</option>
                                    <?php foreach ($komoditi as $komoditi): ?>
                                        <option value="<?php echo $komoditi->id_komoditi ?>">
                                            <?php echo $komoditi->nama_komoditi ?>        
                                        </option>
                                    <?php endforeach ;?>
                                </select>
                            <span class="material-input"></span></div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2 label-on-left">Berat Barang (kg)</label>
                        <div class="col-md-2">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <input type="number" class="form-control" name="berat_barang" min="1" max="1500" value="1" required>
                            <span class="material-input"></span></div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2 label-on-left">Pemilik Barang (Petani)</label>
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <select class="form-control select2" data-style="select-with-transition" name="id_petani" required>
                                    <option disabled selected>Pilih Petani</option>
                                    <?php foreach ($data as $petani): ?>
                                        <option value="<?php echo $petani->id ?>">
                                            <?php echo $petani->id . " | " . $petani->nama ?>        
                                        </option>
                                    <?php endforeach ;?>
                                </select>
                                <span class="material-input"></span>
                            </div>
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