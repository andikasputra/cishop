<?php $this->load->view('admin/layout/head') ?>
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Kategori</h3>
        </div>
        <div class="title_right">
          <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Cari Kategori">
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
                <li><a href="<?= site_url('admin/master/categories/add') ?>" title="Tambah Kategori"><i class="fa fa-plus"></i> Add</a>
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
                  foreach ($list_category as $a) : ?>
                  <tr>
                    <th><?= $no++ ?></th>
                    <td><?= $a['category_name'] ?></td>
                    <td><?= $a['category_description'] ?></td>
                    <td><?= $a['category_slug'] ?></td>
                    <td>
                      <a href="<?= site_url('admin/master/categories/edit/'.$a['category_id']) ?>" class="btn btn-xs btn-success" title="Edit">
                        <i class="fa fa-pencil"></i>
                      </a>
                      <a href="<?= site_url('admin/master/categories/delete/'.$a['category_id']) ?>" class="btn btn-xs btn-danger" title="Delete" onclick="return confirm('Are you sure you want to delete this category?')">
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