	<style>
	  body {
	    background-color: #E4E4E4;
	    
	  }
	  .divText{
	  	font-family: Verdana, Geneva, sans-serif;
		font-size: 18px;
	  }
	  a {
	  	color: black;
	  }
	  #mynavbar a{
	    color: #dfdbdb;
	  }
	  #navbarbawah a{
	    color: black;
	  }
	  #navbarbawah div{
	    margin-top: 3%;
	  }
	  .postButton{
	    background: #FFFF00;
	    color: black;
	    border-style: none;
	  }
	  #coba{
	    top: 65px;
	  }
	  #pic{
	    border: 5px solid white;
	  }
	  #tujuan{
	    text-decoration: underline;
	  }
	  .inipos{
	    border: 5px solid;
	  }
	  #profpic{
	    width: 15%;
	    height: 25%;
	  }
	  #finalPost{
	    background: white;
	    color: black;
	    border-style: none;
	    height: 165px;
	  }
	  .anonim{
	    margin-left: 100px;
	  }
	  .bagian-bawah{
	    margin-bottom: 5%;
	  }
	  #navbar{
	    border: 1px solid blue;
	    margin-top: 3%;
	  }
	  #subnavbar{
	    text-align: center;
	    font-size: 25px;
	    margin-top: 1%;
	    border: 2px solid white;
	    background-color: white;
	    height: 45px;
	  }
	  #search-content{
	    margin-top: 30px;
	  }
	  .row{
	    margin-right: 0px;
	  }
	  .navbar-bottom {
	      margin-bottom: 0px;
	      bottom: 0;
	      width: 100%;
	  }

	  @media screen and (max-width:728px){
		  .divText{
		  	font-family: Verdana, Geneva, sans-serif;
			font-size: 14px;
		  }
		  .headNotif{
		  	font-size: 16px;
		  }
	  }
	  @media screen and (max-width:1000px){
	    .form-control{
	      width: 90%;
	    }
	    #datadiri {
	      margin-top: 50px;
	      border: 1px solid white;
	    }
	    #datadiri h3{
	      text-align: center;
	    }
	    #coba h4{
	      text-align: center;
	    }
	    #finalPost{
	      height: 300px;
	      width: 84%;
	      left: 9%;
	      border-radius: 5px;
	    }
	    #navbarbawah{
	      margin-top: 10px;
	      margin-bottom: 10px;
	    }
	    .bagian-bawah{
	      margin-bottom: 15%;
	    }
	    #coba{
	      margin-top: 20px; 
	    }
	    #subnavbar{
	      width: 90%;
	      left: 6%;
	      border-radius: 5px;
	    }
	    #profpic img{
	      margin: auto;
	    }
	    #search-input input{
	      width: 60%;
	    }
	  }
	  .box-post {
	    background-color: white;
	    border-radius: 20px;
	    margin-bottom: 10px;
	  }
	  .divJenis {
	    margin-bottom: 10px;
	    background-color: #f0ad4e;	    
	  }
	  .unread {
	  	background-color: white;
	  }
	  .read {
	  	background-color: #E4E4E4;
	  }
	  .image {
		position: relative;
		overflow: hidden;
		padding-bottom:100%;
	  }
	  .image img {
		position: absolute;
		max-width: 100%;
		max-height: 100%;
		top: 50%;
		left: 50%;
		transform: translateX(-50%) translateY(-50%);
	  }
</style>
</head>

<body>
	<nav class="navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<div class="navbar-brand" id="myNavbar"><a href="<?php echo base_url(); ?>">UI Smart Report</a></span></div>
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>                        
				</button>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
        			<li><a href="#">About Us</a></li>
      			</ul>
      			<ul class="nav navbar-nav navbar-right">
			        <li><span class="navbar-brand"><a href="<?php echo base_url('profile'); ?>">Profile</a></span></li>
			        <li><span class="navbar-brand"><a href="<?php echo base_url('setting'); ?>">Setting</a></span></li>
			        <li><span class="navbar-brand"><a href="<?php echo base_url('notifications'); ?>">Notifications <?php if ($count_notif > 0) { ?><span class="label label-warning"><?php echo $count_notif; ?></span><?php } ?></a></span></li>
			        <li><span class="navbar-brand"><a href="#" data-toggle="modal" data-target="#myModal">Logout</a></span></li>
      			</ul>
			</div>
		</div>
	</nav>
	<br><br><br><br>
	<!-- Logout Modal-->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Are you sure you want to log out?</h4>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
	        <a href="<?php echo base_url('logout'); ?>" class="btn btn-primary" role="button">Yes</a>
	      </div>
	    </div>
	  </div>
	</div>
	<!-- End of Logout Modal-->
	<div class="row">
		<div class="col-xs-offset-1 col-xs-5 col-sm-offset-1 col-sm-5 col-md-offset-1 col-md-7">
			<h3 class="headNotif"><b>Notifications</b></h3>
		</div>
		<div class="col-xs-6 col-sm-6 col-md-3 text-right">
			<a href="<?php echo base_url('notifications/markallasread'); ?>" class="headNotif"><button type="button" class="btn btn-default btn-md" title="Mark all as read">Mark all as read</button></a>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-offset-1 col-xs-11 col-sm-offset-1 col-sm-11 col-md-offset-1 col-md-10" id="divNotif">
					<?php
						foreach($notif as $row) {
							echo "<div class=\"row\">";
							echo "<a href=".base_url()."post/view/".$row->PostId."><div class=\"divJenis";
							if($row->Status) {
								echo " unread\">";
							} else {
								echo " read\">";
							}
							echo "<div class=\"row\">";
							echo "<div class=\"hidden-xs hidden-sm col-md-1\">";
							if($row->PictLink != null && $row->IsAnonymous && $this->session->userdata['admin'] && $row->NotesId == 2) {
								echo "<img src=\"".$row->PictLink."\" class=\"img-rounded\" width=\"100%\">";
							} else {
								echo "<img src=\"".base_url('assets/images/makara.png')."\" class=\"img-rounded\" width=\"100%\">";
							}
							echo "</div>";
							echo "<div class=\"col-xs-7 col-sm-7 col-md-8 divText\">";
							if($row->IsAnonymous && !$this->session->userdata['admin'] && $row->NotesId == 2) {
								echo 'Anonymous '.$row->Notes;
							} else {
								echo $row->Name.' '.$row->Notes;
							}
							echo "</div>";
							echo "<div class=\"col-xs-5 col-sm-5 col-md-3 text-right divText\">";
							date_default_timezone_set("Asia/Jakarta");
							$timestamp = mysql_to_unix($row->Timestamps);
							$timespan = timespan($timestamp)." Ago";

							if ((now() - $timestamp) >= (24*60*60)) {
								$timespan = date('F d, Y', $timestamp);
							}
							echo $timespan;
							echo "</div>";
							echo "</div>";
							echo "</div></a>";
							echo "</div>";
						}
					?>
			</div>
		</div>
	</div>
