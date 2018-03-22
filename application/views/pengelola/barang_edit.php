<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="rose">
                <i class="material-icons">books</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Edit Pengajuan Barang</h4>
                <form class="form-horizontal" method="post" action="<?php echo base_url('pengelola/barang/update'); ?>">
                    <div class="row">
                        <label class="col-md-2 label-on-left">Nama Barang</label>
                        <div class="col-md-10">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <input type="text" class="form-control" name="nama_barang" value="<?php echo $data->nama_barang; ?>" required>
                            <span class="material-input"></span></div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2 label-on-left">Jenis Barang</label>
                        <div class="col-md-3">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <select class="selectpicker" data-style="select-with-transition" name="jenis_barang" required>
                                    <option disabled>Pilih Jenis Barang</option>
                                    <?php $jenis = ['Beras', 'Jagung', 'Gabah'];
                                        foreach ($jenis as $jenis) : ?>
                                            <option value="<?php echo $jenis; ?>" <?php ($data->barang == $jenis ? 'selected' : '') ?>><?php echo $jenis; ?></option>
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
                                <input type="number" class="form-control" name="berat_barang" min="1" max="1500" value="<?php echo $data->berat_barang; ?>" required>
                            <span class="material-input"></span></div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2 label-on-left">Pemilik Barang (Petani) <?php echo $data->id_petani ?></label>
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <select class="form-control select2" data-style="select-with-transition" name="id_petani" required>
                                    <option disabled>Pilih Petani</option>
                                    <?php foreach ($petani as $petani): ?>
                                        <option value="<?php echo $petani->id ?>" <?php ($petani->id == $data->id_petani ? 'selected' : '') ?>>
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