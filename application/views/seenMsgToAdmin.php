<head>
	<link href="<?php echo base_url('bootstrap/css/Staff-Designs.css'); ?>" rel="stylesheet" />
</head>
<div col-xs-9 col-sm-9 col-md-9 col-lg-9">
		    <div id="content">
		      	<div id="main-content">
					<div class="panel-heading" id="head">
		    			<ol class="breadcrumb pull-right">
		      				<li><a href="<?php echo base_url('DocumentStatus/viewDocuments'); ?>" title="Home"><span class="glyphicon glyphicon-home"></span></a></li>
		      				<li><a href="<?php echo base_url('ManageAdmin/viewMsgToAdmin'); ?>" title="User Review">User Review</a></li> 
		      				<li class="active">User</li>
		    			</ol> 
		    			<h3><span class="glyphicon glyphicon-signal"></span> User Review</h3> 
					</div>
					<div class="panel panel-default">
						<div class="panel-body">
						<?php
							 foreach($messages as $mess){ 
							 echo '	<div class="specific_inbox">
								<h3><b>'.$mess['idno'].'</b></h3>
								<h5 class="pull-left">From: <b>'.$mess['sender'].'</b></h5>
								<h5 class="pull-right">Received: '.$mess['datecreated'].'</h5>
								<br />
								<br />
								<h5 class="pull-left">Email: <em class="text-primary">'.$mess['email'].'</em></h5>
								<h5 class="pull-right">Seen: '.$mess['dateseen'].'</h5>
								<br />
								<hr />
								<h5 class="subject_inbox">'.$mess['content'].'</h5>
								<br />
								<hr />
							</div>
							';
							}
						?>	
						</div>
					</div>
				</div>			
			</div>
</div>	