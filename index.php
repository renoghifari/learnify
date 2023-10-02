<?php 
include("connection.php"); 

session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Learnify</title>
    <link rel="icon" type="image/x-icon" href="assets/media/logo.png">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="query-3.7.0.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
        .dropdownhover:hover {
            background-color : orange;
        }
        .dropdownredhover:hover {
            background-color: #ff4747;
        }
        .navunderline:hover {
            color: orange;
        }
        .navunderlineactive {
            color: orange;
        }
        .navborderbottom {
            border-bottom: 1px solid #cccccc;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary navborderbottom" style="width:100%; position:fixed;">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="assets/media/learnify.png" alt="Learnify" width="159" height="35">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav-underline">
              
               
                </ul>
                <ul class="navbar-nav  mb-2 mb-lg-0 nav-underline">
                <li class="nav-item">
                    <a class="nav-link active" style="color: orange;" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navunderline" href="course/course.php">Course</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navunderline" href="about/about.html">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navunderline" href="#footer">Contact</a>
                </li>
              <?php if(!isset($_SESSION['id_user'])): ?>
                <li class="nav-item">
                    <button class="nav-link navunderline" id="loginBtn" data-bs-toggle="modal" data-bs-target="#exampleModal">Login</button>
                </li>
                <?php endif; ?>
                <?php if(isset($_SESSION['level']) && ($_SESSION['level'] == 'admin' || $_SESSION['level'] == 'user')): ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle navunderline" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Account
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item dropdownhover" href="profile/profile.php">Profile</a></li>
                        <?php if($_SESSION['level'] == 'admin'): ?>
                        <li><a class="dropdown-item dropdownhover" href="course/tambahcourse.php">Tambah Course</a></li>
                        <?php endif; ?>
                        <?php if($_SESSION['level'] == 'admin'): ?>
                        <li><a class="dropdown-item dropdownhover" href="course/arsipcourse.php">Arsip Course</a></li>
                        <?php endif; ?>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item dropdownredhover" href="logout.php">Logout</a></li>
                    </ul>
                </li>
                <?php endif; ?>
            </ul>
            </ul>
            
            </div>
        </div>
    </nav>
    <!--================Home Banner Area =================-->
<section class="home_banner_area" style="display:flex; height:100vh; align-items:center; justify-content:center;"  >

<div class="banner_inner d-flex align-items-center" style="background-image:url('assets/media/mengajar1.png'); width:100%; height:100vh; align-self:center   
;">
    <div class="container">
        <div class="banner_content text-center">
            <h3 class="fade-up fs-2 fw-bold "style="color:orange;  font-family:Candara; class-duration="1600">Learnify :  Membuka Pintu <br> Menuju Pengetahuan Terbaik Online</h3>
            <p class="fade-up  fw-bold" style="color:orange; font-family: Verdana;"class-duration="1900">Dengan Learnify kemudahan kegiatan belajar mengajar dapat terpenuhi. Para guru dan siswa dapat<br>
                belajar meski banyak halangan atau rintangan. Nikmati Pembelajaran terstruktur dan efektif<br> menggunakan Learnify  serta kemudahan belajar dengan menggunakan aplikasi kami. </p>
                <a onclick="showSignup()" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-warning">Daftar Sekarang</a>
        </div>
    </div>
</div>
</section>


<div class="my-5">
  <div class="p-5 text-center">
    <div class="container py-5">
      <h1 class="text-body-emphasis">Learnify</h1>
      <p class="col-lg-8 mx-auto lead">
      Learnify adalah sebuah platform kursus online yang bertujuan untuk memberikan akses ke pengetahuan dan pembelajaran berkualitas kepada siapa saja, di mana saja, dan kapan saja. 
      </p>
    </div>
  </div>
</div>

     <?php include 'template/footer.php'; ?>

</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-4 shadow">
                    <div class="modal-header p-4 pb-4 border-bottom-0">
                        <p class="fw-bold mb-0 fs-1">Learnify</p>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <nav>
                        <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Login</button>
                            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Register</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="exampleModalLabel" tabindex="0">
                        <form action="proses-login.php" method="POST">
                                <div class="modal-body p-5 pt-0 mt-4">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control rounded-3" id="username" name="username" placeholder="Masukan Username" required>
                                        <label for="username">Username</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control rounded-3" id="password" name="password" placeholder="Masukan Password" required>
                                        <label for="password">Password</label>
                                    </div>
                                    <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" name="remember" checked>
                            <label class="form-check-label" for="flexCheckChecked">
                              Remember Me
                            </label>
                            </div>
                            <div class="modal-footer">
                          <button type="submit" id="signupBtn" class="btn btn-warning">Sign Up</button>
                          <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                            </div>
                            </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="exampleModalLabel" tabindex="0">
                        <form action="proses-signup.php" method="POST">
                                <div class="modal-body p-5 pt-0 mt-4">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control rounded-3" id="username" name="username" placeholder="Masukan Username" required>
                                        <label for="username">Username</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control rounded-3" id="password" name="password" placeholder="Masukan Password" required>
                                        <label for="password">Password</label>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" id="signupBtn" class="btn btn-warning">Sign In</button>
                                         <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                                    </div>
                                    <small class="text-body-secondary">By clicking Sign In, you agree to the terms of use.</small>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script>
        const triggerTabList = document.querySelectorAll('#myTab button')
        triggerTabList.forEach(triggerEl => {
            const tabTrigger = new bootstrap.Tab(triggerEl)

            triggerEl.addEventListener('click', event => {
                event.preventDefault()
                tabTrigger.show()
            })
        })
    </script>

</body>
</html>