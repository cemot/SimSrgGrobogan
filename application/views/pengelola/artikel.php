<div class="header text-center">
    <h3 class="title">Artikel</h3>
</div>
<div class="row">
    <?php foreach($data as $artikel):?>
    <div class="col-sm-12 col-md-6">
        <div class="card">
            <div class="card-header text-center">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <img class="img-rounded" src="<?php echo base_url(); ?>assets/img/card-2.jpg">
                    </div>
                    <div class="col-md-2"></div>
                </div>
                <br>
                <h3 class="card-title"><?php echo $artikel->judul; ?></h3>
            </div>
            <div class="card-content">
                <?php 
                    // strip tags to avoid breaking any html
                    $string = strip_tags($artikel->isi);
                    $endPoint = false;
                    $limit = 275;
                    if (strlen($string) > $limit) {

                        // truncate string
                        $stringCut = substr($string, 0, $limit);
                        $endPoint = strrpos($stringCut, ' ');

                        //if the string doesn't contain any space then it will cut without word basis.
                        $string = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);
                        $string .= '...';
                    }
                    echo $string;
                ?>
            </div>
            <div class="card-footer" style="vertical-align: middle;">
                <div class="stats pull-left">
                    <p class="category"><?php echo date('d F Y',strtotime($artikel->tanggal)); ?> oleh <b><?php echo $artikel->penulis->nama; ?></b></p>
                </div>
                <div class="stats pull-right">
                    <?php if ($endPoint) : ?>
                    <p class="category">
                        <a class="btn btn-sm btn-rose btn-fill" href="<?php echo base_url('pengelola/artikel/'.$artikel->id_artikel); ?>">Read More</a>
                    </p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>