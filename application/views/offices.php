<head>
	<link href="<?php echo base_url('bootstrap/css/Staff-Designs.css'); ?>" rel="stylesheet" />
</head>
		<div class="row">
		    <div id="content">
		      	<div id="main-content">
					<div class="panel-heading" id="head">
					    <ol class="breadcrumb pull-right">
					    	<li><a href="<?php echo base_url('DocumentStatus/viewDocuments'); ?>" title="Home"><span class="glyphicon glyphicon-home"></span></a></li> 
					      	<li class="active">Offices</li>
					    </ol>    
					    <h3><span class="glyphicon glyphicon-map-marker"></span> Offices</h3>       
					</div>
					<div class="panel panel-default">		
						<div class="panel-body">
							<?php
							$thereis=false;
							foreach($colleges as $col){
								echo'
								<div class="thumbnail text-center col-sm-3" style="background-color:lightgray; border-width: 2px;  height:25%; padding:10px;">
									<a href="'.base_url('Office/officeContent/'.$col['collegeId']).'" style="text-decoration: none;">
										<div style="color: black;">
											<img class="img-responsive" src="'.$col['collegeLogo'].'" style=" height: 150px;  margin: auto; border-radius: 90%;">
											<hr style="width:80%;"  />
											<h4 class="text-primary">'.$col['collegefull'].' ('.$col['collegeId'].')</h4>
											'.$col['collegeDesc'].'<br />
										</div>
									</a>
								</div>';
								$thereis=true;
							}
							if($thereis==false){
									echo '<h4 class="text-danger">No college registered...</h4>';
								}
							?>
						</div>	
					</div>
			    </div>    
			</div>    
	    </div>
	</div> 
</div>	