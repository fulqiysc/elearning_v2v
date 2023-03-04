<div class="row">
  <div class="col-lg-6">
    <?php
    if ($this->session->flashdata('sukses')) {
      echo '<div class="alert alert-success">';
      echo $this->session->flashdata('sukses');
      echo '</div>';
    }
    ?>
  </div>
</div>

<p>
  <a href="<?= base_url('admin/user_list/registration') ?>" title="Add User" class="btn btn-success">
    <i class="fa fa-plus"></i>Add New</a>
</p>



<table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Email</th>
      <th>Nim</th>
      <th>Status Vote </th>
      <th>Role ID </th>
      <th>Is Active </th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>

    <?php $i = 1;
    foreach ($user as $user) { ?>



      <tr>
        <td><?= $i ?></td>

        <td><?= $user['name']; ?></td>
        <td><?= $user['email']; ?></td>
        <td><?= $user['nim']; ?></td>
        <td><?= $user['status_vote']; ?></td>
        <td><?= $user['role_id']; ?></td>
        <td><?= $user['is_active']; ?></td>
        <td>


          <a href="<?= base_url('admin/user_list/edit/') . $user['id_user']; ?>" title="Edit User" class="btn btn-warning btn-sm">
            <i class="fa fa-edit"></i>Edit</a>
          <?php
          include 'delete.php'
          ?>




        </td>
      </tr>



    <?php $i++;
    } ?>
  </tbody>

</table>