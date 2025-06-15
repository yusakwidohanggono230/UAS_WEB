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
            <li class="breadcrumb-item active">Laporan</li>
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
        <h3 class="card-title">List Pasien</h3>

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
        <h3>Laporan Pasien dari <?= $tanggal_dari ?> sampai <?= $tanggal_sampai ?></h3>
         <table id="datatable" class="table table-bordered table-striped">
          <thead>
            <tr style="background-color:#f9f9f9;">
              <th colspan="4" style="text-align:right;">Total Pasien</th>
              <td><?= $laporan['total'] ?></td>
            </tr>
            <tr style="background-color:#f9f9f9;">
              <th colspan="4" style="text-align:right;">Disetujui</th>
              <td><?= $laporan['disetujui'] ?></td>
            </tr>
            <tr style="background-color:#f9f9f9;">
              <th colspan="4" style="text-align:right;">Ditolak</th>
              <td><?= $laporan['ditolak'] ?></td>
            </tr>
          </thead>
        </table>
        
        <a href="<?= base_url('berita/laporan'); ?>" class="btn btn-secondary mt-3">Kembali</a>
      </div>

      <div class="card-footer">
        Footer
      </div>
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
