<?php $this->load->view('layout/header') ?>
<link rel="stylesheet" href="<?= base_url('resource/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') ?>">
<div class="container">
	<div class="login">
		<h3>Konfirmasi Pembayaran</h3><br>
		<form action="<?= site_url('cart/confirm_process') ?>" method="post" enctype="multipart/form-data">
			<div class="col-md-6 login-do">
				<div class="login-mail">
					<input type="text" placeholder="ID Transaksi" required="required" name="tran_id">
				</div>
				<div class="login-mail">
					<input type="text" placeholder="Nama Pemilik Rekening" required="required" name="payment_name">
				</div>
				<div class="login-mail">
					<input type="text" placeholder="Total Bayar" required="required" name="payment_total">
				</div>
				<div class="login-mail">
					<input type="text" class="date-picker" placeholder="Tanggal Transfer" required="required" name="payment_date">
				</div>
				<div class="login-mail">
					<label>Bukti Pembayaran</label>
					<input type="file" accept=".jpg,.png,.pdf" name="payment_attachment">
				</div>
				<label class="hvr-skew-backward">
					<input type="submit" value="Simpan">
				</label>
			</div>
			
			<div class="clearfix"> </div>
		</form>
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
<script src="<?= base_url('resource/vendors/moment/min/moment.min.js') ?>"></script>
<script src="<?= base_url('resource/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') ?>"></script>
<script>
	$('.date-picker').datetimepicker({
		format: 'Y-M-D'
	})
</script>
<?php $this->load->view('layout/footer') ?>