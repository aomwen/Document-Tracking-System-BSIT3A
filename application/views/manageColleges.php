<link href="<?php echo base_url('bootstrap/css/Admin-Designs.css'); ?>" rel="stylesheet" />

<div class="docstat col-md-9">
	<div class="panel-heading" id="head">
	    <ol class="breadcrumb pull-right">
	      <li><a href="<?php echo base_url('DocumentStatus/viewDocuments'); ?>"><span class="glyphicon glyphicon-home"></span></a></li> 
	      <li class="active">Offices</li>
	    </ol>    
	    <h3><span class="glyphicon glyphicon-signal"></span> Offices</h3>  
	</div>         
	<div class="panel panel-default">		
		<div class="panel-body">
		   	<div>
		   		<a href="<?php echo base_url('AdminOffices/addColleges'); ?>" class="btn btn-link pull-right" style="text-decoration: none; color:black;" >
				<span class="glyphicon glyphicon-plus-sign"></span>&nbspAdd </a>
			</div>
			<?php
				$thereis=false;
				foreach($colleges as $col){
					echo'
					<div class="thumbnail text-center col-sm-3" style="background-color:lightgray; border-width: 2px;  height:25%; padding:10px;">
						<a href="'.base_url('AdminOffices/officeContent/'.$col['collegeId']).'" style="text-decoration: none;">
							<div style="color: black">
								<img class="img-responsive" src="'.$col['collegeLogo'].'" style=" height: 150px;  margin: auto; border-radius: 90%;">
								<hr style="width:80%;"  />
								'.$col['collegefull'].'<br />'.$col['collegeDesc'].'
							</div>
						</a>
						<a href="'.base_url('AdminOffices/updateCollege/'.$col['collegeId']).'"><span class="glyphicon glyphicon-edit"></span></a>'; ?>
						<a href="#" onClick="deleteCollege('<?php echo $col['collegeId'];?>')" ><span class="glyphicon glyphicon-remove-sign" style="color: black"></span></a>
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
<!--base_url('AdminOffices/removeCollege/'.$col['collegeId'])-->
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