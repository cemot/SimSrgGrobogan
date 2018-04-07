<ul class="nav">
    <li class="<?php if($this->uri->segment(2) == "dashboard"){ echo "active"; } ?>">
        <a href="<?php echo base_url('pengelola/dashboard'); ?>">
            <i class="material-icons">dashboard</i>
            <p> Dashboard </p>
        </a>
    </li>
    <li class="<?php if($this->uri->segment(2) == "artikel"){ echo "active"; } ?>">
        <a href="<?php echo base_url('pengelola/artikel'); ?>">
            <i class="material-icons">dashboard</i>
            <p> Artikel </p>
        </a>
    </li>
    <li class="<?php if($this->uri->segment(2) == "gudang"){ echo "active"; } ?>">
        <a data-toggle="collapse" href="#datagudang">
            <i class="material-icons">book</i>
            <p> Data Gudang
                <b class="caret"></b>
            </p>
        </a>
        <div class="collapse <?php if($this->uri->segment(2) == "gudang"){ echo "in"; } ?>" id="datagudang">
            <ul class="nav">
                <li class="<?php if($this->uri->segment(2) == "gudang" && (empty($this->uri->segment(3)) || $this->uri->segment(3) == "edit" || $this->uri->segment(3) == "detail")){ echo "active"; } ?>">
                    <a href="<?php echo base_url('pengelola/gudang'); ?>">
                        <span class="sidebar-mini"> DG </span>
                        <span class="sidebar-normal"> Daftar Gudang </span>
                    </a>
                </li>
                <li class="<?php if($this->uri->segment(2) == "gudang" && $this->uri->segment(3) == "create"){ echo "active"; } ?>">
                    <a href="<?php echo base_url('pengelola/gudang/create'); ?>">
                        <span class="sidebar-mini"><i class="material-icons">add</i></span>
                        <span class="sidebar-normal"> Tambah Gudang</span>
                    </a>
                </li>
            </ul>
        </div>
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
                    <a href="<?php echo base_url('pengelola/pengajuan'); ?>">
                        <span class="sidebar-mini"> DP </span>
                        <span class="sidebar-normal"> Daftar Pengajuan</span>
                    </a>
                </li>
                <li class="<?php if($this->uri->segment(2) == "pengajuan" && $this->uri->segment(3) == "create"){ echo "active"; } ?>">
                    <a href="<?php echo base_url('pengelola/pengajuan/create'); ?>">
                        <span class="sidebar-mini"><i class="material-icons">add</i></span>
                        <span class="sidebar-normal"> Tambah Pengajuan </span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
    <li class="<?php if($this->uri->segment(2) == "pengujian"){ echo "active"; } ?>">
        <a data-toggle="collapse" href="#catpengujian">
            <i class="material-icons">description</i>
            <p> Data Pengujian
                <b class="caret"></b>
            </p>
        </a>
        <div class="collapse <?php if($this->uri->segment(2) == "pengujian"){ echo "in"; } ?>" id="catpengujian">
            <ul class="nav">
                <li class="<?php if($this->uri->segment(2) == "pengujian" && (empty($this->uri->segment(3)) || $this->uri->segment(3) == "edit" || $this->uri->segment(3) == "detail")){ echo "active"; } ?>">
                    <a href="<?php echo base_url('pengelola/pengujian'); ?>">
                        <span class="sidebar-mini"> DC </span>
                        <span class="sidebar-normal"> Daftar Pengujian</span>
                    </a>
                </li>
                <li class="<?php if($this->uri->segment(2) == "pengujian" && $this->uri->segment(3) == "create"){ echo "active"; } ?>">
                    <a href="<?php echo base_url('pengelola/pengujian/create'); ?>">
                        <span class="sidebar-mini"><i class="material-icons">add</i></span>
                        <span class="sidebar-normal"> Tambah Pengujian </span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
    <li class="<?php if($this->uri->segment(2) == "resi"){ echo "active"; } ?>">
        <a data-toggle="collapse" href="#resigd">
            <i class="material-icons">receipt</i>
            <p> Resi Gudang
                <b class="caret"></b>
            </p>
        </a>
        <div class="collapse <?php if($this->uri->segment(2) == "resi"){ echo "in"; } ?>" id="resigd">
            <ul class="nav">
                <li class="<?php if($this->uri->segment(2) == "resi" && (empty($this->uri->segment(3)) || $this->uri->segment(3) == "edit")){ echo "active"; } ?>">
                    <a href="<?php echo base_url('pengelola/resi'); ?>">
                        <span class="sidebar-mini"> DR </span>
                        <span class="sidebar-normal"> Daftar Resi</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
    <li class="<?php if($this->uri->segment(2) == "komoditi"){ echo "active"; } ?>">
        <a data-toggle="collapse" href="#hrgkomoditi">
            <i class="material-icons">local_offer</i>
            <p> Data Komoditi
                <b class="caret"></b>
            </p>
        </a>
        <div class="collapse <?php if($this->uri->segment(2) == "komoditi"){ echo "in"; } ?>" id="hrgkomoditi">
            <ul class="nav">
                <li class="<?php if($this->uri->segment(2) == "komoditi" && (empty($this->uri->segment(3)) || $this->uri->segment(3) == "edit")){ echo "active"; } ?>">
                    <a href="<?php echo base_url('pengelola/komoditi'); ?>">
                        <span class="sidebar-mini"> DHK </span>
                        <span class="sidebar-normal"> Daftar Harga Komoditi</span>
                    </a>
                </li>
                <li class="<?php if($this->uri->segment(2) == "komoditi" && $this->uri->segment(3) == "create_harga"){ echo "active"; } ?>">
                    <a href="<?php echo base_url('pengelola/komoditi/create_harga'); ?>">
                        <span class="sidebar-mini"> + </span>
                        <span class="sidebar-normal"> Tambah Harga Komoditi </span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
    <!-- <li>
        <a data-toggle="collapse" href="#laporangd">
            <i class="material-icons">chrome_reader_mode</i>
            <p> Laporan Gudang
                <b class="caret"></b>
            </p>
        </a>
        <div class="collapse" id="laporangd">
            <ul class="nav">
                <li>
                    <a href="#">
                        <span class="sidebar-mini"> DL </span>
                        <span class="sidebar-normal"> Daftar Laporan</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="sidebar-mini"> + </span>
                        <span class="sidebar-normal"> Tambah Laporan </span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
    <li>
        <a data-toggle="collapse" href="#rekapHU">
            <i class="material-icons">assignment</i>
            <p> Rekapitulasi Hasil Uji
                <b class="caret"></b>
            </p>
        </a>
        <div class="collapse" id="rekapHU">
            <ul class="nav">
                <li>
                    <a href="#">
                        <span class="sidebar-mini"> DR </span>
                        <span class="sidebar-normal"> Daftar Rekapitulasi</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="sidebar-mini"> + </span>
                        <span class="sidebar-normal"> Tambah User </span>
                    </a>
                </li>
            </ul>
        </div>
    </li> -->
</ul>
