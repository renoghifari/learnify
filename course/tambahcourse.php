<?php
include ('../connection.php');
session_start();
?>

<?php
$carikode = mysqli_query($connection,"SELECT max(id_video) from course") or die(mysql_error());
$datakode = mysqli_fetch_array($carikode);
 if ($datakode){

  $nilaikode = substr($datakode[0], 1);
  $kode = (int) $nilaikode;
  $kode = $kode +1;
  $kode_otomatis = "V".str_pad($kode, 2,"0", STR_PAD_LEFT);

 }else{
   $kode_otomatis="v01";
 }
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
 </head>
 <body>
  
 
<link rel="stylesheet" href="../assets/bootstrap-4.3.1-dist/css/bootstrap.css">


<div class="container" style="margin-top:20px">
		<h2>Tambah Course</h2>

  <form action="actioncourse.php" method="POST" enctype="multipart/form-data">

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Kode Video</label>
    <div class="col-sm-10">
    <input type="text" readonly class="form-control" name="id_video" placeholder="kode user" value="<?= $kode_otomatis ?>">
    </div>
  </div>

  <?php
    $username= $_SESSION['username'];
    $data=mysqli_query($connection,"SELECT * FROM user WHERE username='$username'");
    $b=mysqli_fetch_array($data);
    $id_user =$b['id_user'];
  ?>

  <div class="form-group row">
    <input type="hidden" class="form-control" name="id_user" value="<?= $id_user ?>">
  </div>

  <div class="form-group row ">
    <label class="col-sm-2 col-form-label">Judul</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" name="judul" placeholder="Judul">
</div>
  </div>

  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Tanggal Upload</label>
    <div class="col-sm-10">
    <input type="date" class="form-control" name="tanggal" >
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Thumbnail</label>
    <div class="col-sm-10">
    <input type="file" class="form-control" name="thumbnail" >
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Video</label>
    <div class="col-sm-10">
    <input type="file" class="form-control" name="video" >
    </div>
    <?php
    if(isset($_GET['pesan'])) {
      if($_GET['pesan'] == 'gagal'){
        echo "<font color='red'><i>*File anda gagal terupload, silahkan cek format file</i></font>";
      }
    }
    ?>
  </div>
  <div class="form-group row">
  <label class="col-sm-2 col-form-label">&nbsp;</label>
  <div class="col-sm-10">
    <a class="btn btn-danger" href="course.php">Kembali</a>
    <input type="submit" class="btn btn-warning form-submit" value="Simpan" >
  </div>
  </div>
  </div>

  </form>
  </body>
 </html>

