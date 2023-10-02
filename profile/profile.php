<?php
include '../connection.php';
session_start();
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <form action="ganti-pass.php" method="POST">
    <input type="hidden" name="username" value="<?= $_SESSION['username']?>">
	<div class="row">
		<div class="col-sm-4">
		    <label>Current Password</label>
		    <div class="form-group pass_show"> 
                <input type="text"  name="pass_lama" class="form-control" placeholder="Current Password"> 
            </div> 
		       <label>New Password</label>
            <div class="form-group pass_show"> 
                <input type="text"name="pass_baru" class="form-control" placeholder="New Password" required> 
            </div> 
		       <label>Confirm Password</label>
            <div class="form-group pass_show"> 
                <input type="text" name="konfirmasi_pass" class="form-control" placeholder="Confirm Password" required> 
            </div> 
            <button type="submit" class="btn btn-primary">Ubah</button>
            <a href="../index.php" class="btn btn-warning">KEMBALI</a>
            </form>
            
		</div>  
	</div>
</div>