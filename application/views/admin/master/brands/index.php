<?php $this->load->view('admin/layout/head') ?>
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Brands / Merk</h3>
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
        <div class="col-md-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Daftar Data<small>basic table subtitle</small></h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li><a href="<?= site_url('admin/master/brands/add') ?>" title="Tambah Brand / Merk"><i class="fa fa-plus"></i> Add</a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">

              <table class="table">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Slug</th>
                    <th width="80px">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($list_brand as $a) : ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $a['brand_name'] ?></td>
                    <td><?= $a['brand_description'] ?></td>
                    <td><?= $a['brand_slug'] ?></td>
                    <td>
                      <a href="<?= site_url('admin/master/brand/edit/'.$a['brand_id']) ?>" class="btn btn-xs btn-success" title="Edit">
                        <i class="fa fa-pencil"></i>
                      </a>
                      <a href="<?= site_url('admin/master/brands/delete/'.$a['brand_id']) ?>" class="btn btn-xs btn-danger" title="Delete" onclick="return confirm('Are you sure you want to delete this brand?')">
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