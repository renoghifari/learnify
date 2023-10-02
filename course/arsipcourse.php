<?php

include '../connection.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Learnify</title>
    <link rel="icon" type="image/x-icon" href="../assets/media/logo.png">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <script src="query-3.7.0.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
	<script src="../assets/js/jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">

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
<nav class="navbar navbar-expand-lg bg-body-tertiary navborderbottom" >
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="../assets/media/learnify.png" alt="Learnify" width="159" height="35">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav-underline">
    </ul>
                <ul class="navbar-nav  mb-2 mb-lg-0 nav-underline">
                <li class="nav-item">
                    <a class="nav-link navunderline"  aria-current="page" href="../index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navunderline" href="course.php">Course</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navunderline" href="about/about.php">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navunderline" href="#footer">Contact</a>
                </li>
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
                        <li><a class="dropdown-item dropdownhover" href="profile/profile.php">Profile</a></li>
                        <?php if($_SESSION['level'] == 'admin'): ?>
                        <li><a class="dropdown-item dropdownhover" href="course/tambahcourse.php">Tambah Course</a></li>
                        <?php endif; ?>
                        <?php if($_SESSION['level'] == 'admin'): ?>
                        <li><a class="nav-link active dropdown-item dropdownhover"style="color: orange;" href="course/arsipcourse.php">Arsip Course</a></li>
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
	
	<div class="container" style="margin-top:40px">
		<h2>Daftar Video</h2>
		
		<hr>
		
		<table class="table table-striped table-hover table-sm table-bordered">
			<thead class="thead-dark" style="text-align: center;">
				<tr>
					<th>No</th>
                    <th>User</th>
					<th>Judul Video</th>
					<th>Tanggal Upload</th>
					<th>Thumbnail</th>
					<th>Video</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel databuku urut berdasarkan id yang paling besar
				$sql = mysqli_query($connection, "SELECT * FROM course ORDER BY id_video DESC") or die(mysqli_error($koneksi));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if(mysqli_num_rows($sql) > 0){
					//membuat variabel $no untuk menyimpan nomor urut
					$no = 1;
					//melakukan perulangan while dengan dari dari query $sql
					while($data = mysqli_fetch_assoc($sql)){
						//menampilkan data perulangan
						echo '
						<tr>
							<td>'.$no.'</td>
                            <td>'.$data['id_user'].'</td>
							<td>'.$data['judul'].'</td>
							<td>'.$data['tanggal'].'</td>
							<td>'.$data['thumbnail'].'</td>
							<td>'.$data['video'].'</td>
							<td>
                                <a href="video-detail.php?id_video='.$data['id_video'].'" class="badge badge-primary">View</a>
								<a href="video-ubah.php?id_video='.$data['id_video'].'" class="badge badge-warning">Edit</a>
								<a href="video-hapus.php?id_video='.$data['id_video'].'" class="badge badge-danger" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
							</td>
						</tr>
						';
						$no++;
					}
				//jika query menghasilkan nilai 0
				}else{
					echo '
					<tr>
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
				}
				?>
			<tbody>
		</table>
		
	</div>
	

	<script src="../assets/js/jquery.js"></script>
	<script src="../assets/js/popper.js"></script>
	<script src="../assets/js/bootstrap.js"></script>
	<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
	<script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
	<script>
	
	</script>

</body>
</html>
