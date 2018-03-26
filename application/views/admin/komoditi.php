<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="purple">
                <i class="material-icons">book</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Daftar Jenis Komoditi</h4>
                <div class="toolbar">
                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                </div>
                <div class="material-datatables">
                    <table class="table table-striped table-no-bordered table-hover datatables" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Komoditi</th>
                                <th>Created by</th>
                                <th>Updated by</th>
                                <th>Last Update</th>
                                <th class="disabled-sorting text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                foreach ($data as $komoditi): ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $komoditi->nama_komoditi ?></td>
                                        <td><?php echo $komoditi->buat->nama ?></td>
                                        <td><?php if($komoditi->ubah){ echo $komoditi->ubah->nama;} ?></td>
                                        <td><?php echo $komoditi->updated_at ?></td>
                                        <td class="td-actions text-right">
                                            <!-- <a class="btn btn-info" href="<?php echo base_url('admin/komoditi/show/'.$komoditi->id_komoditi); ?>"><i class="material-icons">assignment</i> Detail</a> -->
                                            <a class="btn btn-success" href="<?php echo base_url('admin/komoditi/edit/'.$komoditi->id_komoditi); ?>"><i class="material-icons">mode_edit</i> Ubah</a>
                                            <a class="btn btn-danger" href="<?php echo base_url('admin/komoditi/delete/'.$komoditi->id_komoditi); ?>"><i class="material-icons">close</i> Hapus</a>
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