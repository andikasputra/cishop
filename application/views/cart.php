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
				<form action="<?= site_url('cart/save_address') ?>" method="post">
					<?php 
					$user = $this->session->userdata('login'); ?>
					<div class="col-md-6">
						<div class="form-group">
							<input type="text" name="address_to" class="form-control" value="<?= $user['user_alias'] ?>" placeholder="Nama Penerima">
						</div>
						<div class="form-group">
							<input type="text" name="address_phone" class="form-control" placeholder="No Handphone Penerima">
						</div>
						<div class="form-group">
							<select name="address_city" class="form-control" placeholder="Kota Tujuan">
								<option value=""></option>
							</select>
						</div>
						<div class="form-group">
							<select name="service" class="form-control" placeholder="Layanan">
								<option value=""></option>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<input type="text" name="ongkir" class="form-control" readonly="readonly">
						</div>
						<div class="form-group">
							<input type="text" name="total" class="form-control" readonly="readonly" value="<?= number_format($this->cart->total(),2,',','.'); ?>">
						</div>
					</div>
				</form>
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
<script>
	$(document).ready(function() {
		// request data city / kota ke rajaongkir
		$.ajax({
			url: 'https://api.rajaongkir.com/starter/city',
			method: 'get',
			data: {
				key: 'be50f8a185202f670a47e1a6967dce7a'
			}
		}).success(function(data) {
			var options = '';
			// dari setiap city yg didapat
			data.rajaongkir.results.forEach(function(item) {
				// bikin option dari data city yg didapat
				options += '<option value="'+item.city_id+'">'+item.city_name+'</option>'
			})
			// masukkan options yg sudah dibuat ke dalam select
			$('select[name="address_city"]').html(options)
		})

		// ketika memilih city
		$('select[name="address_city"]').change(function() {
			var city = $(this).val()
			$.ajax({
				url: 'https://api.rajaongkir.com/starter/cost',
				method: 'post',
				data: {
					key: 'be50f8a185202f670a47e1a6967dce7a',
					origin: 501,
					destination: city,
					weight: 1000,
					courier: 'jne'
				}
			}).success(function(data) {
				var options = '';
				// dari setiap city yg didapat
				data.rajaongkir.results[0].costs.forEach(function(item) {
					// bikin option dari data city yg didapat
					options += '<option value="'+item.cost[0].value+'">'+item.service+'</option>'
				})
				$('select[name="service"]').html(options)
			})
			// jika pilih service oke / reg / yes
			$('select[name="service"]').change(function() {
				$('input[name="ongkir"]').val($(this).val())
				$('input[name="total"]').val(parseInt($(this).val())+parseInt(<?= $this->cart->total() ?>))
			})
		})
	})
</script>