<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="rose">
                <i class="material-icons">books</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Tambah Harga Komoditi</h4>
                <form class="form-horizontal" method="post" action="<?php echo base_url('pengelola/komoditi/store_harga'); ?>">
                    <div class="row">
                        <label class="col-md-2 label-on-left">Komoditi</label>
                        <div class="col-md-10">
                            <div class="form-group label-floating">
                                <select class="form-control select2" data-style="select-with-transition" name="id_komoditi" required>
                                    <option disabled selected>Pilih Komoditi</option>
                                    <?php foreach ($data as $komoditi): ?>
                                        <option value="<?php echo $komoditi->id_komoditi ?>">
                                            <?php echo $komoditi->nama_komoditi; ?>        
                                        </option>
                                    <?php endforeach ;?>
                                </select>
                                <span class="material-input"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2 label-on-left">Tanggal</label>
                        <div class="col-md-10">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <input type="text" class="form-control datepicker" name="tanggal"/>
                            <span class="material-input"></span></div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2 label-on-left">Harga</label>
                        <div class="col-md-10">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <input type="number" class="form-control" name="harga" min="0" required>
                            <span class="material-input"></span></div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2 label-on-left">Keterangan</label>
                        <div class="col-md-10">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <input type="text" class="form-control" name="keterangan" min="0" required>
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
    <div class="col-md-3"></div>
    <!-- end col-md-12 -->
</div>