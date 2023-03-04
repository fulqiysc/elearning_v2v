<?php


echo form_open(base_url('admin/kelas/edit/') . $kelas['id_kelas']);
?>



<div class="row">
  <div class="col-12 col-lg-6">
    <div class="form-group">
      <label for="name">Nama Kelas</label>
      <input type="text" name="nama_kelas" class="form-control" id="name" value="<?= $kelas['nama_kelas'] ?>">
      <small class="form-text text-danger"><?= form_error('name'); ?></small>
    </div>

    <div class="form-group">
      <label for="kelas">Kelas</label>
      <input type="text" name="urutan" class="form-control" id="kelas" value="<?= $kelas['urutan'] ?>">
      <small class="form-text text-danger"><?= form_error('kelas'); ?></small>
    </div>

  </div>
</div>
<button type="submit" class="btn btn-success">Save changes !</button>
<?php
echo form_close();
?>