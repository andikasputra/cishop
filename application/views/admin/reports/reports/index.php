<?php $this->load->view('admin/layout/head') ?>
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Laporan</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Daftar Data <small>basic table subtitle</small></h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li><a href="<?= site_url('admin/master/products/add') ?>" title="Tambah Produk"><i class="fa fa-plus"></i> Add</a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <?php 
              // ambil session cari
              $cari = $this->session->userdata('cari') ?>
              <form action="<?= site_url('admin/reports/reports/filter_process') ?>" method="post">
                <div class="col-md-3">
                  <div class="form-group">
                    <select name="bulan" class="form-control">
                      <option value="">-- Semua Bulan --</option>
                      <option value="01" <?= ($cari['bulan'] == '01') ? 'selected' : '' ?>>Januari</option>
                      <option value="02" <?= ($cari['bulan'] == '02') ? 'selected' : '' ?>>Februari</option>
                      <option value="03" <?= ($cari['bulan'] == '03') ? 'selected' : '' ?>>Maret</option>
                      <option value="04" <?= ($cari['bulan'] == '04') ? 'selected' : '' ?>>April</option>
                      <option value="05" <?= ($cari['bulan'] == '05') ? 'selected' : '' ?>>Mei</option>
                      <option value="06" <?= ($cari['bulan'] == '06') ? 'selected' : '' ?>>Juni</option>
                      <option value="07" <?= ($cari['bulan'] == '07') ? 'selected' : '' ?>>Juli</option>
                      <option value="08" <?= ($cari['bulan'] == '08') ? 'selected' : '' ?>>Agustus</option>
                      <option value="09" <?= ($cari['bulan'] == '09') ? 'selected' : '' ?>>September</option>
                      <option value="10" <?= ($cari['bulan'] == '10') ? 'selected' : '' ?>>Oktober</option>
                      <option value="11" <?= ($cari['bulan'] == '11') ? 'selected' : '' ?>>November</option>
                      <option value="12" <?= ($cari['bulan'] == '12') ? 'selected' : '' ?>>Desember</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <select name="tahun" class="form-control">
                      <?php foreach($list_tahun as $tahun) : ?>
                      <option value="<?= $tahun['tahun'] ?>" <?= ($cari['tahun'] == $tahun['tahun'] ? 'selected' : '') ?>><?= $tahun['tahun'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <input type="text" name="nama" value="<?= $cari['nama'] ?>">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <button class="btn btn-primary" type="submit">
                      <i class="fa fa-search"></i> Search
                    </button>
                  </div>
                </div>
              </form>
              <pre>
                <?php print_r($list_penjualan) ?>
              </pre>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /page content -->
<?php $this->load->view('admin/layout/foot') ?>