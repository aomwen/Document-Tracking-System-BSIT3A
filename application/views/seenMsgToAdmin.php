<link href="<?php echo base_url('bootstrap/css/Admin-Designs.css'); ?>" rel="stylesheet" />

<div class="myacc col-md-9">
	<div class="panel panel-default">
		<div class="panel-heading" id="head">
		    <!-- <ol class="breadcrumb pull-right">
		      <li><a href="<?php echo base_url('Dts/viewDocuments'); ?>"><span class="glyphicon glyphicon-home"></span></a></li> 
		      <li class="active">Account Settings</li>
		    </ol>    --> 
		    <h3><span class="glyphicon glyphicon-inbox"></span> </h3> 
		</div>
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