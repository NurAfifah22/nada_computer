
<div class="row">
	<div class="col-md-6">
		<?php echo alert_box(); ?>

		<?php echo form_open(); ?>
			<?php echo box_open(''); ?>
				<p>Id Servis: <strong><?php echo $target['ID_Servis']; ?></strong></p>
				<p>Unit Servis: <strong><?php echo $target['Unit']; ?></strong></p>
				<p>Tanggal Servis: <strong><?php echo $target['Tanggal_Servis']; ?></strong></p>
				<p>Keluhan: <strong><?php echo $target['Keluhan']; ?></strong></p>
				<p>Tindakan: <strong><?php echo $target['Nama_Barang']; ?></strong></p>
				<p>Harga: <strong><?php echo $target['Harga_Jual']; ?></strong></p>
				
			<?php echo box_close(); ?>
		<?php echo form_close(); ?>

		<script>
		window.print();
	</script>

	</div>
</div>