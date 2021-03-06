<style>
	body {
		background-color: #E4E4E4;
	}
	
	#postAndProfil {
		height: 300px;
	}
	
	#mynavbar a{
    	color: #dfdbdb;
  	}

	@media screen and (min-width:768px){
		.row{
			margin-right: 0px;
		}
	}
	
	.box-post {
		background-color: white;
    	border-radius: 20px;
    	margin-bottom: 10px;
	}
	
	.bottom-post {
		margin-bottom: 20px;
	}
	
	.navbar-bottom {
	    margin-bottom: 0px;
	    bottom: 0;
	    width: 100%;
  	}

	@media screen and (max-width:768px) {
		#profpic img{
			display: block;
			margin-left: auto;
    		margin-right: auto
		}
	   
		#datadiri h3{
			text-align: center;
		}
	   
		.form-control{
			width: 90%;
		}
	   
		#postAndProfil{
			height: 670px;
		}
	   
		.formRow{
			margin-bottom: 10px;
		}
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
<script>
$(document).ready(function(){
	$('#mention').tokenfield({
		autocomplete: {
			<?php
				echo "source: [";
				foreach ($mention as $row){
					if(substr_count($row->Username, "admin") == 0) {
						echo '{label: \''.$row->Name.'\', value: \''.$row->Username.'\'}, ';
					}
				}
				echo "],";
			?>
			delay: 100
		},
		showAutocompleteOnFocus: true
	});
	
	$('#mention').on('tokenfield:createtoken', function (event) {
		var existingTokens = $(this).tokenfield('getTokens');
		$.each(existingTokens, function(index, token) {
			if (token.value === event.attrs.value)
				event.preventDefault();
		});
	});
	
	$('#post').focusin(function() {
		$('#formPost').collapse('show');
		$('#formLabel').collapse('hide');
		$('#post').prop('rows', 3);
		$('#post').prop('placeholder', 'Description');
	});
	
});
</script>
<body>
<nav class="navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<div class="navbar-brand">UI Smart Report</div>
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
<div class="row" id="postAndProfil">
	<div class="col-md-offset-1 col-md-2" id="profpic">
		<?php if ($PictLink == null) { ?>
		<img src="<?php echo base_url('assets/images/makara.png'); ?>" class="img-rounded" alt="Cinque Terre" width="200px" height="200px"> 
		<?php } else { ?>
		<img src="<?php echo $PictLink; ?>" class="img-rounded" alt="Cinque Terre" width="200px" height="200px">
		<?php } ?>
	</div>
	
	<div class="col-md-3" id="datadiri">
		<?php if (!$isSPAcc) { ?>
		<h3 class="text-left"><?php echo $Name; ?></h3>
		<h3 class="text-left"><?php echo $NPM; ?></h3>
		<h3 class="text-left"><?php echo ucwords(strtolower($Role.' '.$Faculty)); ?></h3>
		<?php } else { ?>
		<h3 class="text-left"><?php echo $Name; ?></h3>
		<h3 class="text-left"><?php echo $Email; ?></h3>
		<h3 class="text-left"><?php echo $Contact; ?></h3>
		<?php } ?>
	</div>
	
	<div class="col-md-5">
		<?php if ($error != '') { ?>
		<div class="alert alert-danger" role="alert"><?php echo $error; ?></div>
		<?php } ?>
		<form role="form" class="form-horizontal" action="<?php echo base_url('timeline'); ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
			<div class="form-group">
		    	<div class="col-xs-offset-1 col-xs-10 col-sm-12 col-md-12">
				<h3 class="text-left collapse in" id="formLabel">What's happening in UI?</h3>
		    	<textarea class="form-control" id="post" name="post" rows="1" placeholder="Write here..." required></textarea>
				</div>
		  	</div>
			<div id="formPost" class="collapse">
				<div class="form-group">
					<div class="col-xs-offset-1 col-xs-10 col-sm-12 col-md-12">
					<input type="text" class="form-control" id="mention" name="mention" placeholder="To Organization" required>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-offset-1 col-xs-10 col-sm-12 col-md-12">
					<input type="text" class="form-control" id="title" name="title" placeholder="An Event" required>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-offset-1 col-xs-11 col-sm-2 col-md-2 formRow">
						<div class="checkbox">
						<label>
						<input type="checkbox" id="anonymous" name="anonymous" value="true"> Anonymous
						</label>
						</div>
					</div>
					<div class="col-xs-offset-1 col-xs-11 col-sm-3 col-md-3 formRow">
						<input type="file" id="userfile" name="userfile">
					</div>
					<div class="col-xs-offset-1 col-xs-11 col-sm-3 col-md-3 formRow">
						<button type="submit" class="btn btn-primary btn-lg" value="Submit">Post</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
<?php
	$i = 1;
	$last_page = false;
	foreach ($timeline as $row) {
		if ($row->Status) {
			date_default_timezone_set("Asia/Jakarta");
			$timestamp = mysql_to_unix($row->Timestamp);
			$timespan = timespan($timestamp)." Ago";

			if ((now() - $timestamp) >= (24*60*60)) {
				$timespan = date('F d, Y', $timestamp);
			}
		
			if ($i % 3 == 1) {
				echo "<div class=\"row\">";
				echo "<div class=\"col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10\">";
				echo "<div class=\"row\">";
				echo "<div class=\"col-md-4\">";
				echo "<div class=\"row\">";
				echo "<div class=\"col-xs-12 col-sm-12 col-md-12 box-post\">";
			} else {
				echo "<div class=\"col-md-4\">";
				echo "<div class=\"row\">";
				echo "<div class=\"col-xs-12 col-sm-12 col-md-12 box-post\">";
			}
?>
			<div class="row">
				<div class="col-xs-4">
					<h5><?php if ($row->IsPinned) { echo "<img src=\"".base_url('assets/images/office-material.png')."\" class=\"img-rounded\" width=\"15px\" height=\"15px\" />";} ?></h5>
				</div>
				<div class="col-xs-8">
					<h5 class="text-right"><?php echo $timespan; ?></h5>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="image">
						<?php if ($row->PictLink == null || ($row->IsAnonymous && !$this->session->userdata['admin'])) { ?>
						<img src="<?php echo base_url('assets/images/makara.png'); ?>" class="img img-rounded img-responsive" alt="Cinque Terre"> 
						<?php } else { ?>
						<img src="<?php echo $row->PictLink; ?>" class="img img-rounded img-responsive" alt="Cinque Terre">
						<?php } ?>
					</div>
				</div>
				<div class="col-md-8">
					<?php if ($row->IsAnonymous && ($this->session->userdata['admin'] || $row->OwnerId == $this->session->userdata['username'])) { ?>
					<h5><a href="<?php echo base_url('people/posts/'.$row->Username); ?>"><?php echo $row->Name; ?> (Anonymous)</a></h5>
					<?php } else if ($row->IsAnonymous) { ?>
					<h5>Anonymous</h5>
					<?php } else { ?>
					<h5><a href="<?php echo base_url('people/posts/'.$row->Username); ?>"><?php echo $row->Name; ?></a></h5>
					<?php } ?>
					<p><?php echo "<img src=\"".base_url('assets/images/people.png')."\" class=\"img-rounded\" width=\"15px\" height=\"15px\">"; ?> 
					<?php $post_mentions = $this->Post_model->get_mentions($row->Id);
					$is_first = true;
					foreach ($post_mentions as $row2){
						if($is_first) {
							echo "<a href=\"".base_url('people/posts/'.$row2->Username)."\">".$row2->Name."</a>";
							$is_first = false;
						} else {
							echo ", <a href=\"".base_url('people/posts/'.$row2->Username)."\">".$row2->Name."</a>";
						}
						
					} ?></p>
					<p><?php echo "<img src=\"".base_url('assets/images/tool(2).png')."\" class=\"img-rounded\" width=\"15px\" height=\"15px\">"; ?> <?php echo $row->Title; ?></p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-offset-1 col-md-10">
					<?php if ($row->Attachments != null) { ?>
					<img src="<?php echo $row->Attachments; ?>" class="img-rounded center-block img-responsive" alt="Cinque Terre">
					<?php } ?>
					<p>
						<?php
							if (strlen($row->Data) <= 200) {
								echo nl2br($row->Data);
							} else {
								echo substr(nl2br($row->Data), 0, 200).'... <a href="'.base_url('post/view/'.$row->Id).'">see more</a>';
							}
						?>
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-6 col-sm-6 col-md-6">
					<h5><?php if ($this->Post_model->count_comment($row->Id) > 1) { echo $this->Post_model->count_comment($row->Id); ?> Comments<?php } else { echo $this->Post_model->count_comment($row->Id); ?> Comment<?php } ?></h5>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6">
					<h5 class="text-right"><a href="<?php echo base_url('post/view/'.$row->Id); ?>">View Details</a></h5>
				</div>
			</div>
		</div>
		</div>
		</div>
<?php	
			if ($i % 3 == 0) {
				echo "</div>";
				echo "</div>";
				echo "</div>";
			}
			
			if ($row->Id == $this->Post_model->get_first_post_id()) {
				$last_page = true;
			}
			$i++;
		}
	}
	if ($i-1 % 3 != 0) {
		echo "</div>";
		echo "</div>";
	}
	
?>
<div class="row">
	<div class="col-xs-offset-1 col-xs-5 col-md-offset-1 col-md-5">
		<?php if ($page > 1) { ?>
		<a href="<?php echo base_url()."timeline/page/".($page-1); ?>" class="btn btn-primary">Previous Page</a>
		<?php } ?>
	</div>
	<div class="col-xs-5 col-md-5 text-right">
		<?php if (!$last_page) { ?>
		<a href="<?php echo base_url()."timeline/page/".($page+1); ?>" class="btn btn-primary">Next Page</a>
		<?php } ?>
	</div>
</div>
<div class="bottom-post"></div>
