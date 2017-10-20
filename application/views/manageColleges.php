<head>
	<link href="<?php echo base_url('bootstrap/css/Staff-Designs.css'); ?>" rel="stylesheet" />
</head>
<div col-xs-9 col-sm-9 col-md-9 col-lg-9">
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
		   					<div class="row" style="margin-right: 10px;">
		   						<a href="<?php echo base_url('AdminOffices/addColleges'); ?>" class="btn btn-primary pull-right" title="Add Office"><span class="glyphicon glyphicon-plus"></span>&nbsp; Add</a>
							</div>
							<div class="panel-heading">
							<?php
								$thereis=false;
								foreach($colleges as $col){
									echo'
									<div class="thumbnail text-center col-sm-3" style="background-color:lightgray; border-width: 2px;  height:25%; padding:10px;">
										<a href="'.base_url('AdminOffices/officeContent/'.$col['collegeId']).'" style="text-decoration: none;">
											<div style="color: black">
												<img class="img-responsive" src="'.$col['collegeLogo'].'" style=" height: 150px;  margin: auto; border-radius: 90%;">
												<hr style="width:80%;"  />
												<h4 class="text-primary">'.$col['collegefull'].' ('.$col['collegeId'].')</h4>'.$col['collegeDesc'].'
											</div>
										</a>
										<a href="'.base_url('AdminOffices/updateCollege/'.$col['collegeId']).'" title="Edit" class="btn btn-success">
											<span class="glyphicon glyphicon-edit"></span>
											<span class="font">Edit</span>
										</a>'; ?>
										<!--<a href="#" onClick="deleteCollege('<?php echo $col['collegeId'];?>')" class="btn btn-danger" title="Delete">
											<span class="glyphicon glyphicon-remove-sign"></span>
											<span class="font">Delete</span>
										</a>-->
								<?php echo '
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
<!--
 <script type="text/javascript">
      function deleteCollege(id){
       // console.log(id);
        var ans = confirm("Do you want to delete this college?");
       // alert(id);
        if(ans==true){
          //redirect to delete method
          var url="<?php echo base_url('AdminOffices/removeCollege/');?>"+id;
          location.href = url;
          alert("The college has been successfully deleted!");
        }
      }
     
 </script>
 -->