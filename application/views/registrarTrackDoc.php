<head>
	<link href="<?php echo base_url('assets/css/loginsignupstyle.css'); ?>" rel="stylesheet" />
</head>
<body style="
		background: url(<?php echo base_url('assets/images/signup.jpeg');?>) no-repeat; background-size: cover;">
	<div class="container" style="margin-top: 5%;">
		<h3 class="text-center" style="margin-bottom: 5%;">Track Document</h3>
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-default" id="panel-body">
					<div class="panel-body">
						<form class="pull-left searchbar" method="POST" action="<?php echo base_url('HomeFunction/trackdocument')?>">	
							<input type="text" placeholder=" e.g. 592-***-**" name="track" class="search"/>
							<button type="submit" class="find" value="Find"><span class="glyphicon glyphicon-search"></span></button>
						</form>
					</div>
					<div class="panel-body">
						<table class=" table-bordered table-hover text-center table-responsive table-striped" width="100%">
							<thead>
								<th>Track #</th>
								<th>File type</th>
								<th>Date Admitted</th>
								<th>Date Received</th>
								<th>Status</th>
							</thead>
							<tbody>
							<?php
								if(isset($documents_status)){
									foreach($documents_status as $d){ 
										echo '	<tr>	
													<td>'.$d['regTrackcode'].'</td>
													<td>'.$d['docType'].'</td>
													<td>'.$d['dateAdmitted'].'</td>
													<td>'.$d['dateReleased'].'</td>
													<td>'.$d['status'].'</td>
													

												</tr>
												';
									}
								}
							?>

							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-default" id="panel-footer">
					<div class="panel-footer text-center">
						<a class="pull-left" href="<?php echo base_url('DTS/index');?>" >Back to Home</a>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>