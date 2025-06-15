<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Data Pasien</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('berita'); ?>">Home</a></li>
            <li class="breadcrumb-item active">Edit Pasien</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Form Edit Pasien</h3>
      </div>

      <div class="card-body">
        <form action="<?= base_url('berita/update/' . $pasien['id']); ?>" method="POST">
          <div class="form-group">
            <label for="nama">Nama Pasien</label>
            <input type="text" class="form-control" name="nama" id="nama" value="<?= htmlspecialchars($pasien['nama']); ?>" required>
          </div>

          <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="<?= $pasien['tanggal_lahir']; ?>" required>
          </div>

          <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea class="form-control" name="alamat" id="alamat" rows="3" required><?= htmlspecialchars($pasien['alamat']); ?></textarea>
          </div>

          <div class="form-group">
            <label for="telepon">Telepon</label>
            <input type="text" class="form-control" name="telepon" id="telepon" value="<?= htmlspecialchars($pasien['no_telp']); ?>" required>
          </div>

          <div class="form-group">
            <label for="status">Status Pendaftaran</label>
            <select class="form-control" name="status" id="status" required>
              <option value="dalam proses" <?= $pasien['status'] == 'dalam proses' ? 'selected' : ''; ?>>Diproses</option>
              <option value="disetujui" <?= $pasien['status'] == 'disetujui' ? 'selected' : ''; ?>>Disetujui</option>
              <option value="ditolak" <?= $pasien['status'] == 'ditolak' ? 'selected' : ''; ?>>Ditolak</option>
            </select>
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="<?= base_url('berita/pasien_terdaftar'); ?>" class="btn btn-secondary">Batal</a>
          </div>
        </form>
      </div>

      <div class="card-footer">
        <small>Pastikan data pasien sudah benar sebelum disimpan.</small>
      </div>
    </div>
  </section>
</div>
