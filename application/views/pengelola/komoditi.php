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
                                <th>Created at</th>
                                <th>Last Update</th>
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
                                        <td><?php echo date("d F Y", strtotime($komoditi->created_at)) ?></td>
                                        <td><?php echo date("d F Y", strtotime($komoditi->updated_at)) ?></td>
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