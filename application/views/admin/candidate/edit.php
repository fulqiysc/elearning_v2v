<div class="row">
<div class="col-lg-6">

	<?php

	if (isset($error_upload)) {
		echo '<div class="alert alert-warning">' . $error_upload . '</div>';
	}
	echo form_open_multipart(base_url('admin/candidate/edit/') . $candidate['id_calon']);
	?>

</div>
</div>


<div class="row">
	<div class="col-lg-6">
		<div class="form-group form-group-lg">
			<label>Candidate Name</label>
			<input type="text" name="nama_calon" class="form-control" placeholder="Candidate Name" value="<?= $candidate['nama_calon']; ?>">
			<?= form_error('nama_calon', '<small class="text-danger">', '</small>'); ?>
		</div>
	</div>



<div class="col-lg-4">
	<div class="form-group form-group-lg">
		<label>Urutan</label>
		<select name="id_urutan" class="form-control">
			<?php foreach ($urutan as $urutan) {  ?>
				<option value="<?= $urutan['id_urutan']; ?>" <?php if ($candidate['id_urutan'] == $urutan['id_urutan']) {
																echo "selected";
															} ?>>
					<?= $urutan['urutan'] ?>
				</option>

			<?php    } ?>

		</select>
	</div>
</div>


</div>












<div class="row">

	<div class="col-lg">
		<div class="form-group">
			<label>Desc Candidate</label>


			<textarea id="editor1" class="form-control" name="desc_calon" id="exampleFormControlTextarea1" rows="3"><?= htmlentities($candidate['desc_calon']); ?></textarea>

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

<div class="col-lg-2">
		<div class="form-group form-group-lg">
			<label>Jumlah Vote</label>
			<input type="text" name="jumlah_vote" class="form-control" placeholder="Jumlah Vote" value="<?= $candidate['jumlah_vote']; ?>">
			<?= form_error('jumlah_vote', '<small class="text-danger">', '</small>'); ?>
		</div>

</div>
</div>
 

<div class="row">

<div class="col-lg-2">
	<h5>Picture</h5>
    <img src="<?= base_url('assets/image/candidate/thumbs/' . $candidate['foto_calon']); ?>" class="img-thumbnail">
	</div>


	<div class="col-lg-4" style="margin-top: 31px">
<div class="custom-file">
<input type="file" class="custom-file-input" id="foto_calon" name="foto_calon">
 <label class="custom-file-label" for="image">Choose file</label>
 </div>
 </div>


</div>









<div class="form-group mt-2">
	<button type="submit" name="submit" class="btn btn-success">
		<i class="fa fa-save mr-1"></i>Save !
	</button>
	<a href="<?= base_url('admin/candidate'); ?> "><button type="button" class="btn btn-danger">Back</button></a>

</div>


<?php
//form close

echo form_close();
?>