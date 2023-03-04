<div class="col-lg-6">

    <?php

    // echo validation_errors('<div class="alert alert-warning">','</div');

    //error upload
    if (isset($error_upload)) {
        echo '<div class="alert alert-warning">' . $error_upload . '</div>';
    }
    echo form_open_multipart(base_url('admin/materi/edit_komen/') . $komen['id_komen']);
    ?>

</div>


<div class="row">

    <div class="col-lg-6">
        <div class="form-group">


            <label for="exampleFormControlTextarea1">Edit Komentar</label>


            <input type="hidden" value="<?= $komen['slug_materi']; ?>" name="slug_materi">
            <input type="hidden" value="<?= $komen['id_materi']; ?>" name="id_materi">
            <input type="hidden" value="<?= $komen['id_kelas']; ?>" name="id_kelas">
            <textarea class="form-control" name="isi_komen" id="exampleFormControlTextarea1" rows="3"><?= htmlentities($komen['isi_komen']); ?></textarea>
            <?= form_error('isi_komen', '<small class="text-danger">', '</small>'); ?>

            <p class="mt-2 font-italic"><?= $komen['file_baru']; ?></p>
            <input type="file" name="file_baru" class="form-control mt-3" style="padding-bottom: 40px; padding-top: 10px;">
        </div>

    </div>
</div>




<div class="form-group">
    <button type="submit" name="submit" class="btn btn-success">
        <i class="fa fa-save mr-1"></i>Save !
    </button>
    <a href="<?= base_url('admin/materi/read/') . $komen['slug_materi']; ?> "><button type="button" class="btn btn-danger">Back</button></a>


</div>

<?php
echo form_close();
?>