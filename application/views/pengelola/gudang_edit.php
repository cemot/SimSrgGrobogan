<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="rose">
                <i class="material-icons">books</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Ubah Gudang</h4>
                <form class="form-horizontal" method="post" action="<?php echo base_url('pengelola/gudang/update'); ?>">
                    <div class="row">
                        <input type="hidden" class="form-control" name="id_gudang" value="<?php echo $gudang->id_gudang; ?>" required>
                        <label class="col-md-2 label-on-left">Nama Gudang</label>
                        <div class="col-md-10">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <input type="text" class="form-control" name="nama" value="<?php echo $gudang->nama; ?>" required>
                            <span class="material-input"></span></div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2 label-on-left">Kapasitas (kg)</label>
                        <div class="col-md-2">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <input type="number" class="form-control" name="kapasitas" min="1" value="<?php echo $gudang->kapasitas; ?>" required>
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