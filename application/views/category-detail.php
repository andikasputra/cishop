<?php $this->load->view('layout/header', $header) ?>
<!--banner-->
<div class="banner-top">
	<div class="container">
		<h1>Products</h1>
		<em></em>
		<h2><a href="index.html">Home</a><label>/</label>Products</h2>
	</div>
</div>
<!--content-->
<div class="product">
	<div class="container">
		<div class="col-md-9">
			<div class="mid-popular">
				<?php foreach($list_products as $item) : ?>
					<div class="col-md-4 item-grid1 simpleCart_shelfItem">
						<div class=" mid-pop">
							<div class="pro-img">
								<img src="<?= base_url('resource/images/products/'.$item['photo_name']) ?>" class="img-responsive" alt="" style="width: 100%; height: 250px;">
								<div class="zoom-icon ">
									<a class="picture" href="<?= base_url('resource/images/products/'.$item['photo_name']) ?>" rel="title" class="b-link-stripe b-animate-go  thickbox"><i class="glyphicon glyphicon-search icon "></i></a>
									<a href="<?= site_url('products/detail/'.$item['product_slug']) ?>"><i class="glyphicon glyphicon-menu-right icon"></i></a>
								</div>
							</div>
							<div class="mid-1">
								<div class="women">
									<div class="women-top">
										<span><?= $item['category_name'] ?></span>
										<h6><a href="<?= site_url('products/detail/'.$item['product_slug']) ?>"><?= $item['product_name'] ?></a></h6>
									</div>
									<div class="img item_add">
										<a href="#"><img src="images/ca.png" alt=""></a>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="mid-2">
									<p ><em class="item_price">Rp. <?= number_format($item['product_selling_price'], 0, ',', '.') ?></em></p>
									<div class="block">
										<div class="starbox small ghosting"> </div>
									</div>

									<div class="clearfix"></div>
								</div>

							</div>
						</div>
					</div>
				<?php endforeach; ?>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="col-md-3 product-bottom">
			<!--categories-->
			<div class=" rsidebar span_1_of_left">
				<h4 class="cate">Categories</h4>
				<ul class="menu-drop">
					<?php foreach ($header['list_categories'] as $cat) : ?>
						<li><a href="<?= site_url('categories/detail/'.$cat['category_slug']) ?>"><?= $cat['category_name'] ?></a></li>
					<?php endforeach; ?>
				</ul>
			</div>
			<!--//menu-->
			<section  class="sky-form">
				<h4 class="cate">Discounts</h4>
				<div class="row row1 scroll-pane">
					<div class="col col-4">
						<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Upto - 10% (20)</label>
					</div>
					<div class="col col-4">
						<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>40% - 50% (5)</label>
						<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>30% - 20% (7)</label>
						<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>10% - 5% (2)</label>
						<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Other(50)</label>
					</div>
				</div>
			</section> 				 				 


			<!---->
			<section  class="sky-form">
				<h4 class="cate">Type</h4>
				<div class="row row1 scroll-pane">
					<div class="col col-4">
						<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Sofa Cum Beds (30)</label>
					</div>
					<div class="col col-4">
						<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Bags  (30)</label>
						<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Caps & Hats (30)</label>
						<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Jackets & Coats   (30)</label>
						<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Jeans  (30)</label>
						<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Shirts   (30)</label>
						<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Sunglasses  (30)</label>
						<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Swimwear  (30)</label>
					</div>
				</div>
			</section>
			<section  class="sky-form">
				<h4 class="cate">Brand</h4>
				<div class="row row1 scroll-pane">
					<div class="col col-4">
						<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Roadstar</label>
					</div>
					<div class="col col-4">
						<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Levis</label>
						<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Persol</label>
						<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Nike</label>
						<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Edwin</label>
						<label class="checkbox"><input type="checkbox" name="checkbox" ><i></i>New Balance</label>
						<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Paul Smith</label>
						<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Ray-Ban</label>
					</div>
				</div>
			</section>		
		</div>
		<div class="clearfix"></div>
	</div>
	<!--products-->

	<!--//products-->
	<!--brand-->
	<div class="container">
		<div class="brand">
			<div class="clearfix"></div>
		</div>
	</div>
	<!--//brand-->


</div>
<!--//content-->
<?php $this->load->view('layout/footer') ?>