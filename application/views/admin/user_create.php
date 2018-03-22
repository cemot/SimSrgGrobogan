<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="rose">
                <i class="material-icons">perm_identity</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Tambah User
                    <!-- <small class="category">Complete your profile</small> -->
                </h4>
                <form method="post" action="<?php echo base_url('admin/user/store'); ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label">Username</label>
                                <input type="text" class="form-control error" name="username" value="<?php echo set_value('username'); ?>" required>
                            <span class="material-input"></span></div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label">Email address</label>
                                <input type="email" class="form-control" name="email" value="<?php echo set_value('email'); ?>" required>
                            <span class="material-input"></span></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label">Password</label>
                                <input type="password" class="form-control" name="password" required>
                            <span class="material-input"></span></div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label">Konfirmasi Password</label>
                                <input type="password" class="form-control" name="password_confirm" required>
                            <span class="material-input"></span></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label">Nama</label>
                                <input type="text" class="form-control" name="nama" value="<?php echo set_value('nama'); ?>" required>
                            <span class="material-input"></span></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label">Tempat Lahir</label>
                                <input type="text" class="form-control" name="tmpt_lahir" value="<?php echo set_value('tmpt_lahir'); ?>" required>
                            <span class="material-input"></span></div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label">Tanggal Lahir</label>
                                <input type="date" class="form-control datepicker" name="tgl_lahir" value="<?php echo set_value('tgl_lahir'); ?>" required>
                            <span class="material-input"></span></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label">No Telepon</label>
                                <input type="text" class="form-control" name="no_tlp" value="<?php echo set_value('no_tlp'); ?>" required>
                            <span class="material-input"></span></div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label">Alamat</label>
                                <input type="text" class="form-control" name="alamat" value="<?php echo set_value('alamat'); ?>" required>
                            <span class="material-input"></span></div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2">Role</label>
                        <div class="col-md-10">
                            <div class="col-md-4">
                                <select class="selectpicker" data-style="btn btn-primary btn-round" title="Single Select" data-size="7">
                                    <option selected disabled>Pilih Role</option>
                                    <option value="0">Admin</option>
                                    <option value="1">Pengelola</option>
                                    <option value="2">Dinas</option>
                                    <option value="3">Bank</option>
                                    <option value="4">Petani</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2 label-on-left">Role</label>
                        <div class="col-md-3">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <select class="selectpicker" data-style="select-with-transition" name="role" required>
                                    <option selected disabled>Pilih Role</option>
                                    <option value="0">Admin</option>
                                    <option value="1">Pengelola</option>
                                    <option value="2">Dinas</option>
                                    <option value="3">Bank</option>
                                    <option value="4">Petani</option>
                                </select>
                            <span class="material-input"></span></div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <button type="submit" class="btn btn-rose pull-right">Tambah User</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>