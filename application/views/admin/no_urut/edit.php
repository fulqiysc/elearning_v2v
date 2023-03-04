<?php


echo form_open(base_url('admin/urutan/edit/') . $urutan['id_urutan']);
?>



<div class="row">
  <div class="col-12 col-lg-6">
    <div class="form-group">
      <label for="urutan">Urutan</label>
      <input type="text" name="urutan" class="form-control" id="urutan" value="<?= $urutan['urutan'] ?>">
      <small class="form-text text-danger"><?= form_error('urutan'); ?></small>
    </div>



  </div>
</div>
<button type="submit" class="btn btn-success">Save changes !</button>
<?php
echo form_close();
?>