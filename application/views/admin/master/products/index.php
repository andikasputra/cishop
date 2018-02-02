<?php $this->load->view('admin/layout/head') ?>
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Produk</h3>
        </div>
        <div class="title_right">
          <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Cari Produk">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button">Go!</button>
              </span>
            </div>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
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

              <table class="table">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Brand</th>
                    <th>Purchasing Price (Rp)</th>
                    <th>Selling Price (Rp)</th>
                    <th width="80px">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = $this->uri->segment(5) +1;
                  foreach ($list_product as $a) : ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $a['product_name'] ?></td>
                    <td><?= $a['category_name'] ?></td>
                    <td><?= $a['brand_name'] ?></td>
                    <td class="text-right"><?= number_format($a['product_purchasing_price'], 0, ',', '.') ?></td>
                    <td class="text-right"><?= number_format($a['product_selling_price'], 0, ',', '.') ?></td>
                    <td>
                      <a href="<?= site_url('admin/master/products/edit/'.$a['brand_id']) ?>" class="btn btn-xs btn-success" title="Edit">
                        <i class="fa fa-pencil"></i>
                      </a>
                      <a href="<?= site_url('admin/master/products/delete/'.$a['brand_id']) ?>" class="btn btn-xs btn-danger" title="Delete" onclick="return confirm('Are you sure you want to delete this brand?')">
                        <i class="fa fa-trash"></i>
                      </a>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
              <?= $this->pagination->create_links() ?>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /page content -->
<?php $this->load->view('admin/layout/foot') ?>