<!-- views/pasien/dashboard.php -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard Pasien</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('pasien') ?>">Home</a></li>
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
                <h3 class="card-title">Riwayat Pendaftaran</h3>
            </div>
            <div class="card-body">
                <p>Selamat datang, <strong><?= $this->session->userdata('nama') ?></strong></p>

                <?php if (!empty($pendaftaran)): ?>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Dokter</th>
                                <th>Keluhan</th>
                                <th>Tanggal</th>
                                <th>Jam</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pendaftaran as $p): ?>
                                <tr>
                                    <td><?= $p->dokter ?></td>
                                    <td><?= $p->keluhan ?></td>
                                    <td><?= $p->tanggal_kunjungan ?></td>
                                    <td><?= $p->jam_kunjungan ?></td>
                                    <td>
                                        <span class="badge badge-<?= $p->status == 'disetujui' ? 'success' : ($p->status == 'ditolak' ? 'danger' : 'warning') ?>">
                                            <?= ucfirst($p->status) ?>
                                        </span>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('pasien/cetak_bukti/'.$p->id) ?>" class="btn btn-sm btn-primary">Cetak Bukti</a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <div class="alert alert-info">Belum ada riwayat pendaftaran.</div>
                <?php endif; ?>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                Informasi pendaftaran Anda
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
