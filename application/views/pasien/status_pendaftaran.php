<!-- views/pasien/status_pendaftaran.php -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Status Pendaftaran</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('') ?>">Home</a></li>
            <li class="breadcrumb-item active">Status Pendaftaran</li>
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
        <h3 class="card-title">Informasi Status</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <?php if ($pendaftaran->status == 'dalam proses'): ?>
  <h4><span class="badge badge-warning">Sedang Diproses</span></h4>
  <p>Admin akan segera memproses pendaftaran Anda. Silakan tunggu konfirmasi selanjutnya.</p>
<?php elseif ($pendaftaran->status == 'disetujui'): ?>
  <h4><span class="badge badge-success">Pendaftaran Disetujui</span></h4>
  <p>Selamat! Pendaftaran Anda telah disetujui.</p>
  <ul>
    <li><strong>Dokter:</strong> <?= $pendaftaran->dokter ?></li>
    <li><strong>Tanggal Kunjungan:</strong> <?= $pendaftaran->tanggal_kunjungan ?></li>
    <li><strong>Jam Kunjungan:</strong> <?= $pendaftaran->jam_kunjungan ?></li>
  </ul>
<?php elseif ($pendaftaran->status == 'ditolak'): ?>
  <h4><span class="badge badge-danger">Pendaftaran Ditolak</span></h4>
  <p>Mohon maaf, pendaftaran Anda tidak disetujui. Silakan hubungi pihak administrasi untuk info lebih lanjut.</p>
<?php else: ?>
  <h4>Status tidak diketahui</h4>
<?php endif; ?>

        <a href="<?= base_url('pasien') ?>" class="btn btn-primary">Kembali ke Beranda</a>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        Terima kasih telah mendaftar di sistem kami.
      </div>
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->
  </section>
  <!-- /.content -->
</div>
