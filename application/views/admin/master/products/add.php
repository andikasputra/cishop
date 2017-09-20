<?php $this->load->view('admin/layout/head') ?>
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Produk</h3>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-sm-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Tambah Data <small>different form elements</small></h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li><a href="<?= site_url('admin/master/products') ?>"><i class="fa fa-arrow-left"></i> Back</a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <br>
              <form method="post" action="<?= site_url('admin/master/products/add_process') ?>" class="form-horizontal form-label-left" enctype="multipart/form-data">

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="product-name">Product Name <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="product-name" required="required" name="product_name" value="<?= set_value('product_name') ?>" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Category Product <span class="required">*</span></label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select name="category_id" class="form-control">
                      <?php foreach($list_categories as $a) : ?>
                        <option value="<?= $a['category_id'] ?>"><?= $a['category_name'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Brand Product <span class="required">*</span></label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select name="brand_id" class="form-control">
                      <?php foreach($list_brands as $a) : ?>
                        <option value="<?= $a['brand_id'] ?>"><?= $a['brand_name'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="purchasing-price">Purchasing Price <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="purchasing-price" name="product_purchasing_price" required="required" class="form-control col-md-7 col-xs-12" value="<?= set_value('product_purchasing_price') ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="selling-price">Selling Price <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="selling-price" name="product_selling_price" required="required" class="form-control col-md-7 col-xs-12" value="<?= set_value('product_selling_price') ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Product Description <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea rows="5" name="product_description" class="form-control col-md-7 col-xs-12" required="required"><?= set_value('product_description') ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Product Photo <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="file" name="photos[]" class="form-control" multiple="multiple">
                  </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <button class="btn btn-default" type="reset">Reset</button>
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