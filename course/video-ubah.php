<?php
include '../connection.php';
session_start();
?>


<link rel="stylesheet" href="../assets/bootstrap-4.3.1-dist/css/bootstrap.css">
<div class="container" style="margin-top:20px">
		<h2>Edit Course</h2>


<?php
$id_video=$_GET['id_video'];
$det= mysqli_query($connection, "SELECT * FROM course WHERE id_video='$id_video'");
while($d=mysqli_fetch_array($det)){
    

?>
    <form action="video-ubah-act.php" method="POST" enctype="multipart/form-data">

    <div class="form-group">
        <label>Id Video</label>
        <input type="text" readonly class="form-control" name="id_video" placeholder="id video" value="<?= $d['id_video'] ?>">
    </div>

    
    <div class="form-group">
        <label>Judul</label>
        <input type="text"  class="form-control" name="judul" placeholder="Judul" value="<?= $d['judul'] ?>"/>
    </div>

    
    <div class="form-group">
        <label>Tanggal Upload</label>
        <input type="date" class="form-control" name="tanggal" value="<?= $d['tanggal'] ?>"/>
    </div>

    
    <div class="form-group">
        <label>Video</label>
        <input type="file" class="form-control" name="video" value="<?= $d['video'] ?>"/>
    </div>

    <div class="form-group">
        <a class="btn btn-danger" href="arsipcourse.php">Back</a>
        <input class="btn btn-warning" type="submit" class="form-submit" value="Ubah">
    </div>
    </form>

    <?php } ?>
</div>