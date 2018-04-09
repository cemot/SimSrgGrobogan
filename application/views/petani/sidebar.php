<ul class="nav">
    <li class="<?php if($this->uri->segment(2) == "dashboard"){ echo "active"; } ?>">
        <a href="<?php echo base_url('petani/dashboard'); ?>">
            <i class="material-icons">dashboard</i>
            <p> Dashboard </p>
        </a>
    </li>
    <li class="<?php if($this->uri->segment(2) == "artikel"){ echo "active"; } ?>">
        <a href="<?php echo base_url('petani/artikel'); ?>">
            <i class="material-icons">dashboard</i>
            <p> Artikel </p>
        </a>
    </li>
    <li class="<?php if($this->uri->segment(2) == "komoditi"){ echo "active"; } ?>">
        <a href="<?php echo base_url('petani/komoditi'); ?>">
            <i class="material-icons">dashboard</i>
            <p> Daftar Harga Komoditi </p>
        </a>
    </li>
    <li class="<?php if($this->uri->segment(2) == "pengujian"){ echo "active"; } ?>">
        <a href="<?php echo base_url('petani/pengujian'); ?>">
            <i class="material-icons">dashboard</i>
            <p> Data Hasil Pengujian </p>
        </a>
    </li>
    <li class="<?php if($this->uri->segment(2) == "resi"){ echo "active"; } ?>">
        <a href="<?php echo base_url('petani/resi'); ?>">
            <i class="material-icons">dashboard</i>
            <p> Data Resi Gudang </p>
        </a>
    </li>
</ul>
