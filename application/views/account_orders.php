<?php $this->load->view('layout/header') ?>

<div class="check-out">
	<div class="container">

		<div class="bs-example4" data-example-id="simple-responsive-table">
			<div class="table-responsive">
				<table class="table-heading simpleCart_shelfItem">
					<tr>
						<th class="table-grid">No</th>
						<th>ID Trx</th>
						<th>Tgl Transaksi</th>
						<th>Total</th>
						<th>Status</th>
					</tr>
					<?php 
					$no = 1;
					foreach ($list_trx as $trx) : ?>
					<tr>
						<td><?= $no++ ?></td>
						<td><a href="<?= site_url('account/order/' . $trx['tran_id']) ?>">#<?= $trx['tran_id'] ?></a></td>
						<td><?= date('d F Y', strtotime($trx['tran_date'])) ?></td>
						<td align="right"><span class="pull-left">Rp </span><?= number_format($trx['price'], 2, ',', '.') ?></td>
						<td></td>
					</tr>
					<?php endforeach; ?>
				</table>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('layout/footer') ?>