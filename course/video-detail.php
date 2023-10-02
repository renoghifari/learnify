<?php
include '../connection.php';
session_start();
?>
<div class="container">
    <div class="row">
        <ol class="breadcrumb" style="box-shadow: 2px 2px 8px #888888;">
            <h4>Video</h4>
        </ol>
    </div>
<?php
    $id_video = $_GET['id_video'];
    $data = mysqli_query($connection, "SELECT * FROM user a, course b WHERE a.id_user=b.id_user AND b.id_video='$id_video' ORDER BY b.id_video ASC");
    while($b=mysqli_fetch_array($data)){
        ?>
        <video width="100%" height="500px" style="background-color: #282d32; border:1px solid; box-shadow: 2px 2px 8px #000000;" controls><source src="../assets/arsip/<?= $b['video']?>" type=""></video>

        <h4><b><?= $b['judul'] ?> - By (<?= $b['username']?>)</b></h4>
        Tanggal Upload : <?= $b['tanggal'];?>
<?php
    }
?>


</div>