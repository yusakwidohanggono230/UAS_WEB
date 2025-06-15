<!-- views/pasien/form_pendaftaran.php -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Formulir Pendaftaran Pasien</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('') ?>">Home</a></li>
            <li class="breadcrumb-item active">Pendaftaran Pasien</li>
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
        <h3 class="card-title">Isi Data Pasien</h3>
      </div>
      <div class="card-body">
        <?= validation_errors('<div class="alert alert-danger">', '</div>'); ?>
        <form method="post" action="<?= base_url('pasien/daftar') ?>">
          <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
          </div>

          <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control" required>
          </div>

          <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" required></textarea>
          </div>

          <div class="form-group">
            <label>Telepon</label>
            <input type="text" name="no_telp" class="form-control" required>
          </div>

          <div class="form-group">
            <label>Keluhan</label>
            <textarea name="keluhan" class="form-control" required></textarea>
          </div>

          <div class="form-group">
            <label>Dokter Spesialis</label>
            <select name="dokter_id" class="form-control" required>
              <option value="">-- Pilih Dokter --</option>
              <?php foreach ($dokter as $d): ?>
              <option value="<?= $d['id'] ?>"><?= $d['nama_dokter'] ?> - <?= $d['spesialis'] ?></option>
              <?php endforeach ?>
            </select>
          </div>

          <div class="form-group">
            <label>Tanggal Kunjungan</label>
            <input type="date" name="tanggal_kunjungan" class="form-control" required>
          </div>

          <div class="form-group">
            <label>Jam Kunjungan</label>
            <input type="time" name="jam_kunjungan" class="form-control" required>
          </div>

          <button type="submit" class="btn btn-primary">Daftar</button>
        </form>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        Pastikan data yang Anda isi benar sebelum dikirim.
      </div>
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->
  </section>
  <!-- /.content -->
</div>
