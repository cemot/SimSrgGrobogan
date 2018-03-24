<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="purple">
                <i class="material-icons">assignment</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Daftar Artikel</h4>
                <div class="toolbar">
                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                </div>
                <div class="material-datatables">
                    <table class="table table-striped table-no-bordered table-hover datatables" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Judul</th>
                                <th>Isi</th>
                                <th>Status</th>
                                <th class="disabled-sorting text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($data as $artikel):?>
                                    <tr>
                                        <td><?php echo $artikel->id_artikel ?></td>
                                        <td><?php echo $artikel->judul ?></td>
                                        <td>
                                            <?php echo substr(htmlspecialchars(strip_tags($artikel->isi)), 0, 70); ?>
                                        </td>
                                        <td>
                                            <span class="label label-<?php if($artikel->status == 0){ echo 'default';} else { echo 'success';} ?>"><?php if($artikel->status == 0){ echo 'Pending';} else { echo 'Published';} ?></span>
                                        </td>

                                        <td class="td-actions text-right">
                                            <a href="<?php echo base_url('admin/artikel/'.$artikel->id_artikel); ?>" class="btn btn-info"><i class="material-icons">assignment</i> Lihat</a>
                                            <a href="<?php echo base_url('admin/artikel/edit/'.$artikel->id_artikel); ?>" class="btn btn-warning"><i class="material-icons">mode_edit</i> Ubah</a>
                                            <a href="<?php echo base_url('admin/artikel/delete/'.$artikel->id_artikel); ?>" class="btn btn-danger"><i class="material-icons">close</i> Hapus</a>
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