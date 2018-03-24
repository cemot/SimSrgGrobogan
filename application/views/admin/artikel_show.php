<div class="header text-center">
    <h3 class="title"><?php echo $artikel->judul; ?></h3>
    <h7>
        <p class="category"><?php echo date('d F Y',strtotime($artikel->tanggal)); ?> oleh <b><?php echo $artikel->penulis->nama; ?></b></p>
    </h7>
</div>
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <div class="card">
            <div class="card-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <img class="img-rounded" src="<?php echo base_url(); ?>assets/img/card-2.jpg">
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                            <br>
                            <div class="row">
                                <?php echo $artikel->isi; ?>
                            </div>                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-1"></div>
</div>