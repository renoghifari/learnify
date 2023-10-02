<nav class="navbar navbar-expand-lg bg-body-tertiary navborderbottom" style="width:100%; position:fixed;">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="media/learnify.png" alt="Learnify" width="159" height="35">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav-underline">
                <li class="nav-item">
                    <a class="nav-link active" style="color: orange;" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navunderline" href="course/course.php">Course</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navunderline" href="about/about.php">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navunderline" href="contact.php">Contact</a>
                </li>
                <ul class="navbar-nav  mb-2 mb-lg-0 nav-underline">
              <?php if(!isset($_SESSION['id_user'])): ?>
                <li class="nav-item">
                    <button class="nav-link navunderline" id="loginBtn" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                </li>
                <?php endif; ?>
                <?php if(isset($_SESSION['level']) && ($_SESSION['level'] == 'admin' || $_SESSION['level'] == 'user')): ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle navunderline" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Account
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item dropdownhover" href="profile.php">Profile</a></li>
                        <?php if($_SESSION['level'] == 'admin'): ?>
                        <li><a class="dropdown-item dropdownhover" href="course/tambahcourse.php">Tambah Course</a></li>
                        <li><a class="dropdown-item dropdownhover" href="course/arsipmateri.php">Arsip Materi</a></li>
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