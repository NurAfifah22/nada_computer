
<div class="row">
	<div class="col-md-6">

		<?php echo alert_box(); ?>

		<?php echo form_open(); ?>
			<?php echo box_open('Nota Servis'); ?>
				<p>Id Servis: <strong><?php echo $target['ID_Servis']; ?></strong></p>
				<p>Unit Servis: <strong><?php echo $target['Unit']; ?></strong></p>
				<p>Tanggal Servis: <strong><?php echo $target['Tanggal_Servis']; ?></strong></p>
				<p>Status Servis: <strong><?php echo $target['Status']; ?></strong></p>

			<?php //echo box_close( btn_submit('') ); ?>
		<?php echo form_close(); ?>

	</div>
</div>