<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="purple">
                <i class="material-icons">people</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Daftar User</h4>
                <div class="toolbar">
                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                </div>
                <div class="material-datatables">
                    <table class="table table-striped table-no-bordered table-hover datatables" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Role</th>
                                <th>Username</th>
                                <th>Nama</th>
                                <th>No Telepon</th>
                                <th class="disabled-sorting text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $level = ['Administrator', 'Pengelola', 'Dinas', 'Bank', 'Petani'];
                                $no = 1;
                                foreach ($data as $user):?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $level[$user->role] ?></td>
                                        <td><?php echo $user->username ?></td>
                                        <td><?php echo $user->nama ?></td>
                                        <td><?php echo $user->no_tlp ?></td>
                                        <td class="text-right">
                                            <a href="#" class="btn btn-simple btn-info btn-icon like"><i class="material-icons">favorite</i></a>
                                            <a href="<?php echo base_url('admin/user/edit/'.$user->id); ?>" class="btn btn-simple btn-warning btn-icon edit"><i class="material-icons">mode_edit</i></a>
                                            <a href="<?php echo base_url('admin/user/delete/'.$user->id); ?>" class="btn btn-simple btn-danger btn-icon remove"><i class="material-icons">close</i></a>
                                        </td>
                                    </tr>
                            <?php endforeach ;?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end content-->
        </div>
        <!--  end card  -->
    </div>
    <!-- end col-md-12 -->
</div>
