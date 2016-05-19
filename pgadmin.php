<p></p>
<?php


	$subpg = (isset($_GET['subpg']))?$_GET['subpg']:'';

	if(!isset($_SESSION['ISLOGIN'])){

?>
<!--<div class="row">
	<br/>
    <br/>
    <br/>
	<div class="col-sm-4 col-sm-offset-4 well">
    	<h4><i class="fa fa-user fa-fw text-danger"></i>LOG MASUK PENTADBIR</h4>
    	<p></p>
   		<form id="formlogin" name="formlogin" class="form" method="post" action="#">
        		<div class="form-group">
                  <label for="exampleInputEmail1">Katanama</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" />
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Katalaluan</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" />
                </div>
                <div class="form-group text-center">
                  <button type="reset" class="btn btn-danger"><i class="fa fa-close fa-fw"></i>Batal</button>&nbsp;
                  <button type="submit" class="btn btn-success"><i class="fa fa-sign-in fa-fw"></i>Log Masuk</button>
               </div>
        </form>
    </div>
</div>-->
<?php

	}

?>
<p></p>
<h3>PERMOHONAN BANTUAN&nbsp;<small>Pengurusan Bantuan</small></h3>
<hr>
<div class="row">
	<div class="col-md-2">
    	<ul class="nav nav-stacked">
          <li role="presentation"><a href="<?php echo $_SERVER['PHP_SELF']."?pg=admin&subpg=subhome"; ?>">Laman Utama</a></li>
          <li role="presentation"><a href="<?php echo $_SERVER['PHP_SELF']."?pg=admin&subpg=subagihan"; ?>">Agihan Bantuan</a></li>
        </ul>
    </div>
	<div class="col-md-10">
    <?php
	
			if($subpg == "subhome"){
				include("subpghome.php");
			}else if($subpg == "subagihan
			"){
				include("subpgagihan.php");
			}else{
				include("subpghome.php");	
			}
	
	?>
    </div>
</div>