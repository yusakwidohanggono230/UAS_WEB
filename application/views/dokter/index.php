<div class="content-wrapper">
  <section class="content-header">
    <h1>Data Dokter</h1>
  </section>

  <section class="content">
    <div class="card">
      <div class="card-body">
        <a href="<?= base_url('dokter/tambah'); ?>" class="btn btn-primary btn-sm">Tambah Dokter</a><br><br>
        <?php if ($this->session->flashdata('success')): ?>
          <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('error')): ?>
          <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
        <?php endif; ?>

        <?php if (!empty($dokter)): ?>
          <table class="table table-bordered table-striped" id="datatable">
            <thead>
              <tr><th>Nama</th><th>Spesialis</th><th>Aksi</th></tr>
            </thead>
            <tbody>
              <?php foreach($dokter as $d): ?>
                <tr>
                  <td><?= $d['nama_dokter']; ?></td>
                  <td><?= $d['spesialis']; ?></td>
                  <td>
                    <a href="<?= base_url('dokter/edit/'.$d['id']); ?>" class="btn btn-info btn-sm">Edit</a>
                    <a href="<?= base_url('dokter/hapus/'.$d['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin akan menghapus?')">Hapus</a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        <?php else: ?>
          <p class="text-muted">Belum ada data dokter.</p>
        <?php endif; ?>
      </div>
    </div>
  </section>
</div>
