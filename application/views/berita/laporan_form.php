<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Laporan Kunjungan Pasien</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Laporan Pasien</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Form Laporan Kunjungan Pasien</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>

      <div class="card-body">
        <form method="post" action="<?= base_url('berita/laporan_pasien'); ?>">
          <div class="form-group">
            <label for="tanggal_dari">Dari Tanggal:</label>
            <input type="date" name="tanggal_dari" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="tanggal_sampai">Sampai Tanggal:</label>
            <input type="date" name="tanggal_sampai" class="form-control" required>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Tampilkan Laporan</button>
          </div>
        </form>
      </div>

      <div class="card-footer">
        Silakan pilih rentang tanggal untuk melihat laporan kunjungan pasien.
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
