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





<table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>No</th>
      <th>User</th>
      <th>Date</th>
      <th>Log</th>
      <th width="16%">Action</th>
    </tr>
  </thead>
  <tbody>

    <?php $i = 1;
    foreach ($history as $history) { ?>



      <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $history['user']; ?></td>
        <td><?php echo $history['tanggal_waktu']; ?></td>
        <td><?php echo $history['add_log']; ?></td>
        <td>
          <?php
          include 'delete.php'
          ?>

        </td>
      </tr>



    <?php $i++;
    } ?>
  </tbody>

</table>