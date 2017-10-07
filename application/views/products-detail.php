<?php $this->load->view('layout/header', $header) ?>
<!--banner-->
<div class="banner-top">
	<div class="container">
		<h1>Single</h1>
		<em></em>
		<h2><a href="index.html">Home</a><label>/</label>Single</h2>
	</div>
</div>
<div class="single">

	<div class="container">
		<div class="col-md-9">
			<div class="col-md-5 grid">		
				<div class="flexslider">
					<ul class="slides">
						<?php foreach ($list_photos as $photo) : ?>
						<li data-thumb="<?= base_url('resource/images/products/'.$photo['photo_name']) ?>">
							<div class="thumb-image"> <img src="<?= base_url('resource/images/products/'.$photo['photo_name']) ?>" data-imagezoom="true" class="img-responsive"> </div>
						</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>	
			<div class="col-md-7 single-top-in">
				<div class="span_2_of_a1 simpleCart_shelfItem">
					<h3><?= $product['product_name'] ?></h3>
					<p class="in-para"> There are many variations of passages of Lorem Ipsum.</p>
					<div class="price_single">
						<span class="reducedfrom item_price">Rp <?= number_format($product['product_selling_price'], 2, ',', '.') ?></span>
						<a href="#">click for offer</a>
						<div class="clearfix"></div>
					</div>
					<h4 class="quick">Quick Overview:</h4>
					<p class="quick_desc"> Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; es</p>
					<div class="wish-list">
						<ul>
							<li class="wish"><a href="#"><span class="glyphicon glyphicon-check" aria-hidden="true"></span>Add to Wishlist</a></li>
							<li class="compare"><a href="#"><span class="glyphicon glyphicon-resize-horizontal" aria-hidden="true"></span>Add to Compare</a></li>
						</ul>
					</div>
					<form action="<?= site_url('cart/add_cart') ?>" method="post">
						<input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
						<div class="quantity"> 
							<div class="quantity-select">              
								<div class="entry value-minus">&nbsp;</div>
								<input class="entry value" value="1" name="value" />
								<div class="entry value-plus active">&nbsp;</div>
							</div>
						</div>
						<!--quantity-->
						<script>
							$('.value-plus').on('click', function(){
								var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.val(), 10)+1;
								if(newVal<= <?= $product['product_stock'] ?>) divUpd.val(newVal);
							});

							$('.value-minus').on('click', function(){
								var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.val(), 10)-1;
								if(newVal>=1) divUpd.val(newVal);
							});
						</script>
						<!--quantity-->
						<button class="add-to item_add hvr-skew-backward" type="submit">Add to cart</button>
						<div class="clearfix"> </div>
					</form>
				</div>

			</div>
			<div class="clearfix"> </div>
			<!---->
			<div class="tab-head">
				<nav class="nav-sidebar">
					<ul class="nav tabs">
						<li class="active"><a href="#tab1" data-toggle="tab">Product Description</a></li>
						<li class=""><a href="#tab2" data-toggle="tab">Additional Information</a></li> 
						<li class=""><a href="#tab3" data-toggle="tab">Reviews</a></li>  
					</ul>
				</nav>
				<div class="tab-content one">
					<div class="tab-pane active text-style" id="tab1">
						<div class="facts">
							<p><?= $product['product_description'] ?></p>
						</div>

					</div>
					<div class="tab-pane text-style" id="tab2">

						<div class="facts">									
							<p > Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections </p>
							<ul >
								<li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Multimedia Systems</li>
								<li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Digital media adapters</li>
								<li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Set top boxes for HDTV and IPTV Player  </li>
							</ul>
						</div>	

					</div>
					<div class="tab-pane text-style" id="tab3">

						<div class="facts">
							<p > There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined </p>
							<ul>
								<li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Research</li>
								<li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Design and Development</li>
								<li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Porting and Optimization</li>
								<li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>System integration</li>
								<li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Verification, Validation and Testing</li>
								<li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Maintenance and Support</li>
							</ul>     
						</div>	

					</div>

				</div>
				<div class="clearfix"></div>
			</div>
			<!---->	
		</div>
<!----->

<div class="col-md-3 product-bottom product-at">
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
<div class="clearfix"> </div>
</div>

<!--brand-->
<div class="container">
	<div class="brand">
		<div class="clearfix"></div>
	</div>
</div>
<!--//brand-->
</div>	

<?php $this->load->view('layout/footer') ?>