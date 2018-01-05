<?php $this->load->view('admin/layout/head') ?>
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Daftar Transaksi</h3>
        </div>
        <div class="title_right">
          <div class="col-md-8 col-sm-8 col-xs-12 form-group pull-right top_search">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Cari Brand / Merek">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button">Go!</button>
              </span>
            </div>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-sm-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Daftar Data<small>basic table subtitle</small></h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">

              <table class="table">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Pelanggan</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Jml Item</th>
                    <th>Total</th>
                    <th width="80px">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($list_transaction as $a) : ?>
                  <tr <?= (empty($a['payment_status']) || $a['payment_status'] == 'waiting') ? 'style="color: #f00"' : '' ?>>
                    <td><?= $no++ ?></td>
                    <td><?= $a['user_alias'] ?></td>
                    <td><?= $a['tran_date'] ?></td>
                    <td><?= empty($a['payment_status']) ? 'waiting' : $a['payment_status'] ?></td>
                    <td><?= $a['jumlah'] ?></td>
                    <td><?= number_format($a['total'] + $a['tran_cost'], 2, ',', '.') ?></td>
                    <td>
                      <a href="<?= site_url('admin/transactions/transactions/delete/') ?>" class="btn btn-xs btn-danger" title="Delete" onclick="return confirm('Are you sure you want to delete this brand?')">
                        <i class="fa fa-trash"></i>
                      </a>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /page content -->
<?php $this->load->view('admin/layout/foot') ?>