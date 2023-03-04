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

<nav>
    <div class="nav-wrapper">
      <a href="#!" class="brand-logo right"><img style="height:30px;" class="rounded-circle mt-2" src="<?php echo base_url('assets/image/voteone.png'); ?>" ></a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <?php foreach ($get_info as $val): ?>
        <ul class="left hide-on-med-and-down">
          <li><a href="#">NIM : <?= $val->nim; ?></a></li>
          <li><a href="#">NAMA : <?= $val->name; ?></a></li>
          <li><a href="#">KELAS : <?= $val->kelas; ?></a></li>
          <li><a href="#">JURUSAN : <?= $val->jurusan; ?></a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
          <li><a href="#">NIM : <?= $val->nim; ?></a></li>
          <li><a href="#">NAMA : <?= $val->name; ?></a></li>
          <li><a href="#">KELAS : <?= $val->kelas; ?></a></li>
          <li><a href="#">JURUSAN : <?= $val->jurusan; ?></a></li>
      </ul>

  <?php endforeach; ?>

  </div>
  </nav>

  <h4 id="title_ketua" style="text-align:center;">Presiden BEM</h4>


<div class="custom0" id="ketua">
  <div class="custom">
    <div class="card">
     <div class="card-image waves-effect waves-block waves-light">
       <img class="activator" src="<?php echo $img_calon['ketua1']; ?>">
     </div>
     <div class="card-content">
       <span class="card-title activator grey-text text-darken-4"><?php echo $nama_calon['ketua1']; ?><i class="material-icons right">more_vert</i></span>
       <p><input class="with-gap" name="ketua" type="radio" id="ketua1" value="ketua1"  />
       <label for="ketua1">Pilih</label></p>
     </div>
     <div class="card-reveal">
       <span class="card-title grey-text text-darken-4"><?php echo $nama_calon['ketua1']; ?><i class="material-icons right">close</i></span>
       <p><?php echo $info_calon['ketua1']; ?></p>
     </div>
   </div>
    </div>


<div class="custom">
  <div class="card">
   <div class="card-image waves-effect waves-block waves-light">
     <img class="activator" src="<?php echo $img_calon['ketua2']; ?>">
   </div>
   <div class="card-content">
     <span class="card-title activator grey-text text-darken-4"><?php echo $nama_calon['ketua2']; ?><i class="material-icons right">more_vert</i></span>
     <p><input class="with-gap" name="ketua" type="radio" id="ketua2" value="ketua2"  />
     <label for="ketua2">Pilih</label></p>
   </div>
   <div class="card-reveal">
     <span class="card-title grey-text text-darken-4"><?php echo $nama_calon['ketua2']; ?><i class="material-icons right">close</i></span>
     <p><?php echo $info_calon['ketua2']; ?></p>
   </div>
 </div>
</div>


<div class="custom">
  <div class="card">
   <div class="card-image waves-effect waves-block waves-light">
     <img class="activator" src="<?php echo $img_calon['ketua3']; ?>">
   </div>
   <div class="card-content">
     <span class="card-title activator grey-text text-darken-4"><?php echo $nama_calon['ketua3']; ?><i class="material-icons right">more_vert</i></span>
     <p><input class="with-gap" name="ketua" type="radio" id="ketua3" value="ketua3"  />
     <label for="ketua3">Pilih</label></p>
   </div>
   <div class="card-reveal">
     <span class="card-title grey-text text-darken-4"><?php echo $nama_calon['ketua3']; ?><i class="material-icons right">close</i></span>
     <p><?php echo $info_calon['ketua3']; ?></p>
   </div>
  </div>
  </div>
</div>





 </div> <!-- End of line -->


<div class="page-wrap">
  <div class="page-wrap2">
<a id="pilih_ketua" class="waves-effect waves-light btn" style="position:center;"><i class="material-icons right">check</i>Pilih Ketua </a>

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
