<?php $this->load->view('layout/header', $header); ?>
<link rel="stylesheet" href="<?= base_url('resource/vendors/select2/dist/css/select2.min.css') ?>">
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
		<div class="">
			<?php if (!empty($this->session->userdata('login'))) : ?>
				<form action="<?= site_url('cart/save_transaction') ?>" method="post">
					<?php 
					$user = $this->session->userdata('login'); ?>
					<div class="col-md-6">
						<div class="form-group">
							<input type="text" name="address_nama" class="form-control" value="<?= $user['user_alias'] ?>" placeholder="Nama Penerima">
						</div>
						<div class="form-group">
							<input type="text" name="address_phone" class="form-control" placeholder="No Handphone Penerima">
						</div>
						<div class="form-group">
							<select name="address_city" class="form-control" data-placeholder="Kota Tujuan" required="required">
								<option value=""></option>
							</select>
						</div>
						<input type="hidden" name="address_kab">
						<div class="form-group">
							<input type="text" name="address_prov" class="form-control" placeholder="Provinsi" required="required">
						</div>
						<div class="form-group">
							<input type="text" name="address_kec" class="form-control" placeholder="Kecamatan" required="required">
						</div>
						<div class="form-group">
							<input type="text" name="address_kel" class="form-control" placeholder="Kelurahan" required="required">
						</div>
						<div class="form-group">
							<input type="text" name="address_pos" class="form-control" placeholder="Kode Pos" required="required">
						</div>
						<div class="form-group">
							<textarea type="text" name="address_alamat" class="form-control" rows="3" required="required" placeholder="Alamat"></textarea>
						</div>
						<div class="form-group">
							<select name="service" class="form-control" data-placeholder="Layanan">
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
						<div class="form-group">
							<button class="btn btn-danger hrv-skew-backward" type="submit">Process To Buy</button>
						</div>
					</div>
				</form>
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
<!-- load plugin select2 -->
<script src="<?= base_url('resource/vendors/select2/dist/js/select2.min.js') ?>"></script>
<script>
	$(document).ready(function() {
		// use select2 utk semua element select
		$('select').select2();
		// request data city / kota ke rajaongkir
		$.ajax({
			url: 'https://api.rajaongkir.com/starter/city',
			method: 'get',
			data: {
				key: 'be50f8a185202f670a47e1a6967dce7a'
			}
		}).success(function(data) {
			var options = '<option></option>';
			// dari setiap city yg didapat
			data.rajaongkir.results.forEach(function(item) {
				// bikin option dari data city yg didapat
				options += '<option value="'+item.city_id+'">'+item.type+' '+item.city_name+'</option>'
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
				var options = '<option></option>';
				// dari setiap city yg didapat
				data.rajaongkir.results[0].costs.forEach(function(item) {
					// bikin option dari data city yg didapat
					options += '<option value="'+item.cost[0].value+'">'+item.service+'</option>'
				})
				$('select[name="service"]').html(options)
				// set province
				$('input[name="address_prov"]').val(data.rajaongkir.destination_details.province)
				// set kabupaten
				$('input[name="address_kab"]').val(data.rajaongkir.destination_details.type+' '+data.rajaongkir.destination_details.city_name)
			})
			// jika pilih service oke / reg / yes
			$('select[name="service"]').change(function() {
				$('input[name="ongkir"]').val($(this).val())
				$('input[name="total"]').val(parseInt($(this).val())+parseInt(<?= $this->cart->total() ?>))
			})
		})
	})
</script>