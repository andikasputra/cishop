<?php $this->load->view('admin/layout/head') ?>
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Brands / Merk</h3>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Tambah Data <small>different form elements</small></h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li><a href="<?= site_url('admin/master/brands') ?>"><i class="fa fa-arrow-left"></i> Back</a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <br>
              <form method="post" action="<?= site_url('admin/master/brands/add_process') ?>" class="form-horizontal form-label-left" enctype="multipart/form-data">

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="brand_name">Name <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="brand_name" name="brand_name" required="required" class="form-control col-md-7 col-xs-12" value="<?= set_value('brand_name') ?>">
                    <!-- menampilkan pesan error pada brand_name -->
                    <?= form_error('brand_name', '<i class="text-danger">', '</i>') ?>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="brand_description">Description <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea id="brand_description" name="brand_description" required="required" class="form-control col-md-7 col-xs-12"><?= set_value('brand_description') ?></textarea>
                    <?= form_error('brand_description', '<i class="text-danger">', '</i>') ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="brand_logo" class="control-label col-md-3 col-sm-3 col-xs-12">Logo</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="brand_logo" name="brand_logo" class="form-control col-md-7 col-xs-12" type="file" accept="image/*">
                  </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button class="btn btn-default" type="reset"><i class="fa fa-refresh"></i> Reset</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Submit</button>
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /page content -->
<?php $this->load->view('admin/layout/foot') ?>