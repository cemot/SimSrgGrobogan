<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="rose">
                <i class="material-icons">assignment</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Ubah Artikel</h4>
                <form class="form-horizontal" method="post" action="<?php echo base_url('admin/artikel/update'); ?>" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" name="id_artikel" value="<?php echo $artikel->id_artikel; ?>" required>
                    <div class="row">
                        <label class="col-md-2 label-on-left">Judul</label>
                        <div class="col-md-10">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <input type="text" class="form-control" name="judul" value="<?php echo $artikel->judul; ?>" required>
                            <span class="material-input"></span></div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2 label-on-left">Isi</label>
                        <div class="col-md-10">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <textarea class="form-control" rows="10" name="isi" required><?php echo $artikel->isi; ?></textarea>
                            <span class="material-input"></span></div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2 label-on-left">Gambar</label>
                        <div class="col-md-4 col-sm-4">
                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                <div class="fileinput-new thumbnail">
                                    <img src="<?php echo base_url('assets/img/uploads/').$artikel->gambar ?>">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                <div>
                                    <span class="btn btn-rose btn-round btn-file">
                                        <span class="fileinput-new">Pilih Gambar</span>
                                        <span class="fileinput-exists">Ubah</span>
                                        <input type="file" name="gambar" />
                                    </span>
                                    <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2 label-on-left">Status</label>
                        <div class="col-md-10">
                            <div class="col-md-4">
                                <select class="selectpicker" data-style="btn btn-primary btn-round" data-size="4" name="status" required>
                                    <option disabled>Choose Status</option>
                                    <option value="0" <?php if($artikel->status == 0) { echo 'selected'; } ?> >Pending</option>
                                    <option value="1" <?php if($artikel->status == 1) { echo 'selected'; } ?> >Published</option>
                                </select>
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
