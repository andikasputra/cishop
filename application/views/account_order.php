<?php $this->load->view('layout/header') ?>
<div class="check-out">
	<div class="container">

		<div class="bs-example4" data-example-id="simple-responsive-table">
			<h2>Transaction #<?= $detail['tran_id'] ?></h2>
			<p>To : <?= $detail['address_nama'] ?> <br>
				<?= $detail['address_alamat'] .' '. $detail['address_kel'].' '.$detail['address_kec'] ?><br>
				<?= $detail['address_kec'].' '.$detail['address_kab'] ?><br>
				<?= $detail['address_prov'].' '.$detail['address_pos'] ?></p>
				<p>Tgl Order : <?= date('d F Y', strtotime($detail['tran_date'])) ?></p>
			<div class="table-responsive">
				<table class="table-heading simpleCart_shelfItem">
					<tr>
						<th class="table-grid">Item</th>
						<th style="text-align: right">Prices</th>
						<th style="text-align: right">Amount</th>
						<th style="text-align: right">Subtotal</th>
					</tr>
					<?php foreach ($list_item as $item) : ?>
					<tr class="cart-header">
						<td class="ring-in"><a href="single.html" class="at-in"><img src="images/ch.jpg" class="img-responsive" alt=""></a>
							<div class="sed">
								<h5><a href="single.html"><?= $item['product_name'] ?></a></h5>
								<p>(At vero eos et accusamus et iusto odio dignissimos ducimus ) </p>
							</div>
							<div class="clearfix"> </div>
						</td>
						<td align="right"><?= number_format($item['product_selling_price'], 2, ',', '.') ?></td>
						<td align="right"><?= $item['item_count'] ?></td>
						<td class="item_price" align="right"><?= number_format($item['product_selling_price'] * $item['item_count'], 2, ',', '.') ?></td>
					</tr>
					<?php endforeach; ?>
				</table>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('layout/footer') ?>