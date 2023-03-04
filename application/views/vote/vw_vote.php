<style>
.custom0{
  width: 100%;
  margin-left: 12%;
  margin-top: 2%;
}
.custom{
  width: 20%;
  height: 30%;
  margin-right: 7rem;
  float: left;
}
.page-wrap2{
  text-align:center;
}
.page-wrap{
  text-align:left;
  width:300px;
  height:100%;
  margin:0 auto;
}
@media screen and (max-device-width: 1080px) {
    .custom0{
      margin: 0;
      height: auto;
      width: auto;
    }
    .custom{
      width: 100%;
      margin: 0;
      float: none;
    }
    .page-wrap2{
      margin-bottom: 10px;
    }
}
</style>


<nav style="background-color: #07de92">
  
    <div class="" style="background-color: #07de92">
      <a href="<?= base_url('admin/route'); ?>" class="brand-logo right"><img style="height:40px;" class="rounded-circle mr-5 mb-2" src="<?= base_url('assets/image/profile/thumbs/') . $user['image']; ?>" ></a>

      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <?php foreach ($get_info as $val): ?>
        <div class="container">
        <ul class="left hide-on-med-and-down viga_font">
          <li style="text-decoration: none;">NIM : <?= $val['nim']; ?></li>
          <li class="ml-3 " style="text-decoration: none;">NAMA : <?= $val['name']; ?></li>
          <li class="ml-3" style="text-decoration: none;">KELAS : <?= $val['kelas']; ?></li>
          <li class="ml-3" style="text-decoration: none;">JURUSAN : <?= $val['jurusan']; ?></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
          <li><a href="#" style="text-decoration: none;">NIM : <?= $val['nim']; ?></a></li>
          <li><a href="#" style="text-decoration: none;">NAMA : <?= $val['name']; ?></a></li>
          <li><a href="#" style="text-decoration: none;">KELAS : <?= $val['kelas']; ?></a></li>
          <li><a href="#" style="text-decoration: none;">JURUSAN : <?= $val['jurusan']; ?></a></li>
      </ul>
    </div>

  <?php endforeach; ?>

  </div>

  </nav>


<div class="container mt-3">
  <p  id="title_ketua" style="text-align:center; font-size: 20px; font-family: Viga">Which your favorite football club?</p>

 
 
<div class="" id="ketua">
   <div class="row justify-content-md-center">
  <?php foreach ($get_all as $info) : ?>
    <div class="col-6 col-sm-6 col-md-4 col-lg-4">


  <div class="">
    <div class="card">
     <div class="card-image waves-effect waves-block waves-light">
       <img class="activator img_candidat" src="<?= base_url('assets/image/candidate/thumbs/') . $info['foto_calon']; ?>">
     </div>
     <div class="card-content">
       <p class="card-title activator p_nama" style="font-size: 15px;"><?= $info['nama_calon']; ?><i class="material-icons right">more_vert</i></p>

       <p><input class="with-gap" name="ketua" type="radio" id="<?=$info['nama_calon']; ?>" value="<?=$info['nama_calon']; ?>"  />
       <label for="<?=$info['nama_calon']; ?>">Pilih</label></p>
     </div>
     <div class="card-reveal">
       <span class="card-title grey-text text-darken-4"><?= $info['nama_calon']; ?><i class="material-icons right">close</i></span>
       <p ><?php echo $info['desc_calon']; ?></p>
     </div>
   </div>
    </div>


</div>
<?php endforeach; ?>
</div>
</div>   <!-- Ketua -->





 </div> <!-- End of line -->

<?php

  $user = $this->db->get_where('akun', ['id_user' => $this->session->userdata('id_user')])->row_array();
?>
        <?php if ($user['role_id'] == 2) { ?>
<div class="page-wrap">
  <div class="page-wrap2">
<button type="button" id="pilih_ketua" class="btn btn-success" style="position:center;color: white; border-radius:50px">Vote Now ! </button>

</div>
</div>

         <!-- End Class -->
        <?php } ?>


</div>


  <script>
  $(document).ready(function(){
    $(".button-collapse").sideNav();
  $("#pilih_ketua").click(function(){
    if (!$('input[name=ketua]:checked').val() ) {
      swal("Anda belum memilih", "", "warning");
}else{
    swal({
  title: 'Anda yakin ?',
  text: "",
  type: 'question',
  showCancelButton: true,
  allowOutsideClick: false,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Iya'
})
.then(function () {
  var ccs = $("input:radio[name=ketua]:checked").val();
    $.ajax({
    url :'<?php echo site_url('admin/vote/vote_now'); ?>',
    type:'post',
    data:{
      ketua : ccs,
    },
    beforeSend:function(){

    },
    success:function(rs){
      swal({
    title: 'Thank You',
    text: "",
    type: 'success',
    showCancelButton: false,
    allowOutsideClick: false,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'View Progress'
    }).then(function () {
      window.location.href='<?php echo site_url('admin/statistic'); ?>';
    })
      console.log(ccs);
      console.log(ssc);
    }

});
})

}
  });



  

});
</script>
