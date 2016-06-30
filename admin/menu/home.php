<!--main content start-->
<section id="main-content">
  <section class="wrapper">            
    <!--overview start-->
	  <div class="row">
  		<div class="col-lg-12">
  			<h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
  			<ol class="breadcrumb">
  				<li><i class="fa fa-home"></i>Home</li>
  				<li><i class="fa fa-laptop"></i>Dashboard</li>						  	
  			</ol>
  		</div>
  	</div>
    <?php 
      include_once("../db/config.inc.php");
      $qry[0] = "SELECT * FROM soal";
      $qry[1] = "SELECT * FROM data";
      $qry[2] = "SELECT * FROM messages";
      $qry[3] = "SELECT * FROM admin";
      $totalPosts = mysqli_num_rows(mysqli_query($link,$qry[0]));
      $totalUsers = mysqli_num_rows(mysqli_query($link,$qry[1]));
      $totalMessages = mysqli_num_rows(mysqli_query($link,$qry[2]));
      $totalAdmins = mysqli_num_rows(mysqli_query($link,$qry[3]));
    ?>
    <div class="row">
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
				<div class="info-box blue-bg">
					<i class="icon_document_alt"></i>
					<div class="count"><?=$totalPosts?></div>
					<div class="title">Posts</div>						
				</div><!--/.info-box-->			
			</div><!--/.col-->
			
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
				<div class="info-box brown-bg">
					<i class="icon_group"></i>
					<div class="count"><?=$totalUsers?></div>
					<div class="title">Users</div>						
				</div><!--/.info-box-->			
			</div><!--/.col-->	
			
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
				<div class="info-box dark-bg">
					<i class="icon_mail_alt"></i>
					<div class="count"><?=$totalMessages?></div>
					<div class="title">Messages</div>						
				</div><!--/.info-box-->			
			</div><!--/.col-->
			
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
				<div class="info-box green-bg">
					<i class="icon_group"></i>
					<div class="count"><?=$totalAdmins?></div>
					<div class="title">Admin</div>						
				</div><!--/.info-box-->			
			</div><!--/.col-->
		</div><!--/.row-->
  </section>
</section>
<!--main content end-->