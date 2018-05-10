<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="rose">
                <i class="material-icons">description</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Perpanjangan Resi Gudang</h4>
                <div class="row">
                    <form class="form-horizontal" method="post" action="<?php echo base_url('pengelola/resi/perpanjang/store'); ?>">
                    <input type="hidden" class="form-control" name="id_resi" value="<?php echo $data->id_resi ?>" required>
                    <input type="hidden" class="form-control" name="id_perpanjangan" value="<?php echo $id_perpanjangan ?>" required>
                    <div class="row">
                        <label class="col-md-2 label-on-left">No Resi</label>
                        <div class="col-md-10">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <input type="text" class="form-control" name="no_resi" value="<?php echo $data->no_resi ?>" readonly>
                            <span class="material-input"></span></div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2 label-on-left">Masa Perpanjangan</label>
                        <div class="col-md-4">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <select class="selectpicker" data-style="select-with-transition" id="masa_aktif" name="masa_aktif" required="">
                                    <option disabled>Pilih Satuan</option>
                                    <?php
                                        $masa_aktif = [3,6,9,12,15,18];
                                        foreach ($masa_aktif as $masa_aktif) :
                                    ?>
                                     <option value="<?php echo $masa_aktif ?>">
                                        <?php echo $masa_aktif.' Bulan' ;?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            <span class="material-input"></span></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group form-button text-center">
                            <button type="submit" class="btn btn-fill btn-rose">Perpanjang</button>
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
