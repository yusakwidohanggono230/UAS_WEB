<div class="content-wrapper">
  <section class="content-header">
    <h1>Edit Dokter</h1>
  </section>

  <section class="content">
    <div class="card">
      <div class="card-body">
        <form action="<?= base_url('dokter/update/'.$dokter['id']); ?>" method="POST">
          <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama_dokter" class="form-control" value="<?= $dokter['nama_dokter']; ?>" required>
          </div>
          <div class="form-group">
            <label>Spesialis</label>
            <input type="text" name="spesialis" class="form-control" value="<?= $dokter['spesialis']; ?>" required>
          </div>
          <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
          <a href="<?= base_url('dokter'); ?>" class="btn btn-secondary">Batal</a>
        </form>
      </div>
    </div>
  </section>
</div>
