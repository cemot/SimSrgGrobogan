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
                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
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
                                        <td><?php echo $artikel->isi ?></td>
                                        <td><?php echo $artikel->status ?></td>
                                        <td class="text-right">
                                            <!-- <a href="#" class="btn btn-simple btn-info btn-icon like"><i class="material-icons">favorite</i></a> -->
                                            <a href="<?php echo base_url('admin/artikel/edit/'.$artikel->id_artikel); ?>" class="btn btn-simple btn-warning btn-icon edit"><i class="material-icons">mode_edit</i></a>
                                            <a href="<?php echo base_url('admin/artikel/delete/'.$artikel->id_artikel); ?>" class="btn btn-simple btn-danger btn-icon remove"><i class="material-icons">close</i></a>
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