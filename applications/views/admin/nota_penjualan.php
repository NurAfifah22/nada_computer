<div class="row">
	<div class="col-md-6">

		<?php echo alert_box(); ?>

		<?php echo form_open(); ?>
			<?php echo box_open('Nota Penjualan'); ?>
				<p>Id Jual: <strong><?php echo $target['ID_jual']; ?></strong></p>
				<p>Id Servis: <strong><?php echo $target['ID_Servis']; ?></strong></p>
				<p>Tanggal Jual: <strong><?php echo $target['Tanggal_Jual']; ?></strong></p>
				<p>Id Barang: <strong><?php echo $target['ID_Barang']; ?></strong></p>
				<p>Jumlah: <strong><?php echo $target['Jumlah']; ?></strong></p>
				<p>Harga Total: <strong><?php echo $target['Harga_Total']; ?></strong></p>
				<p>Id: <strong><?php echo $target['id']; ?></strong></p>
				
			<?php echo box_close(); ?>
		<?php echo form_close(); ?>

		<script>
		window.print();
	</script>

	</div>
</div>