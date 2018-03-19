<!doctype html>
<html lang="en">

<head>
    <?php $this->load->view('layouts/head'); ?>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-active-color="rose" data-background-color="black" data-image="<?php echo base_url(); ?>assets/img/sidebar-1.jpg">
        <!--
            Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
            Tip 2: you can also add an image using data-image tag
            Tip 3: you can change the color of the sidebar with data-background-color="white | black"
        -->
            <div class="logo">
                <a href="<?php echo base_url(); ?>" class="simple-text logo-mini">
                    RG
                </a>
                <a href="<?php echo base_url(); ?>" class="simple-text logo-normal">
                    Kab. Grobogan
                </a>
            </div>
            <div class="sidebar-wrapper">
                <div class="user">
                    <div class="photo">
                        <img src="<?php echo base_url(); ?>assets/img/faces/avatar.jpg" />
                    </div>
                    <div class="info">
                        <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                            <span>
                                <?php echo $this->session->nama; ?>
                                <b class="caret"></b>
                            </span>
                        </a>
                        <div class="clearfix"></div>
                        <div class="collapse <?php if($this->uri->segment(2) == "profile"){ echo "in"; } ?>" id="collapseExample">
                            <ul class="nav">
                                <li class="<?php if($this->uri->segment(2) == "profile"){ echo "active"; } ?>">
                                    <?php if ($this->session->role == 0): ?>
                                        <a href="<?php echo base_url('admin/profile'); ?>">
                                    <?php elseif ($this->session->role == 1): ?>
                                        <a href="<?php echo base_url('pengelola/profile'); ?>">
                                    <?php elseif ($this->session->role == 2): ?>
                                        <a href="<?php echo base_url('dinas/profile'); ?>">
                                    <?php else : ?>
                                        <a href="<?php echo base_url('petani/profile'); ?>">
                                    <?php endif ?>
                                            <span class="sidebar-mini"> PS </span>
                                            <span class="sidebar-normal"> Profil saya </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="sidebar-mini"> UP </span>
                                        <span class="sidebar-normal"> Ubah Password </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php $this->load->view($sidebar); ?> 
            </div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <?php $this->load->view('layouts/navbar'); ?>
                </div>
            </nav>
            <div class="content">
                <div class="container-fluid">
                   <?php $this->load->view($content); ?> 
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <?php $this->load->view('layouts/footer'); ?>    
                </div>
            </footer>
        </div>
    </div>
</body>

<?php $this->load->view('layouts/script'); ?>    

</html>