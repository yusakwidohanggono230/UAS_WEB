<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Jadwal Pendaftaran Pasien</h1>
        </div>
        <div class="col-sm-6">
          <a href="<?= base_url('berita'); ?>" class="btn btn-sm btn-secondary float-right">Kembali</a>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Jadwal Pendaftaran - <?= $pasien['nama']; ?></h3>
      </div>
      <div class="card-body">
        <?php if (!empty($pendaftaran)): ?>
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Keluhan</th>
                <th>Dokter</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($pendaftaran as $p): ?>
                <tr>
                  <td><?= date('d-m-Y', strtotime($p['tanggal_kunjungan'])); ?></td>
                  <td><?= date('H:i', strtotime($p['jam_kunjungan'])); ?> WIB</td>
                  <td><?= $p['keluhan']; ?></td>
                  <td><?= isset($p['nama_dokter']) ? $p['nama_dokter'] : 'Tidak Ada'; ?></td>

                  <td>
                    <?php if ($p['status'] == 'disetujui'): ?>
                      <span class="badge badge-success">Disetujui</span>
                    <?php elseif ($p['status'] == 'ditolak'): ?>
                      <span class="badge badge-danger">Ditolak</span>
                    <?php else: ?>
                      <span class="badge badge-secondary"><?= $p['status']; ?></span>
                    <?php endif; ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        <?php else: ?>
          <p>Pasien ini belum memiliki jadwal pendaftaran.</p>
        <?php endif; ?>
      </div>
    </div>
  </section>
</div>
