<link href="<?php echo base_url('bootstrap/css/Staff-Designs.css'); ?>" rel="stylesheet" />

<div class="offices col-md-9">
	<div class="panel-heading" id="head">
	    <ol class="breadcrumb pull-right">
	      <li><a href="<?php echo base_url('DocumentStatus/viewDocuments'); ?>"><span class="glyphicon glyphicon-home"></span></a></li> 
	      <li class="active">Offices</li>
	    </ol>    
	    <h3><span class="glyphicon glyphicon-inbox"></span> Offices</h3>       
	</div>
	<div class="panel panel-default">	
		<div class="panel-body"> 
			<?php
				$thereis=false;
				foreach($colleges as $col){
					echo'
					<div class="thumbnail text-center col-sm-3" style="background-color:lightgray; border-width: 2px;  height:25%; padding:10px;">
						<a href="'.base_url('Office/officeContent/'.$col['collegeId']).'" style="text-decoration: none;">
						<div style="color: black">
							<img class="img-responsive text-center" src="'.$col['collegeLogo'].'" style=" height: 150px;  margin-top: 10px; border-radius: 90%;">
							<hr style="width:80%;"  />
					'.$col['collegeDesc'].'<br />
					</div></a>
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