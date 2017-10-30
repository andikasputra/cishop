<?php $this->load->view('layout/header', $header); ?>
<!--banner-->
<!-- <div class="banner-top">
	<div class="container">
		<h1>Checkout</h1>
		<em></em>
		<h2><a href="index.html">Home</a><label>/</label>Checkout</h2>
	</div>
</div> -->
<div class="check-out">
	<div class="container">

		<div class="bs-example4" data-example-id="simple-responsive-table">
			<div class="table-responsive">
				<table class="table-heading simpleCart_shelfItem">
					<tr>
						<th class="table-grid">Item</th>
						<th style="text-align: right">Prices</th>
						<th style="text-align: right">Amount</th>
						<th style="text-align: right">Subtotal</th>
					</tr>
					<?php foreach ($this->cart->contents() as $cart) : ?>
					<tr class="cart-header">
						<td class="ring-in"><a href="single.html" class="at-in"><img src="images/ch.jpg" class="img-responsive" alt=""></a>
							<div class="sed">
								<h5><a href="single.html"><?= $cart['name'] ?></a></h5>
								<p>(At vero eos et accusamus et iusto odio dignissimos ducimus ) </p>
							</div>
							<div class="clearfix"> </div>
						</td>
						<td align="right"><?= number_format($cart['price'], 2, ',', '.') ?></td>
						<td align="right"><?= $cart['qty'] ?></td>
						<td class="item_price" align="right"><?= number_format($cart['price'] * $cart['qty'], 2, ',', '.') ?></td>
					</tr>
					<?php endforeach; ?>
				</table>
			</div>
		</div>
		<div class="produced">
			<?php if (!empty($this->session->userdata('login'))) : ?>
				<a href="<?= site_url('cart/checkout') ?>" class="hvr-skew-backward">Produced To Buy</a>
			<?php else : ?>
				<a href="<?= site_url('auth/login') ?>" class="hvr-skew-backward">Login To Process</a>
			<?php endif; ?>
		</div>
	</div>
</div>

<!--//login-->
<!--brand-->
<div class="container">
	<div class="brand">
		<div class="clearfix"></div>
	</div>
</div>
<!--//brand-->
<!--//content-->
<?php $this->load->view('layout/footer'); ?>