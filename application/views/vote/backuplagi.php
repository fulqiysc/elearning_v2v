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


<nav class="navbar navbar-light bg-danger">
  
    <div class="">
   <!--    <a href="<?= base_url('admin/route'); ?>" class="brand-logo right"><img style="height:30px;" class="rounded-circle mr-3" src="<?php echo base_url('assets/image/voteone.png'); ?>" ></a> -->

      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <?php foreach ($get_info as $val): ?>
        <div class="container">
        <ul class="left hide-on-med-and-down" style="margin-top: -10px">
          <li style="text-decoration: none;">NIM : <?= $val['nim']; ?></li>
          <li class="ml-3" style="text-decoration: none;">NAMA : <?= $val['name']; ?></li>
          <li class="ml-3" style="text-decoration: none;">KELAS : <?= $val['kelas']; ?></li>
          <li class="ml-3" style="text-decoration: none;">JURUSAN : <?= $val['jurusan']; ?></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
          <li><a href="#">NIM : <?= $val['nim']; ?></a></li>
          <li><a href="#">NAMA : <?= $val['name']; ?></a></li>
          <li><a href="#">KELAS : <?= $val['kelas']; ?></a></li>
          <li><a href="#">JURUSAN : <?= $val['jurusan']; ?></a></li>
      </ul>
    </div>

  <?php endforeach; ?>

  </div>

  </nav>

<div class="container">
  <h4 id="title_ketua" style="text-align:center;">Presiden BEM</h4>

  
 
<div class="" id="ketua">
   <div class="row">
  <?php foreach ($get_all as $info) : ?>
    <div class="col-lg-4 col-6">


  <div class="">
    <div class="card">
     <div class="card-image waves-effect waves-block waves-light">
       <img class="activator" src="<?= base_url('assets/image/') . $info['foto_calon']; ?>">
     </div>
     <div class="card-content">
       <span class="card-title activator grey-text text-darken-4"><?= $info['nama_calon']; ?><i class="material-icons right">more_vert</i></span>
       <p><input class="with-gap" name="ketua" type="radio" id="<?=$info['no_urut']; ?>" value="<?=$info['no_urut']; ?>"  />
       <label for="<?=$info['no_urut']; ?>">Pilih</label></p>
     </div>
     <div class="card-reveal">
       <span class="card-title grey-text text-darken-4"><?= $info['nama_calon']; ?><i class="material-icons right">close</i></span>
       <p><?php echo $info['desc_calon']; ?></p>
     </div>
   </div>
    </div>


</div>
<?php endforeach; ?>
</div>
</div>   <!-- Ketua -->





 </div> <!-- End of line -->

<div class="page-wrap">
  <div class="page-wrap2">
<a id="pilih_ketua" class="btn btn-lg btn-primary" style="position:center;color: white"><i class="material-icons right">check</i>Vote Now ! </a>

</div>
</div>




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
    title: 'Terimakasih',
    text: "",
    type: 'success',
    showCancelButton: false,
    allowOutsideClick: false,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Keluar'
    }).then(function () {
      window.location.href='<?php echo site_url('auth/logout'); ?>';
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
