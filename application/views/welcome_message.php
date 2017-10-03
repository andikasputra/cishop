<?php $this->load->view('layout/header') ?>
<!--banner-->
<div class="banner">
<div class="container">
<section class="rw-wrapper">
				<h1 class="rw-sentence">
				<span>Fashion&amp; Beauty</span>
					<div class="rw-words rw-words-1">
						<span>Beautiful Designs</span>
						<span>Sed ut perspiciatis</span>
						<span> Totam rem aperiam</span>
						<span>Nemo enim ipsam</span>
						<span>Temporibus autem</span>
						<span>intelligent systems</span>
					</div>
					<div class="rw-words rw-words-2">
						<span>We denounce with right</span>
						<span>But in certain circum</span>
						<span>Sed ut perspiciatis unde</span>
						<span>There are many variation</span>
						<span>The generated Lorem Ipsum</span>
						<span>Excepteur sint occaecat</span>
					</div>
				</h1>
			</section>
			</div>
</div>
	<!--content-->
		<div class="content">
			<div class="container">
					<div class="clearfix"></div>
				</div>

				<!--products-->
			<div class="content-mid">
				<h3>New Items</h3>
				<label class="line"></label>
				<div class="mid-popular">
					<?php foreach($list_products as $item) : ?>
						<div class="col-md-3 item-grid simpleCart_shelfItem" style="margin-top: 40px">
							<div class=" mid-pop">
								<div class="pro-img">
									<img src="<?= base_url('resource/images/products/'.$item['photo_name']) ?>" class="img-responsive" alt="" style="width: 100%; height: 350px;">
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
											<a href="#"><img src="" alt=""></a>
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
			</div>
			<!--//products-->
			<!--brand-->
			<div class="brand">
				<div class="clearfix"></div>
			</div>
			<!--//brand-->
			</div>
			
		</div>
	<!--//content-->
<?php $this->load->view('layout/footer') ?>