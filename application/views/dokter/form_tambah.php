<div class="content-wrapper">
  <section class="content-header">
    <h1>Tambah Dokter</h1>
  </section>

  <section class="content">
    <div class="card">
      <div class="card-body">
        <form action="<?= base_url('dokter/insert'); ?>" method="POST">
          <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama_dokter" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Spesialis</label>
            <input type="text" name="spesialis" class="form-control" required>
          </div>
          <button type="submit" class="btn btn-success">Simpan</button>
          <a href="<?= base_url('dokter'); ?>" class="btn btn-secondary">Batal</a>
        </form>
      </div>
    </div>
  </section>
</div>
