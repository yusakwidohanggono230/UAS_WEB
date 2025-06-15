<!-- views/admin/pendaftaran.php -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Manajemen Pendaftaran</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Pendaftaran</li>
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
                <h3 class="card-title">Daftar Pendaftaran</h3>
                <div class="card-tools">
                    <a href="<?= base_url('admin/dashboard') ?>" class="btn btn-sm btn-secondary">Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <?php if (!empty($pendaftaran)): ?>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Pasien</th>
                                <th>Dokter</th>
                                <th>Keluhan</th>
                                <th>Tanggal/Jam</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pendaftaran as $p): ?>
                                <tr>
                                    <td><?= $p->nama_pasien ?></td>
                                    <td><?= $p->nama_dokter ?></td>
                                    <td><?= $p->keluhan ?></td>
                                    <td><?= $p->tanggal_kunjungan ?> <?= $p->jam_kunjungan ?></td>
                                    <td><span class="badge badge-<?= $p->status == 'disetujui' ? 'success' : ($p->status == 'ditolak' ? 'danger' : 'warning') ?>">
                                        <?= ucfirst($p->status) ?></span>
                                    </td>
                                    <td>
                                        <?php if ($p->status == 'dalam proses'): ?>
                                            <a href="<?= base_url('admin/setujui/'.$p->id.'/disetujui') ?>" class="btn btn-sm btn-success">Setujui</a>
                                            <a href="<?= base_url('admin/tolak/'.$p->id.'/ditolak') ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menolak?')">Tolak</a>
                                        <?php else: ?>
                                            <span class="text-muted">-</span>
                                        <?php endif ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <div class="alert alert-info">Belum ada pendaftaran yang masuk.</div>
                <?php endif; ?>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                Data pendaftaran pasien
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
