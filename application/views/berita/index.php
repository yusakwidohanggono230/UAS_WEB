<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Pasien Terdaftar</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Pasien</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">List Pasien</h3>
      </div>
      <div class="card-body">
        <a href="<?= base_url('berita/tambah_pasien'); ?>" class="btn btn-primary btn-sm">Tambah Pasien</a><br><br>
        <?php if (!empty($berita)): ?>
          <table class="table table-bordered table-striped" id="datatable">
            <thead>
              <tr>
                <th>Nama Pasien</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($berita as $p): ?>
                <?php if (in_array($p['status'], ['disetujui', 'ditolak'])): ?>
                <tr>
                  <td><?= htmlspecialchars($p['nama']); ?></td>
                  <td><?= date('d-m-Y', strtotime($p['tanggal_lahir'])); ?></td>
                  <td><?= htmlspecialchars($p['alamat']); ?></td>
                  <td><?= htmlspecialchars($p['no_telp']); ?></td>
                  <td>
                    <?php if ($p['status'] == 'disetujui'): ?>
                      <span class="badge badge-success">Disetujui</span>
                    <?php elseif ($p['status'] == 'ditolak'): ?>
                      <span class="badge badge-danger">Ditolak</span>
                    <?php endif; ?>
                  </td>
                  <td>
                    <a href="<?= base_url('berita/edit/' . $p['id_pasien']); ?>" class="btn btn-sm btn-info">Edit</a>
                    <a href="<?= base_url('berita/hapus_pasien/' . $p['id_pasien']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus pasien ini?')">Hapus</a>
                    <a href="<?= base_url('berita/jadwal/' . $p['id_pasien']); ?>" class="btn btn-sm btn-warning">Lihat Jadwal</a>
                  </td>
                </tr>
                <?php endif; ?>
              <?php endforeach; ?>
            </tbody>
          </table>
        <?php else: ?>
          <p class="text-muted">Tidak ada pasien yang disetujui atau ditolak.</p>
        <?php endif; ?>
      </div>
    </div>
  </section>
</div>
