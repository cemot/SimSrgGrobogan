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
    <li class="<?php if($this->uri->segment(2) == "pengajuan"){ echo "active"; } ?>">
        <a data-toggle="collapse" href="#catpengajuan">
            <i class="material-icons">description</i>
            <p> Pengajuan Barang
                <b class="caret"></b>
            </p>
        </a>
        <div class="collapse <?php if($this->uri->segment(2) == "pengajuan"){ echo "in"; } ?>" id="catpengajuan">
            <ul class="nav">
                <li class="<?php if($this->uri->segment(2) == "pengajuan" && (empty($this->uri->segment(3)) || $this->uri->segment(3) == "edit")){ echo "active"; } ?>">
                    <a href="<?php echo base_url('petani/pengajuan'); ?>">
                        <span class="sidebar-mini"> DP </span>
                        <span class="sidebar-normal"> Daftar Pengajuan</span>
                    </a>
                </li>
                <li class="<?php if($this->uri->segment(2) == "pengajuan" && $this->uri->segment(3) == "create"){ echo "active"; } ?>">
                    <a href="<?php echo base_url('petani/pengajuan/create'); ?>">
                        <span class="sidebar-mini"><i class="material-icons">add</i></span>
                        <span class="sidebar-normal"> Tambah Pengajuan </span>
                    </a>
                </li>
            </ul>
        </div>
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
