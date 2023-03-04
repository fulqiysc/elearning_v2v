<div class="row">
  <div class="col-lg-6">

    <?php
    if ($this->session->flashdata('sukses')) {
      echo '<div class="alert alert-success">';
      echo $this->session->flashdata('sukses');
      echo '</div>';
    }


    ?>


   <?php
  include('tambah.php');
  ?>

  </div>
</div>

<hr>

<div class="row">
<div class="col-lg-12 col-8">

<table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>No</th>
      <th>Urutan</th>
      <th>Date</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>

    <?php $i = 1;
    foreach ($urutan as $urutan) { ?>



      <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $urutan['urutan'] ?></td>
        <td><?php echo $urutan['date_created'] ?></td>



        <td>

          <a href="<?= base_url('admin/urutan/edit/') . $urutan['id_urutan']; ?>" title="Edit User" class="btn btn-warning btn-sm">
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
</div>
</div>