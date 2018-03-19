<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="rose">
                <i class="material-icons">perm_identity</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Profil Saya
                    <!-- <small class="category">Complete your profile</small> -->
                </h4>
                <form method="post" action="<?php echo base_url('admin/profile/update'); ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group label-floating <?php (empty($user->username) || ($user->username == NULL))? 'is-empty' : '' ?>">
                                <label class="control-label">Username (disabled)</label>
                                <input type="text" class="form-control" disabled="" name="username" value="<?php echo $user->username; ?>">
                            <span class="material-input"></span></div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group label-floating <?php (empty($user->email) || ($user->email == NULL))? 'is-empty' : '' ?>">
                                <label class="control-label">Email address</label>
                                <input type="email" class="form-control" name="email" value="<?php echo $user->email; ?>">
                            <span class="material-input"></span></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group label-floating <?php (empty($user->nama) || ($user->nama == NULL))? 'is-empty' : '' ?>">
                                <label class="control-label">Nama</label>
                                <input type="text" class="form-control" name="nama" value="<?php echo $user->nama; ?>">
                            <span class="material-input"></span></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group label-floating <?php (empty($user->tmpt_lahir) || ($user->tmpt_lahir == NULL))? 'is-empty' : '' ?>">
                                <label class="control-label">Tempat Lahir</label>
                                <input type="text" class="form-control" name="tmpt_lahir" value="<?php echo $user->tmpt_lahir; ?>">
                            <span class="material-input"></span></div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group label-floating <?php (empty($user->tgl_lahir) || ($user->tgl_lahir == NULL))? 'is-empty' : '' ?>">
                                <label class="control-label">Tanggal Lahir</label>
                                <input type="date" class="form-control datepicker" name="tgl_lahir" value="<?php echo $user->tgl_lahir; ?>">
                            <span class="material-input"></span></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group label-floating <?php (empty($user->no_tlp) || ($user->no_tlp == NULL))? 'is-empty' : '' ?>">
                                <label class="control-label">No Telepon</label>
                                <input type="text" class="form-control" name="no_tlp" value="<?php echo $user->no_tlp; ?>" required>
                            <span class="material-input"></span></div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group label-floating <?php (empty($user->alamat) || ($user->alamat == NULL))? 'is-empty' : '' ?>">
                                <label class="control-label">Alamat</label>
                                <input type="text" class="form-control" name="alamat" value="<?php echo $user->alamat; ?>">
                            <span class="material-input"></span></div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <button type="submit" class="btn btn-rose pull-right">Update Profile</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>