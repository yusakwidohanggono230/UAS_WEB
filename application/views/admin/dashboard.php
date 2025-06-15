<!-- views/admin/dashboard.php -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard Admin</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Selamat Datang</h3>

                <div class="card-tools">
                    <a href="<?= base_url('auth/logout') ?>" class="btn btn-tool" title="Logout">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <p>Halo, <strong><?= $this->session->userdata('nama') ?></strong></p>
                <a href="<?= base_url('admin/pendaftaran') ?>" class="btn btn-primary mb-3">Lihat Pendaftaran</a>
                <hr>
                <ul class="list-group">
                    <li class="list-group-item">Total Pendaftaran: <?= $total ?></li>
                    <li class="list-group-item">Disetujui: <?= $disetujui ?></li>
                    <li class="list-group-item">Ditolak: <?= $ditolak ?></li>
                    <li class="list-group-item">Diproses: <?= $diproses ?></li>
                </ul>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                Dashboard Statistik Pendaftaran
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
