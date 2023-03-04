<div class="row">
	<div class="col-lg-6">

		<?php

		if (isset($error_upload)) {
			echo '<div class="alert alert-warning">' . $error_upload . '</div>';
		}
		echo form_open_multipart(base_url('admin/candidate/tambah'));
		?>

	</div>
</div>

<div class="row">
	<div class="col-lg-5">
		
	
		<div class="form-group form-group-lg">
			<label>Urutan </label>
			<select name="id_urutan" class="form-control">
				<?php foreach ($urutan as $urutan) {  ?>
					<option value="<?= $urutan['id_urutan']; ?>">
						<?= $urutan['urutan'] ?>
					</option>

				<?php	} ?>

			</select>
				<?= form_error('id_urutan', '<small class="text-danger">', '</small>'); ?>
		</div>



	</div>


	<div class="col-lg-7">
		<div class="form-group form-group-lg">
			<label>Nama Calon</label>
			<input type="text" name="nama_calon" class="form-control" placeholder="Nama Calon" value="<?= set_value('nama_calon') ?>">
			<?= form_error('nama_calon', '<small class="text-danger">', '</small>'); ?>
		</div>
	</div>


</div>





<div class="row">
	<div class="col-lg">
		<div class="form-group">
			<label>Desc</label>
			<textarea id="editor1" class="form-control" name="desc_calon" id="exampleFormControlTextarea1" rows="3"><?= set_value('desc_calon') ?></textarea>

			<script>
				var config = {
					extraPlugins: 'codesnippet,colorbutton,colordialog,liststyle,table,tableresize,font',
					codeSnippet_languages: {
						html: 'HTML',
						javascript: 'JavaScript',
						php: 'PHP'

					},
					codeSnippet_theme: 'monokai_sublime',
					height: 356,
					colorButton_colors: 'CF5D4E,454545,FFF,CCC,DDD,CCEAEE,66AB16',
					colorButton_enableAutomatic: false

				};
				CKEDITOR.replace('editor1', config);
			</script>

			<?= form_error('desc_calon', '<small class="text-danger">', '</small>'); ?>
		</div>
	</div>
</div>



<div class="row">
	<div class="col-lg-4">
		<div class="form-group">

			<label>FILE</label>
			<input type="file" name="foto_calon" class="form-control mt-1" style="padding-bottom: 40px; padding-top: 10px;">

		</div>
	</div>
</div>






<div class="form-group">
	<button type="submit" name="submit" class="btn btn-success">
		<i class="fa fa-save mr-1"></i>Save !
	</button>
	<a href="<?= base_url('admin/candidate'); ?> "><button type="button" class="btn btn-danger">Back</button></a>

</div>


<?php
//form close

echo form_close();
?>