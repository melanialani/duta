		<!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url(); ?>">DUTA GAME SURABAYA - ADMIN</a>
            </div>
            
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle">
                        <i class="fa fa-user fa-fw"></i>
                        <?php echo $username; ?>
                    </a>
                </li>
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li><a href="<?php echo base_url('index.php/admin/dashboard')?>"><i class="fa fa-home fa-fw"></i> Dashboard</a></li>
                        <li><a href="<?php echo base_url('index.php/admin/masterBarang')?>"><i class="fa fa-gamepad fa-fw"></i> Master Barang</a></li>
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-transfer"></i> Transaksi <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url('index.php/admin/notaBeli')?>">Pembelian barang</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('index.php/admin/notaJual')?>">Penjualan barang</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li><a href="<?php echo base_url('index.php/admin/masterSupplier')?>"><i class="fa fa-group fa-fw"></i> Master Supplier</a></li>
                        <li>
                            <a href="#"><i class="fa fa-money fa-fw"></i> Laporan Keuangan <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url('index.php/admin/laporanHarian')?>">Pendapatan harian</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('index.php/admin/laporanInOut')?>">Rekap pendapatan/pengeluaran</a>
                                </li>
                                <li>
                                    <a href="typography.html">Arus kas/jurnal</a>
                                </li>
                                <li>
                                    <a href="icons.html"> Neraca</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li><a href="<?php echo base_url('index.php/admin/masterUser')?>"><i class="fa fa-user fa-fw"></i> Master User</a></li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>