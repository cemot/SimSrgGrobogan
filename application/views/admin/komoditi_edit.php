<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="rose">
                <i class="material-icons">books</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Ubah Jenis Komoditi</h4>
                <form class="form-horizontal" method="post" action="<?php echo base_url('admin/komoditi/update'); ?>">
                    <input type="hidden" class="form-control" name="id_komoditi" value="<?php echo $komoditi->id_komoditi; ?>" required>
                    <div class="row">
                        <label class="col-md-2 label-on-left">Nama Komoditi</label>
                        <div class="col-md-10">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <input type="text" class="form-control" name="nama_komoditi" value="<?php echo $komoditi->nama_komoditi; ?>" required>
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