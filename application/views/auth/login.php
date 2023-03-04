<!DOCTYPE html>
<html lang="en">

<head>
      <meta name="google-site-verification" content="fioX8wIYTuB26U2zDusK5qWYqWLgJPUcWNPCljxmVwc" />
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?= $title; ?></title>
    <meta name="description" content="IKHZA E-Voting 2021">
  <!-- Keywords -->
  <meta name="keywords" content="Login Page, Login Page">
  <!-- Author -->
  <meta name="author" content="Login Page">
  <meta property="og:type" content="article" />
   <meta property="og:image" content="http://evoting.ipnuippnumernek.com/assets/favicon/favicon.ico">
  <meta property="og:site_name" content="http://evoting.ipnuippnumernek.com/" />


    <!-- Favicon -->
     <link rel="shortcut icon" type="image/png" href="<?= base_url('assets/favicon/favicon.ico'); ?>">
     <link rel="icon" type="image/png" sizes="192x192"  href="<?= base_url('assets/favicon/android-icon-192x192.png'); ?>">
     <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('assets/favicon/favicon-32x32.png'); ?>">
     <link rel="icon" type="image/png" sizes="96x96" href="<?= base_url('assets/favicon/favicon-96x96.png'); ?>">
     <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/favicon/favicon-16x16.png'); ?>">
         <link rel="manifest" href="assets/favicon/manifest.json">


     <!-- Favicon -->





    <link href="<?= base_url(''); ?>assets/sbadmin/dist/css/styles.css" rel="stylesheet" />
    <link href="<?= base_url(''); ?>assets/css/style.css" rel="stylesheet" />

    <style>
        .hilang {
            display: none;
        }
    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body style="background-color: #56fcd0">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-0 rounded-lg mt_login ">
                                <div class=" rounded-0 card-header" style="background-color:#07de92">
                                    <h3 class="text-center text-light my-3 font-weight-bold">E-Voting</h3>

                                    <img src="<?= base_url('assets/image/voteone.png'); ?>" alt="https://www.vectorstock.com/royalty-free-vector/election-voting-vector-734450" class="rounded mx-auto d-block img-thumbnail logo_univ">

                                </div>

                                <div class="card-body bg-light">
                                    <form method="post" action="<?= base_url('auth'); ?>">


                                        <div class="form-group">
                                            <?= $this->session->flashdata('sukses'); ?>
                                            <label class="small mb-1 font-weight-bold" style="color: #07de92;" for="inputEmailAddress">NIM</label>

                                            <input class="form-control py-4" id="inputNim" name="nim" type="nim" placeholder="Enter nim" value="<?= set_value('nim'); ?>" />
                                            <?= form_error('nim', '<small class="text-danger">', '</small>'); ?>
                                        </div>

                                        <div class="form-group" style="margin-top: -18px;">
                                            <label class="small mb-1 font-weight-bold" style="color: #07de92;" for="inputEmailAddress">Password</label>

                                            <input class="form-control py-4" id="Password" name="password" type="password" placeholder="Enter password" value="<?= set_value('password'); ?>" />
                                            <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                                        </div>

                                      

                                        <div class="form-group d-flex align-items-center  mb-0">
                                           




                                            <button type="submit" class="btn  text-light " style="background-color: #07de92;">
                                                Login
                                            </button>

                                       



                                        </div>

                                    </form>

                                </div>


                            </div>
                            <div class="card-footer text-center" style="background-color:#07de92">
                                <div class="small"><li class=" font-italic" style="color: white; list-style: none; padding: 4px; font-size: 14px">Feel free to vote!</li></div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer" style="margin-top: 18px;">
            <footer class="py-3 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="text-center">
                        <div class="text-dark text-center">Copyright &copy; IKHZA E-Voting 2021</div>
                        <div>

                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url(''); ?>assets/sbadmin/src/js/scripts.js"></script>



</body>

</html>