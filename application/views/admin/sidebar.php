<ul class="nav">
    <li class="<?php if($this->uri->segment(2) == "dashboard"){ echo "active"; } ?>">
        <a href="<?php echo base_url('admin/dashboard'); ?>">
            <i class="material-icons">dashboard</i>
            <p> Dashboard </p>
        </a>
    </li>
    <li class="<?php if($this->uri->segment(2) == "komoditi"){ echo "active"; } ?>">
        <a data-toggle="collapse" href="#komoditi">
            <i class="material-icons">pages</i>
            <p> Komoditi Barang
                <b class="caret"></b>
            </p>
        </a>
        <div class="collapse <?php if($this->uri->segment(2) == "komoditi"){ echo "in"; } ?>" id="komoditi">
            <ul class="nav">
                <li class="<?php if($this->uri->segment(2) == "komoditi" && (empty($this->uri->segment(3)) || $this->uri->segment(3) == "edit")){ echo "active"; } ?>">
                    <a href="<?php echo base_url('admin/komoditi'); ?>">
                        <span class="sidebar-mini"> DK </span>
                        <span class="sidebar-normal"> Daftar Komoditi </span>
                    </a>
                </li>
                <li class="<?php if($this->uri->segment(2) == "komoditi" && $this->uri->segment(3) == "create"){ echo "active"; } ?>">
                    <a href="<?php echo base_url('admin/komoditi/create'); ?>">
                        <span class="sidebar-mini"><i class="material-icons">add</i></span>
                        <span class="sidebar-normal"> Tambah Komoditi </span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
    <li class="<?php if($this->uri->segment(2) == "artikel"){ echo "active"; } ?>">
        <a data-toggle="collapse" href="#artikel">
            <i class="material-icons">pages</i>
            <p> Artikel
                <b class="caret"></b>
            </p>
        </a>
        <div class="collapse <?php if($this->uri->segment(2) == "artikel"){ echo "in"; } ?>" id="artikel">
            <ul class="nav">
                <li class="<?php if($this->uri->segment(2) == "artikel" && (empty($this->uri->segment(3)) || $this->uri->segment(3) == "edit")){ echo "active"; } ?>">
                    <a href="<?php echo base_url('admin/artikel'); ?>">
                        <span class="sidebar-mini"> DA </span>
                        <span class="sidebar-normal"> Daftar Artikel </span>
                    </a>
                </li>
                <li class="<?php if($this->uri->segment(2) == "artikel" && $this->uri->segment(3) == "create"){ echo "active"; } ?>">
                    <a href="<?php echo base_url('admin/artikel/create'); ?>">
                        <span class="sidebar-mini"><i class="material-icons">add</i></span>
                        <span class="sidebar-normal"> Tambah Artikel </span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
    <li class="<?php if($this->uri->segment(2) == "user"){ echo "active"; } ?>">
        <a data-toggle="collapse" href="#user">
            <i class="material-icons">widgets</i>
            <p> Managemen User
                <b class="caret"></b>
            </p>
        </a>
        <div class="collapse <?php if($this->uri->segment(2) == "user"){ echo "in"; } ?>" id="user">
            <ul class="nav">
                <li class="<?php if($this->uri->segment(2) == "user" && (empty($this->uri->segment(3)) || $this->uri->segment(3) == "edit")){ echo "active"; } ?>">
                    <a href="<?php echo base_url('admin/user'); ?>">
                        <span class="sidebar-mini"> DU </span>
                        <span class="sidebar-normal"> Daftar User</span>
                    </a>
                </li>
                <li class="<?php if($this->uri->segment(2) == "user" && $this->uri->segment(3) == "create"){ echo "active"; } ?>">
                    <a href="<?php echo base_url('admin/user/create'); ?>">
                        <span class="sidebar-mini"><i class="material-icons">add</i></span>
                        <span class="sidebar-normal"> Tambah User </span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
</ul>