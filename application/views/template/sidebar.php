<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
      <img src="<?=base_url('assets/template')?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Cordoba Store</span>
    </a>

    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=base_url('assets/template')?>/dist/img/user3-128x128.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Administrator</a>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
                <a href="<?= base_url('dashboard')?>" class="nav-link <?php if($this->uri->segment(1) == 'dashboard') echo 'active'?>">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Dashboard
                </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-solid fa-laptop"></i>
                <p>
                    E Commerce
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Setting</p>
                    </a>
                </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link <?php if($this->uri->segment(1) == 'reseller' or $this->uri->segment(1) == 'kategori' or $this->uri->segment(1) == 'detail_reseller' or $this->uri->segment(1) == 'umum' or $this->uri->segment(1) == 'detail_umum') echo 'active'?> ">
                <i class="nav-icon fas fa-solid fa-book"></i>
                <p>
                    Produk
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?= base_url('kategori')?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Kategori</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('reseller')?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Reseller</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('detail_reseller')?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Detail Reseller</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('umum')?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Umum</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('detail_umum')?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Detail Umum</p>
                    </a>
                </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link <?php if($this->uri->segment(1) == 'hh' or $this->uri->segment(1) == 'pos_reseller') echo 'active'?> ">
                <i class="nav-icon fas fa-solid fa-cash-register"></i>
                <p>
                    Pos
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?= base_url('pos_umum')?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Umum</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('pos_reseller')?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Reseller</p>
                    </a>
                </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="<?= base_url('faktur')?>" class="nav-link <?php if($this->uri->segment(1) == 'faktur') echo 'active'?>">
                <i class="nav-icon fas fa-print"></i>
                <p>
                    Faktur
                </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="<?= base_url('laporan')?>" class="nav-link <?php if($this->uri->segment(1) == 'laporan') echo 'active'?>">
                
                <i class="nav-icon fas fa-print"></i>
                <p>
                    Laporan Belanja
                </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="<?= base_url('auth/logout')?>" class="nav-link">
                <i class="nav-icon fas fa-solid fa-door-open"></i>
                <p>
                    Logout
                </p>
                </a>
            </li>
        </ul>
      </nav>
    </div>
  </aside>

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?= $title?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?= $title?></li>
            </ol>
          </div>
        </div>

      
    
        